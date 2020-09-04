<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use Carbon\Carbon;

class FakultasController extends Controller
{
	public function index(){
		$getId = Fakultas::getId();
	
		return view('fakultas')->with([
			'getId' => $getId
		]);
	}

	public function store(Request $request){
		$data = new Fakultas();
        $data->id = $request->get('id');
        $data->keterangan = $request->get('keterangan');
		
		$data->save();
    }
    
    public function getFakultas(){
		$listFakultas = Fakultas::all();

		return response()->json(['data' => $listFakultas]);
	}

	public function edit($id){
        //
        $data = Fakultas::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id){
        //
        $data = Fakultas::where('id',$id)->update(array(
			'keterangan' => $request->get('fakultasEdit')
		));
	}

	public function delete($id){
		$data = Fakultas::findorfail($id);
		$data->delete();
	}

}