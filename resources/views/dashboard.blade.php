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
                    <article class=" post col-md-12">
                         <p>{{$post->body}}</p>
                        <div class="info">Posted by {{$post->user->firstname}} on {{$post->created_at->format('M d Y')}}</div>
                        <div class="interaction">
                            <a href="#">Like</a> |
                            <a href="#">Dislike</a>|
                            <a href="#">Edit</a>|
                            <a href="#">Delete</a>
                        </div>
                    </article>
                        @endforeach

                </div>


            </main>
        </div>
    </div>


@endsection