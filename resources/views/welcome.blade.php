@extends('layouts.master')

@section('title')
    Welcome!
@endsection


@section('content')

    <div class="row">
        @if(count($errors)>0)
            <div class="col-md-12">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-6">
            <h2>Sign Up</h2>
               <form action="{{ route('signup') }}" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
             
          </div>

          <div class="form-group">
            <label for="firstname">First name</label>
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
          <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
        </div>


        <div class="col-md-6">
            <h2>Sign In</h2>

               <form method="post" action="{{route('signin')}}">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
            
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div> 
          <button type="submit" class="btn btn-primary">Submit</button>
                   <input type="hidden" name="_token" value="{{ Session::token() }}">

               </form>
        </div>


    </div>
 

@endsection