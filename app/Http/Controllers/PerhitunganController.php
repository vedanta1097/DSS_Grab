<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perhitungan;
use App\Alternative;
use App\Criteria;
use App\Crips;

class PerhitunganController extends Controller
{
    const ERROR_CRITERIA = "Mohon Edit data Alternatif terlebih dahulu untuk menambahkan kriteria baru pada Alternatif.";
    const ERROR_BOBOT = "Total bobot harus 100 untuk dapat melakukan perhitungan.";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$alternatives = Alternative::paginate(10);
    	$criterias = Criteria::all();
    	$perhitungans = Perhitungan::all();

    	return view('perhitungan.index', compact(['alternatives','criterias','perhitungans']));
    }

    public function normalisasi()
    {
    	$alternatives = Alternative::all();
    	$criterias = Criteria::all();

        // cek jumlah kriteria pada masing masing alternatif
        $criteria_valid = $this->validateCriteria($alternatives, $criterias);
        // cek total bobot harus 100 
        $bobot_valid = $this->validateBobot($criterias);
        //lakukan validasi
        if (!$criteria_valid && !$bobot_valid) {
            return back()->withErrors([self::ERROR_CRITERIA,self::ERROR_BOBOT]);
        }elseif (!$criteria_valid) {
            return back()->withErrors(self::ERROR_CRITERIA);
        }
        if (!$bobot_valid) {
            return back()->withErrors([self::ERROR_BOBOT]);
        }

        //ambil matriks normalisasi
    	$matriks_normalisasi = $this->getMatriks($criterias, $alternatives);

    	return view('perhitungan.normalisasi', compact(['alternatives','criterias','matriks_normalisasi']));
    }

    public function perankingan()
    {
    	$alternatives = Alternative::all();
    	$criterias = Criteria::all();
        
    	// cek jumlah kriteria pada masing masing alternatif
        $criteria_valid = $this->validateCriteria($alternatives, $criterias);
        // cek total bobot harus 100 
        $bobot_valid = $this->validateBobot($criterias);

        if (!$criteria_valid && !$bobot_valid) {
            return back()->withErrors([self::ERROR_CRITERIA,self::ERROR_BOBOT]);
        }elseif (!$criteria_valid) {
            return back()->withErrors(self::ERROR_CRITERIA);
        }
        if (!$bobot_valid) {
            return back()->withErrors([self::ERROR_BOBOT]);
        }

        //ambil matriks normalisasi
        $matriks_normalisasi = $this->getMatriks($criterias, $alternatives);

        //inisialisasi array bobot dan total 
        $bobot = array_fill(0, count($criterias), 0);
        $total = array_fill(0, count($criterias), 0);

        //kalikan tiap nilai pada matriks normalisasi dengan bobot masing-masing criteria
        foreach ($criterias as $i => $cri) {
            $bobot[$i] = $cri->bobot / 100;
            foreach ($alternatives as $j => $alt) {
                $matriks_normalisasi[$i][$j] = round($matriks_normalisasi[$i][$j] * $bobot[$i], 2);
            }
        }

        //tentukan total masing masing alternatif
        foreach ($alternatives as $i => $alt) {
            $temp = 0;
            foreach ($criterias as $j => $cri) {
                $temp = $temp + $matriks_normalisasi[$j][$i];
            }
            $total[$i] = $temp;
        }
        
        $max_total = max($total);

        return view('perhitungan.perankingan', compact(['alternatives','criterias','matriks_normalisasi',
                                                        'bobot', 'total', 'max_total']));
    }

    public function getMatriks($criterias, $alternatives)
    {
    	//buatkan array untuk tiap data perhitungan yang memiliki criteria sama
		foreach ($criterias as $i => $cri) {
			$array_criteria[$i] = Perhitungan::where('criteria_id', $cri->id)->get();
		}

		//ambil nilai crips dari data perhitungan
		foreach ($array_criteria as $i => $data_perhitungan) {
			foreach ($alternatives as $j => $alt) { 
				$val[$i][$j] = $data_perhitungan[$j]->crips->nilai;
			}
            //cari nilai min dan max pada tiap criteria
			$min[$i] = min($val[$i]);
			$max[$i] = max($val[$i]);
		}

        // setelah diisi data, maka bentuk dari variable $val menjadi seperti ini
        //         A1   A2  A3 ...  (alternatif)
        //    C1   0    0   0
        //    C2   0    0   0
        //   ...
        // (criteria)
        
		//lalu tentukan nilai matriks normalisasi ($val) sesuai dengan atribut cost atau benefit
		foreach ($criterias as $i => $cri) {
			if ($cri->atribut == 'cost') { // val = min / x
				foreach ($alternatives as $j => $alt) {
					$val[$i][$j] = round($min[$i] / $val[$i][$j], 2);
				}
			}
			elseif ($cri->atribut == 'benefit') { // val = x / max
				foreach ($alternatives as $j => $alt) { 
					$val[$i][$j] = round($val[$i][$j] / $max[$i], 2);
				}
			}
		}

		return $val;
    }

    public function validateCriteria($alternatives, $criterias)
    {
        $total_criteria = count($criterias);
        $valid = true;

        //bandingkan jumlah kriteria dengan banyaknya kriteria pada alternatif 
        foreach ($alternatives as $i => $alt) {
            $total_criteria_alternative = count(Perhitungan::where('alternative_id', $alt->id)->get());
            if ($total_criteria != $total_criteria_alternative) {
                $valid = false;
                break;
            }
        }

        return $valid;
    }

    public function validateBobot($criterias) 
    {
        $total_bobot = 0;
        $valid = true;

        foreach ($criterias as $i => $criteria) {
            $total_bobot += $criteria->bobot;
        }

        if ($total_bobot != 100) {
            $valid = false;
        }

        return $valid;
    }
}
