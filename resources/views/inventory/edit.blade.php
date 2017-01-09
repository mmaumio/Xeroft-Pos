@extends('layouts.master')
    
    @section('title') Edit Inventory @endsection

    @section('content')
        <div id="content">
        	<h2>Inventory Data Tracking</h2>
            <table>
            	<tr>
            		<td>Item Name</td>
            		<td>{{ $item->item_name }}</td>
            	</tr>
            	<tr>
            	<td>
            		Current Quantity
            	</td>
            	<td>
            		{{ $item->quantity }}
            	</td>
            	</tr>
            	<tr>
            		<td>Add/subtract *</td>
		            <td>
		            <form action="{{ route('inventory.update', [ 'id' => $item->id ] ) }}" method="post">
		                <div class="form-group">
		                    <input class="form-control" type="text" name="in_stock" id="in-stock"></input>
		                </div>
		                <input class="form-control" type="hidden" name="remraks" id="remraks" value="Manually added"></input>
		                
		                <input type="hidden" name="_token" value="{{ Session::token() }}"></input>
		                 {{ method_field('PUT') }}
		                <button type="submit" class="btn btn-primary">Update</button>
		            </form>
		        	</td>
		        </tr>	
		    </table>
        </div>
    @endsection