<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Ruang;
use App\Building;

class DeviceController extends Controller
{
	public function index(){
		$getDeviceInfo = Device::all();
		$getRuangInfo = Ruang::all();

		return view('device')->with([
			'deviceInfo' => $getDeviceInfo,
			'ruangInfo' => $getRuangInfo
		]);
	}

	public function getDevice()
	{
		$listDevice = Ruang::GetDeviceInfo();
		
		return response()->json([ 
			'data' => $listDevice
		]);
	}

	public function store(Request $request){
		$data = new Device();
		$data->id = $request->get('id');
		$data->id_ref_ruang = $request->get('id_ref_ruang');
		$data->status = 'off';

		$data->save();
	}

	public function edit($id)
	{
		$data = Device::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id)
	{
		$data = Device::where('id',$id)->update(array(
			'id' => $request->get('idDeviceEdit'),
			'id_ref_ruang' => $request->get('idRuangEdit')
		));
	}

	public function delete($id){
		$data = Device::findorfail($id);
		$data->delete();
	}

	public function info($id){
		$data = Ruang::findorfail($id);

		return response()->json($data);
	}
}
