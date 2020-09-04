<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Building;
use App\Fakultas;

class BuildingController extends Controller
{
	public function index(){
		$getNextId = Building::getNextId();
		$getFakultasInfo = Fakultas::all();
	
		return view('building')->with([
			'getNextId' => $getNextId,
			'fakultasInfo' => $getFakultasInfo
		]);
	}	

	public function getBuilding(){
		$listGedung = Building::all();

		return response()->json(['data' => $listGedung]);
	}

	public function store(Request $request){
		$data = new Building();
		$data->id = $request->get('id');
		$data->id_ref_fakultas = $request->get('id_ref_fakultas');
		$data->gedung = $request->get('gedung');
		
		$data->save();
	}

	public function edit($id)
	{
		$data = Building::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id)
	{
		$data = Building::where('id',$id)->update(array(
			'id_ref_fakultas' => $request->get('idFakultasEdit'),
			'gedung' => $request->get('gedungEdit')
		));
	}

	public function delete($id){
		$data = Building::findorfail($id);
		$data->delete();
	}

	public function info($id){
		$data = Fakultas::findorfail($id);

		return response()->json($data);
	}
}