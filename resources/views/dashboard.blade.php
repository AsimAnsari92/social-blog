@extends('layouts.master')

@section('title')
    Dashboard!
@endsection


@section('content')

    <div class="row" >
        <div class="col-md-12">
            <main role="main" class="container">

                <div class="row">
                    <form action="{{route('createpost')}}" method="post">
                    <h2 class="mt-5">What do you have to say?</h2>
                    <textarea class="form-control" placeholder="Your Post" name="body"></textarea>
                    <p><button type="submit" class="btn btn-info" style="margin: 2px">&nbsp;&nbsp; POST&nbsp;&nbsp;</button></p>
                        <input type="hidden" name="_token" value="{{Session::token() }}">
                    </form>
                </div>

                <div class="row mt-5">
                    <article class=" post">
                         <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <div class="info">Posted by admin on 12 Feb 2018</div>
                        <div class="interaction">
                            <a href="#">Like</a> |
                            <a href="#">Dislike</a>|
                            <a href="#">Edit</a>|
                            <a href="#">Delete</a>
                        </div>
                    </article>
                    <article class=" post">
                         <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <div class="info">Posted by admin on 12 Feb 2018</div>
                        <div class="interaction">
                            <a href="#">Like</a> |
                            <a href="#">Dislike</a>|
                            <a href="#">Edit</a>|
                            <a href="#">Delete</a>
                        </div>
                    </article>
                    <article class=" post">
                         <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <div class="info">Posted by admin on 12 Feb 2018</div>
                        <div class="interaction">
                            <a href="#">Like</a> |
                            <a href="#">Dislike</a>|
                            <a href="#">Edit</a>|
                            <a href="#">Delete</a>
                        </div>
                    </article>
                </div>


            </main>
        </div>
    </div>


@endsection