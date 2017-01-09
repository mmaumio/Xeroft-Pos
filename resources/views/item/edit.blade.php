@extends('layouts.master')
    
    @section('title') Edit item! @endsection

    @section('content')
        <div id="content">
            <div class="row">
		        <div class="col-md-6">
		            <h2>Edit Item</h2>
		            <form action="{{ route('items.update', [ 'id' => $item->id ] ) }}" method="post" enctype="multipart/form-data">
		                <div class="form-group {{ $errors->has('tracking_number') ? 'has-error' : '' }}">
		                    <label for="Tracking Info">Tracking Info</label>
		                    <input class="form-control" type="text" name="tracking_number" id="tracking_number" value="{{ $item->tracking_number }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('item_name') ? 'has-error' : '' }}">
		                    <label for="Item Name">Item Name</label>
		                    <input class="form-control" type="text" name="item_name" id="item_name" value="{{ $item->item_name }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('item_image') ? 'has-error' : '' }}">
		                    <label for="Item Image">Item Image</label>
		                    <input class="form-control" type="file" name="item_image"></input>
		                </div>
		                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
		                	<label for="Description">Description</label>
		                    <textarea class="form-control" type="text" name="description" id="description">{{ $item->description }}</textarea>
		                </div>
		                <div class="form-group {{ $errors->has('buying_price') ? 'has-error' : '' }}">
		                    <label for="buying_price">Buying Price</label>
		                    <input class="form-control" type="text" name="buying_price" id="buying_price" value="{{ $item->buying_price }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('selling_price') ? 'has-error' : '' }}">
		                    <label for="selling_price">Selling Price</label>
		                    <input class="form-control" type="text" name="selling_price" id="selling_price" value="{{ $item->selling_price }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
		                    <label for="type">Type</label>
		                    <input class="form-control" type="text" name="type" id="type" value="{{ Request::old('type') }}"></input>
		                </div>
		                <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
		                    <label for="quantity">Quantity</label>
		                    <input class="form-control" type="number" name="quantity" id="quantity" placeholder="1" value="{{ $item->quantity }}"></input>
		                </div>
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                 {{ method_field('PUT') }}
		                <button type="submit" class="btn btn-primary">Update</button>
		            </form>
		        </div>
		     </div>
        </div>
    @endsection