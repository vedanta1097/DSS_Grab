<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crips;
use App\Criteria;

class CripsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
	{
		$crips 	   = Criteria::find(1)->crips;
		$criterias = Criteria::all();

    	return view('crips.index', compact(['crips','criterias']));
	}

    public function store(Request $request)
    {
        $this->validate($request, [
            'kriteria' 	  => 'required',
            'keterangan'  => 'required|min:2',
            'nilai'   	  => 'required|integer'
        ]);

        Crips::create([
            'criteria_id' => $request->kriteria,
            'keterangan'  => $request->keterangan,
            'nilai'       => $request->nilai
        ]);

        return redirect()->action(
    		'CripsController@show', ['id' => $request->kriteria]
		);
    }

    public function show(Criteria $criteria)
    {     

    	$crips 	   = $criteria->crips;
		$criterias = Criteria::all();

    	return view('crips.index', compact(['crips','criterias']));
    }

    public function edit(Crips $crips)
    {
        $criteria_id = $crips->criteria->id;

        return [$crips, $criteria_id];
    }

    public function update(Request $request, Crips $crips)
    {
        $this->validate($request,[
            'keterangan' => $request->keterangan_crips,
            'nilai'      => $request->nilai_crips
        ]);

        $crips->criteria_id = $request->kriteria_id;
        $crips->keterangan  = $request->keterangan_crips;
        $crips->nilai	    = $request->nilai_crips;
        $crips->save();

        return redirect()->action(
            'CripsController@show', ['id' => $request->kriteria_id]
        );
    }

    public function destroy(Crips $crips)
    {
        $crips->delete();

        return redirect()->action(
            'CripsController@show', ['id' => $crips->criteria->id]
        );
    }
}
