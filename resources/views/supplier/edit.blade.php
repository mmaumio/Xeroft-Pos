@extends('layouts.master')
    
    @section('title') Edit Supplier! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Edit Supplier</h2>
		            <form action="{{ route('suppliers.update', [ 'id' => $supplier->id ] ) }}" method="post" enctype="multipart/form-data">
		                <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
		                    <label for="Company Name">Company Name</label>
		                    <input class="form-control" type="text" name="company_name" id="company_name" value="{{ $supplier->company_name }}"></input>
		                </div>
		           		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
		                    <label for="email">Email</label>
		                    <input class="form-control" type="text" name="email" id="email" value="{{ $supplier->email }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('supplier_image') ? 'has-error' : '' }}">
		                    <label for="Supplier Image">Supplier Image</label>
		                    <input class="form-control" type="file" name="avatar"></input>
		                </div>
		                <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
		                	<label for="Address">Address</label>
		                    <textarea class="form-control" type="text" name="address" id="address">{{ $supplier->address }}</textarea>
		                </div>
		                <div class="form-group {{ $errors->has('product_name') ? 'has-error' : '' }}">
		                    <label for="Product Name">Product Name</label>
		                    <input class="form-control" type="text" name="product_name" id="product_name" value="{{ $supplier->product_name }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
		                    <label for="Phone Number">Phone Number</label>
		                    <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ $supplier->phone_number }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
		                    <label for="city">City</label>
		                    <input class="form-control" type="text" name="city" id="city" value="{{ $supplier->city }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
		                    <label for="zip">Zip</label>
		                    <input class="form-control" type="text" name="zip" id="zip" value="{{ $supplier->zip }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('account') ? 'has-error' : '' }}">
		                    <label for="Account">Account Number</label>
		                    <input class="form-control" type="text" name="account" id="account" value="{{ $supplier->account }}"></input>
		                </div>
		                
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                {{ method_field('PUT') }}
		                <button type="submit" class="btn btn-primary">Update</button>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection