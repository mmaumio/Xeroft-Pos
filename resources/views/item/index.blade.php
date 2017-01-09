@extends('layouts.master')
    
    @section('title') Item @endsection

    @section('content')
        <div id="content">
            <a href="{{ URL::to('items/create') }}" class="btn btn-success">Add item</a>
            <table class="table">
		        <thead>
		            <tr>
		                <th>Tracking Info</th>
		                <th>Item Name</th>
		                <th>Item Image</th>
		                <th>Description</th>
		                <th>Buying Price</th>
		                <th>Selling Price</th>
		                <th>Quantity</th>
		            </tr>
		        </thead>
		        <tbody>
		            @if ( ! empty( $items ) )
		                @foreach ($items as $item)
		                <tr>
		                	<td>{{ $item->tracking_number }}</td>
		                    <td>{{ $item->item_name }}</td>
		                    <td class="account-image"><a href="#"><img src="{{ asset('images/items/' . $item->item_image ) }}" alt="" class="img-responsive"></a></td>
		                    <td>{{ $item->description }}</td>
		                    <td>{{ $item->buying_price }}</td>
		                    <td>{{ $item->selling_price }}</td>
		                    <td>{{ $item->quantity }}</td>
		                    <td align="right">
		                    	<a href="{{ URL::to('inventory/' . $item->id . '/edit') }}" class="btn btn-success">Inventory</a>
		                    </td>
		                    <td align="right">
		                    	<a href="{{ URL::to('items/' . $item->id . '/edit') }}" class="btn btn-success">Edit</a>
		                    </td>
		                    <td align="right">
		                    	<form method="post" action="{{ URL::to('items/' . $item->id ) }}">
				                    <input type="hidden" name="_method" value="DELETE">
				                   	<input type="hidden" name="_token" value="{{ Session::token() }}"></input>
				                    <input class="btn btn-warning" type="submit" value="Delete">
			                    </form>
		                    </td>
		                </tr>    
		                @endforeach
		            @else    
		                <tr>
		                    <td>No Results Found</td>
		                </tr>
		            @endif
		        </tbody>
		    </table>   
        </div>
    @endsection