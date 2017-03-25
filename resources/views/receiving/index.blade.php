@extends('layouts.master')
    
    @section('title') Receiving @endsection
    @section('content')
        <div id="content">
        	<div class="row" id="main">
                
                <div class="col-md-3">
                    <label for="Search">Search Item</label>
                    <div class="form-group">
                        <input type="text" v-model="searchString" placeholder="Search here" />
                    </div>
                    <ul>
                        <li v-for="article in filteredArticles" v-on:click="addItem(article)">@{{ article.item_name }}</li>    
                    </ul>
                </div>

                <form action="{{ URL::to('receivings') }}" method="post">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Invoice">Invoice</label>
                                    <input type="text" name="receiving_id" class="form-control" readonly="1" value="@if ($receiving) {{ $receiving->id + 1 }} @else 1 @endif" />
                                </div>
                                <div class="form-group">
                                    <label for="Employee">Employee</label>
                                    <input type="text" name="username" class="form-control" value="{{ Auth::user()->name }}" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select name="supplier_id" class="form-control">
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Payment Type">Payment Type</label>
                                    <select name="payment_type" class="form-control">
                                        <option value="cash">Cash</option>
                                        <option value="check">Check</option>
                                        <option value="credit card">Credit Card</option>
                                        <option value="debit card">Debit Card</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <table width="100%" border="1" cellspacing="10" cellpadding="10" id="list">
                            <tr>
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                            <tr v-for="article in items">
                                <td width="80"><input type="text" name="item_id[]" :value="article.id" /></td>
                                <td>@{{ article.item_name }}</td>
                                <td>@{{ article.buying_price }}</td>
                                <td width="150"><input name="quantity[]" v-model="article.quantity" type="text" /></td>
                                <td>@{{ article.buying_price * article.quantity }}</td>
                                <td width="100"><button class="btn btn-warning" v-on:click="removeItem(article)">Remove</button></td>
                            </tr>
                            <tr>  
                                <td>Total: @{{ subtotal }}</td>
                            </tr>
                        </table>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-success">Complete</button>
                    </div>
                </form>
                       
            </div>
        </div>
    @endsection