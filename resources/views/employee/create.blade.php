@extends('layouts.master')
    
    @section('title') Create Customer! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Add New Employee</h2>
		            <form action="{{ url('employees') }}" method="post" enctype="multipart/form-data">
		                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="Name">Name</label>
		                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                    <label for="Email">Email</label>
		                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                             <input class="form-control" id="password" type="password" name="password"></input>
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm">Confirm Password</label>
                            <input class="form-control" id="password-confirm" type="password" name="password_confirmation"></input>
                        </div>
		                <button type="submit" class="btn btn-primary">Submit</button>
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection