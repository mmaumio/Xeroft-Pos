@extends('layouts.master')
    
    @section('title') Create Customer! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Add New Customer</h2>
		            <form action="{{ url('customers') }}" method="post" enctype="multipart/form-data">
		                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
		                    <label for="Name">Name</label>
		                    <input class="form-control" type="text" name="name" id="name" value="{{ Request::old('name') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
		                    <label for="Avatar">Avatar</label>
		                    <input class="form-control" type="file" name="avatar"></input>
		                </div>
		                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                    <label for="Email">Email</label>
		                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
		                    <label for="Phone Number">Phone Number</label>
		                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ Request::old('phone_number') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
		                    <label for="address">Address</label>
		                    <input class="form-control" type="text" name="address" id="address" value="{{ Request::old('address') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
		                    <label for="city">City</label>
		                    <input class="form-control" type="text" name="city" id="city" value="{{ Request::old('city') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
		                    <label for="zip">Zip</label>
		                    <input class="form-control" type="text" name="zip" id="zip" value="{{ Request::old('zip') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
		                    <label for="Company Name">Company Name</label>
		                    <input class="form-control" type="text" name="company_name" id="company_name" value="{{ Request::old('company_name') }}"></input>
		                </div>
		                <button type="submit" class="btn btn-primary">Submit</button>
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection