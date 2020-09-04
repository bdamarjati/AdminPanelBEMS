<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Fakultas;
use Carbon\Carbon;

class UserController extends Controller
{
	public function index(){
		return view('users');
	}

	public function store(Request $request){
		$user = new User();
		$user->name = $request->get('name');
		$user->email = $request->get('email');
		$user->id_ref_fakultas = $request->get('faculty');
		$user->password = bcrypt('default');
		$user->role = 'admin';
		$user->isLogin = '0';

		$user->save();
	}

	public function getUser(){
		$listUser = User::all();
		
		return response()->json(['data' => $listUser]);
	}

	public function edit($id){
		$data = User::findorfail($id);

    	return response()->json($data);
	}

	public function update(Request $request, $id)
	{
		$data = User::where('id',$id)->update(array(
			'name' => $request->get('name'),
			'email' => $request->get('email')
		));
	}

	public function reset($id){
		$data = User::where('id',$id)->update(array(
			'password' => bcrypt('default')
		));
	}

	public function delete($id){
		$data = User::findorfail($id);
		$data->delete();
	}

	public function info($id){
		$data = Fakultas::findorfail($id);

		return response()->json($data);
	}

}