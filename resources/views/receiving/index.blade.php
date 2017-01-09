@extends('layouts.master')
    
    @section('title') Receiving @endsection
    @section('content')
        <div id="content">
        	<div class="row">
                
                <div class="col-md-3" id="main">
                    <label for="Search">Search Item</label>
                    <div class="form-group">
                        <input type="text" v-model="searchString" placeholder="Search here" />
                    </div>
                    <ul>
                        <li v-for="article in filteredArticles">@{{ article.item_name }}</li>      
                    </ul>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Invoice">Invoice</label>
                                <input type="number" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label for="Employee">Employee</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <select class="form-control">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                    @endforeach    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Payment Type">Payment Type</label>
                                <select class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="check">Check</option>
                                    <option value="ceridt card">Credit Card</option>
                                    <option value="debit card">Debit Card</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table width="100%" border="1" cellspacing="10" cellpadding="10">
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Name</td>
                            <td>46</td>
                            <td>1</td>
                            <td>123</td>
                        </tr>
                    </table>
                </div>   
            </div>
        </div>
    @endsection