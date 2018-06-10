<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alternative;
use App\Criteria;
use App\Crips;
use App\Perhitungan;

class AlternativeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index() 
	{
		$alternatives = Alternative::paginate(10);

    	return view('alternative.index', compact('alternatives'));
	}

    public function create()
    {
        $criterias = Criteria::all();
        $crips = Crips::all();

        return [$criterias, $crips];
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'       => 'required|min:2',
        ]);

        $alternative = Alternative::create([
            'nama'		 => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        $criterias = Criteria::all();

        //store data perhitungan for each criteria
        foreach ($criterias as $i => $criteria) {
            $crips_id = 'criteria.' . $i;   //access select box: <select name="criteria[]" 
            Perhitungan::create([
                'alternative_id' => $alternative->id,
                'criteria_id'    => $criteria->id,
                'crips_id'       => $request->input($crips_id),
            ]);
        }

        return redirect('/perhitungan/data');
    }

    public function edit(Alternative $alternative)
    {     
        $criterias = Criteria::all();
        $crips = Crips::all();
        $perhitungan = $alternative->perhitungan;

    	return [$criterias,$crips,$alternative, $perhitungan];
    }

    public function update(Request $request, Alternative $alternative)
    {
        $criterias = Criteria::all();

        $this->validate($request,[
            'nama'       => 'required|min:2',
            'keterangan' => 'nullable|string'
        ]);

        $alternative->nama        = $request->nama;
        $alternative->keterangan  = $request->keterangan;
        $alternative->save();

        $perhitungan_alternative = Perhitungan::where('alternative_id',$alternative->id)->get();

        //edit data crips pada tabel perhitungan 
        foreach($perhitungan_alternative as $i => $perhitungan) {
            $crips_id               = 'criteria.' . $i; //access select box's name
            $perhitungan->crips_id  = $request->input($crips_id);
            $perhitungan->save();
        }

        $jml_request_criteria = count($request->input('criteria'));
        //masukkan data criteria baru yg belum ada pada tabel perhitungan
        for ($i=count($perhitungan_alternative); $i < $jml_request_criteria; $i++) { 
            $crips_id               = 'criteria.' . $i;
            Perhitungan::create([
                'alternative_id' => $alternative->id,
                'criteria_id'    => $criterias[$i]->id,
                'crips_id'       => $request->input($crips_id),
            ]);
        }
        
        return redirect('/perhitungan/data');
    }

    public function destroy(Alternative $alternative)
    {
        $alternative->delete();
        Perhitungan::where('alternative_id', $alternative->id)->delete();
        return back(); 
    }

    public function reset()
    {
        //remove all rows and reset the auto-incrementing ID to zero
        Alternative::truncate();
        Perhitungan::truncate();
        return back();
    }
}
