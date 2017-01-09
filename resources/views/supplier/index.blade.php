@extends('layouts.master')
    
    @section('title') Supplier! @endsection

    @section('content')
        <div id="content">
            <a href="{{ URL::to('suppliers/create') }}" class="btn btn-success">Add Supplier</a>
            <table class="table">
		        <thead>
		            <tr>
		                <th>Supplier Name</th>
		                <th>Email</th>
		                <th>Supplier Image</th>
		                <th>Phone Number</th>
		                <th>Product Name</th>
		                <th>Address</th>
		                <th>City</th>
		                <th>Zip</th>
		                <th>Account #</th>
		            </tr>
		        </thead>
		        <tbody>
		            @if ( ! empty( $suppliers ) )
		                @foreach ($suppliers as $supplier)
		                <tr>
		                	<td>{{ $supplier->company_name }}</td>
		                    <td>{{ $supplier->email }}</td>
		                    <td class="account-image"><a href="#"><img src="{{ asset('images/suppliers/' . $supplier->avatar ) }}" alt="" class="account-image img-responsive"></a></td>
		                    <td>{{ $supplier->phone_number }}</td>
		                    <td>{{ $supplier->address }}</td>
		                    <td>{{ $supplier->city }}</td>
		                    <td>{{ $supplier->zip }}</td>
		                    <td>{{ $supplier->account }}</td>
		                    <td align="right">
		                    <a href="{{ URL::to('suppliers/' . $supplier->id . '/edit') }}" class="btn btn-success">Edit</a>
		                    </td>
		                    <td align="right">
		                    	<form method="post" action="{{ URL::to('suppliers/' . $supplier->id ) }}">
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