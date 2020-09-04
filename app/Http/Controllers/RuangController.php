<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Ruang;
use App\Lantai;
use App\Fakultas;

class RuangController extends Controller
{
	public function index(){
		$getNextId = Ruang::getNextId();
		$getLantaiInfo = Lantai::all();
	
		return view('ruang')->with([
			'getNextId' => $getNextId,
			'lantaiInfo' => $getLantaiInfo
		]);
	}	

	public function getRuang(){
		$listRuang = Ruang::all();

		return response()->json(['data' => $listRuang]);
	}

	public function store(Request $request){
		$data = new Ruang();
		$data->id = $request->get('id');
		$data->id_ref_lantai = $request->get('id_ref_lantai');
		$data->ruang = $request->get('ruang');
		
		$data->save();
	}

	public function edit($id)
	{
		$data = Ruang::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id)
	{
		$data = Ruang::where('id',$id)->update(array(
			'id_ref_lantai' => $request->get('idLantaiEdit'),
			'ruang' => $request->get('ruangEdit')
		));
	}

	public function delete($id){
		$data = Ruang::findorfail($id);
		$data->delete();
	}

	public function info($id){
		$data = Fakultas::where('ruang.id_ref_lantai',$id)->GetRuangInfo();

        return response()->json($data[0]);
	}
}