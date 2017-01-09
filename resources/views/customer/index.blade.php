@extends('layouts.master')
    
    @section('title') Customer! @endsection

    @section('content')
        <div id="content">
            <a href="{{ URL::to('customers/create') }}" class="btn btn-success">Add Customer</a>
            <table class="table">
		        <thead>
		            <tr>
		                <th>Name</th>
		                <th>Avatar</th>
		                <th>Email</th>
		                <th>Phone Number</th>
		                <th>Address</th>
		                <th>City</th>
		                <th>Zip</th>
		                <th>Organization</th>
		            </tr>
		        </thead>
		        <tbody>
		            @if ( ! empty( $customers ) )
		                @foreach ($customers as $customer)
		                <tr>
		                    <td>{{ $customer->name }}</td>
		                    <td class="account-image"><a href="#"><img src="{{ asset('images/customers/' . $customer->avatar ) }}" alt="" class="img-responsive"></a></td>
		                    <td>{{ $customer->email }}</td>
		                    <td>{{ $customer->phone_number }}</td>
		                    <td>{{ $customer->address }}</td>
		                    <td>{{ $customer->city }}</td>
		                    <td>{{ $customer->zip }}</td>
		                    <td>{{ $customer->company_name }}</td>
		                    <td align="right">
		                    <a href="{{ URL::to('customers/' . $customer->id . '/edit') }}" class="btn btn-success">Edit</a>
		                    </td>
		                    <td align="right">
		                    	<form method="post" action="{{ URL::to('customers/' . $customer->id ) }}">
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