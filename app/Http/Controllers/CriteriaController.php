<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criteria;
use App\Perhitungan;
use App\Crips;

class CriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
	{
		$criterias = Criteria::paginate(10);

    	return view('criteria.index', compact('criterias'));
	}

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'    => 'required|min:2',
            'atribut' => 'required',
            'bobot'   => 'required|integer'
        ]);

        Criteria::create([
            'nama'    => $request->nama,
            'atribut' => $request->atribut,
            'bobot'   => $request->bobot
        ]);

        return redirect('/kriteria');
    }

    public function edit(Criteria $criteria)
    {     
    	return $criteria;
    }

    public function update(Request $request, Criteria $criteria)
    {
        $this->validate($request,[
            'nama_kriteria'    => 'required|min:2',
            'atribut_kriteria' => 'required',
            'bobot_kriteria'   => 'required|integer'
        ]);

        $criteria->nama   	= $request->nama_kriteria;
        $criteria->atribut	= $request->atribut_kriteria;
        $criteria->bobot	= $request->bobot_kriteria;
        $criteria->save();

        return redirect('/kriteria');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        Perhitungan::where('criteria_id', $criteria->id)->delete();
        Crips::where('criteria_id', $criteria->id)->delete();
        return redirect('/kriteria'); 
    }
}
