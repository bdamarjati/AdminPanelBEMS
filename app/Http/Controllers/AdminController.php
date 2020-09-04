<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Device;
use App\Building;
use App\Ruang;
use App\Fakultas;

class AdminController extends Controller
{
	public function index()
	{

		$totalDevice = Device::count('id');		
		$totalUser = User::count('id');
		$totalGedung = Fakultas::GetAllDeviceInfo()->count('gedung');
		$totalRuang = Fakultas::GetAllDeviceInfo()->count('id');

		$device_info = Device::GetInformation();

		return view('dashboardAdmin')->with([
			'totalDevice' => $totalDevice,
			'totalUser' => $totalUser,
			'device_info' => $device_info,
			'totalGedung' => $totalGedung,
			'totalRuang' => $totalRuang
		]);
	}

	public function changePassword(){
		return view('ChangeAdminPassword');
	}

	public function updatePassword(Request $request){
		$user = User::where('id','1')
		->update(array(
			'password' => bcrypt($request->get('password'))
		));

		return redirect()->route('dashboard/admin');
	}
}