<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createpost(Request $request)
    {
        $this->validate($request,[
            'body' => 'required|max:1000'
        ]);
        $post = new  Post();
        $post->body= $request['body'];
        $message = "There was an error";
        if($request->user()->post()->save($post))
        {
            $message = "Post has successfully created!";
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);
    }


    public  function Dashboard()
    {
        $post= Post::all();
        return view('dashboard',['posts'=>$post]);
    }
}