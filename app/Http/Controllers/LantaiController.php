<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Lantai;
use App\Building;
use App\Fakultas;

class LantaiController extends Controller
{
	public function index(){
		$getNextId = Lantai::getNextId();
        $getBuildingInfo = Building::all();
		$getFakultasInfo = Fakultas::GetGedungInfo();
	
		return view('lantai')->with([
			'getNextId' => $getNextId,
            'buildingInfo' => $getBuildingInfo,
			'fakultasInfo' => $getFakultasInfo
		]);
	}	

	public function getLantai(){
		$listLantai = Lantai::all();

		return response()->json(['data' => $listLantai]);
	}

	public function store(Request $request){
		$data = new Lantai();
		$data->id = $request->get('id');
		$data->id_ref_gedung = $request->get('id_ref_gedung');
		$data->lantai = $request->get('lantai');
		
		$data->save();
	}

	public function edit($id)
	{
		$data = Lantai::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id)
	{
		$data = Lantai::where('id',$id)->update(array(
			'id_ref_gedung' => $request->get('idGedungEdit'),
			'lantai' => $request->get('lantaiEdit')
		));
	}

	public function delete($id){
		$data = Lantai::findorfail($id);
		$data->delete();
	}

	public function info($id){
		$data = Fakultas::where('lantai.id_ref_gedung',$id)->GetFakultasInfo();

        return response()->json($data[0]);
	}
}