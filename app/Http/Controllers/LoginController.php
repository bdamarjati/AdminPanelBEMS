<?php 


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
	public function index(){
		return view('login');
	}

	public function changePassword(Request $request){
		$id = Auth::user()->id;

		$user = User::where('id',$id)
		->update(array(
			'password' => bcrypt($request->get('password')),
			'isLogin' => '1'
		));

		return redirect()->to('dashboard');
	}

	public function login(Request $request)
	{
		if(Auth::attempt(['email' => $request->get('email'),'password' => $request->get('password')])){
			if(Auth()->user()->role == 'superadmin'){
				return redirect()->route('dashboard/admin');
			}
		}
		$request->session()->flash('error','Check your Email and Password !!');
		return view('/login');
	}

	public function logout()
	{
		Auth::logout();

		return view('login');
	}
}