@extends('layouts.master')

@section('title')
    Dashboard!
@endsection


@section('content')

    <div class="row" >
        @include("includes/message-block")
        @include('includes/header')
        <div class="col-md-12">
            <main role="main" class="container">

                <div class="row">
                    <form action="{{route('createpost')}}" method="post">
                    <h2 class="mt-5">What do you have to say?</h2>
                    <textarea class="form-control" placeholder="Your Post" name="body"></textarea>
                    <p><button type="submit" class="btn btn-info my-2" style="margin: 2px">&nbsp;&nbsp; POST&nbsp;&nbsp;</button></p>
                        <input type="hidden" name="_token" value="{{Session::token() }}">
                    </form>
                </div>

                <div class="row mt-5">
                    @foreach($posts as $post)
                    <article class=" post col-md-12" data-postid="{{$post->id}}">
                         <p>{{$post->body}}</p>
                        <div class="info">Posted by {{$post->user->firstname}} on {{$post->created_at->format('M d Y')}}</div>
                        <div class="interaction">
                            <a href="#">Like</a> |
                            <a href="#">Dislike</a>
                            @if(Auth::user() == $post->user)
                                | <a href="#" class="edit">Edit</a>|
                                <a href="{{ route('delete-post',['post_id'=>$post->id]) }}">Delete</a>
                            @endif

                        </div>
                    </article>
                        @endforeach

                </div>


            </main>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form >
                        <div class="form-group">
                    <textarea  class="form-control" id="post-body" name="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updatepost">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<script>
    var token = '{{Session::token()}}';
    var url = '{{ route('edit')}}';
</script>

@endsection