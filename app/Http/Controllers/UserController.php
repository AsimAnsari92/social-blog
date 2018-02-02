<?php
namespace App\Http\Controllers;

use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;



/**
* 
*/

class UserController extends Controller
{

    public function PostSignUp(Request $request)
	{
		# code...
        $this->validate($request,[
            'email' => 'required|unique:users|email',
            'firstname' => 'required|max:120',
            'password' => 'required|max:4',
        ]);
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
        $this->validate($request,[
            'email' => 'required|email',
             'password' => 'required|max:4',
        ]);

	    if(Auth::attempt(["email"=>$request['email'],'password'=>$request['password']]))
	    {
             return redirect()->route('dashboard');
	    }
	    else{
            return redirect()->back();
        }
	}


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    public function getaccount() {

        return view('accounts',['user' => Auth::user()]);
    }

    public function updateaccount(Request $request)
    {
        $this->validate($request,[
           'firstname'=>'required|max:120',
            ]);
        $user = Auth::user();
        $user->firstname = $request['firstname'];
        $user->update();

        $file = $request->file('image');
        $filename = $request['firstname'].'-'.$user->id.'jpg';
        if($file)
        {
            Storage::disk('local')->put($filename,File::get($file));
        }
        return redirect()->route('account');

    }

    public function GetUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file,200);
    }
}





























