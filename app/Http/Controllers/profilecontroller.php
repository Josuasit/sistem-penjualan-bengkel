<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Alert;
use Illuminate\Support\Facades\Hash;


class profilecontroller extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$user = User::where('id', Auth::user()->id)->first();

    	return view('profile.index', compact('user'));
    }
    public function update(Request $request)
    {
    	$this->validate($request, [
            'password'  => 'min:8', 'confirmed', 
        ]);


    	$user = User::where('id', Auth::user()->id)->first();
    	$user->name= $request->name;
    	$user->email= $request->email;
    	$user->nohp= $request->nohp;
    	$user->alamat= $request->alamat;
    	if(!empty($request->password))
    	{
    		$user->password =  Hash::make($request->password);
    	}

    	$user->update();

    	alert()->success('Berhasil','Sukses Di Update');
    	return redirect('profile');


    }
}
