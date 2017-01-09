@extends('layouts.master')
    
    @section('title') Edit Employee! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Edit Employee</h2>
		            <form action="{{ route('employees.update', [ 'id' => $employee->id ] ) }}" method="post" enctype="multipart/form-data">
		                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="Name">Name</label>
		                    <input class="form-control" type="text" name="name" id="name" value="{{ $employee->name }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                    <label for="Email">Email</label>
		                    <input class="form-control" type="text" name="email" id="email" value="{{ $employee->email }}"></input>
		                </div>
		                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                             <input id="password" type="password" class="form-control" name="password" required></input>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required></input>
                        </div>
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                {{ method_field('PUT') }}
		                <button type="submit" class="btn btn-primary">Update</button>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection