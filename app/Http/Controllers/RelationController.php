<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Building;
use App\Device;
use App\Fakultas;

class RelationController extends Controller
{
	public function index(){
		$listRelation = Fakultas::GetAllDeviceInfo();

		return view('relation')->with([
			'listJoin' => $listRelation
		]);
	}

	public function store(Request $request){
		$gedung = new Building();
		$lantai = new Lantai();
		$ruang = new Ruang();
		$device = new Device();

		$gedung->gedung = $request->get('gedung');
		$lantai->lantai = $request->get('lantai');
		$ruang->ruang = $request->get('ruang');
		$device->device = $request->get('device');
		$device->device = 'off';
		
		$gedung->save();
		$lantai->save();
		$ruang->save();
		$device->save();
    }

	public function getRelation(){
		$listJoin = Fakultas::GetAllDeviceInfo();

		return response()->json(['data' => $listJoin]);
	}

	public function edit($id){
        $data = Device::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id){
        $data = Device::where('id',$id)->update(array(
			'keterangan' => $request->get('joinEdit')
		));
	}

	public function delete($id){
		$data = Device::findorfail($id);
		$data->delete();
	}
}