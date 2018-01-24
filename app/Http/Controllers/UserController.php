<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
* 
*/

class UserController extends Controller
{

    public function PostSignUp(Request $request)
	{
		# code...
		$email = $request['email'];
		$firstname = $request['firstname'];
		$password = bcrypt($request['password']);

		$user = new User();
		$user->email = $email;
		$user->firstname = $firstname;
		$user->password = $password;
	$user->save();
	return redirect()->route('dashboard');

	}

    public  function PostSignIn(Request $request)
	{
	    if(Auth::attempt(["email"=>$request['email'],'password'=>$request['password']]))
	    {
             return redirect()->route('dashboard');
	    }
	    else{
            return redirect()->back();
        }
	}


    public  function Dashboard()
    {
        return view('dashboard');
    }
}





























