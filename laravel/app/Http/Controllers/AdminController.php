<?php namespace App\Http\Controllers;

use Auth;
use App\User;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    if (!Auth::User()->admin)
	        return redirect()->back();
	    $users = DB::table('users')->where('user_id', '!=', Auth::User()->user_id)->leftJoin('branches', 'users.branch', '=', 'branches.branch')->get();
		return view('usermgmt.index', ['users'=>$users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	    if (!Auth::User()->admin)
	        return redirect()->back();
		$user = User::find($id);
		$user->admin = !$user->admin;
		$user->save();
		
		return redirect('usermgmt/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
