@extends('layouts.master')
    
    @section('title') Receiving Report @endsection
    @section('content')
        <div id="content">
        	<div class="row" id="main">
                <h4><strong>Supplier: </strong>{{ $supplier->company_name }}</h4>
                <h4><strong>Employee: </strong>{{ $employee->name }}</h4>
                <table width="100%" border="1" cellspacing="10" cellpadding="10">
                    <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    @foreach ( $receiving as $receive )
                        <tr>
                            <td>{{ $receive->item_id }}</td>
                            <td>{{ $receive->cost_price }}</td>
                            <td width="150">{{ $receive->quantity }}</td>
                            <td>{{ $receive->total_cost }}</td>
                        </tr>
                    @endforeach
                </table>
                       
            </div>
        </div>
    @endsection