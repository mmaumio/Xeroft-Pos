@extends('layouts.master')
    
    @section('title') Employee! @endsection

    @section('content')
        <div id="content">
            <a href="{{ URL::to('employees/create') }}" class="btn btn-success">Add employee</a>
            <table class="table">
		        <thead>
		            <tr>
		            	<th>ID</th>
		                <th>Name</th>
		                <th>Email</th>
		            </tr>
		        </thead>
		        <tbody>
		            @if ( ! empty( $employees ) )
		                @foreach ($employees as $employee)
		                <tr>
		                	<td>{{ $employee->id }}</td>
		                    <td>{{ $employee->name }}</td>
		                    <td>{{ $employee->email }}</td>
		                    <td align="right">
		                    <a href="{{ URL::to('employees/' . $employee->id . '/edit') }}" class="btn btn-success">Edit</a>
		                    </td>
		                    <td align="right">
		                    	<form method="post" action="{{ URL::to('employees/' . $employee->id ) }}">
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