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
		));

		return redirect()->to('dashboard');
	}

	public function login(Request $request)
	{
		if(Auth::attempt(['email' => $request->get('email'),'password' => $request->get('password')])){
			if(Auth()->user()->role == 'super admin'){
				return redirect()->route('dashboard/admin');
			}
			elseif(Auth()->user()->role == 'admin'){
				return redirect()->route('dashboard/user');
			}
			else{
				return view('/login');
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