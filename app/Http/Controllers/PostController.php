<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //$post= Post::all();
        $post= Post::orderBy('created_at','desc')->get();
        return view('dashboard',['posts'=>$post]);
    }

    public  function GetDeletePost($post_id)
    {
        $post = Post::where('id',$post_id)->first();
        if(Auth::user() != $post->user){
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message'=>'Post delete successfully!']);

    }


    public function updatePost(Request $request)
    {
        $this->validate($request,[
           'body'=>"required"
        ]);
        $post= Post::find($request['postid']);
        $post->body=$request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body],200);
    }


}