@extends('layouts.master')
    
    @section('title') Change Password @endsection

    @section('content')
        <div id="content">
             <div class="row">
		        <div class="col-md-6">
		            <h2>Edit User Form</h2>
		            <form action="{{ route('change.pass' ) }}" method="post">
		                
					    <div class="form-group">
					    	<label for="password" class="control-label">New Password</label>
					       	<input type="password" class="form-control" id="password" name="password" placeholder="Password">
					    </div>
					   
					    <div class="form-group">
					      	<label for="password_confirmation" class="control-label">Re-enter Password</label>
					        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
					    </div>
					    <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection
