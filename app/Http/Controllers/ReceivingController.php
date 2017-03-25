<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Supplier;
use App\Receiving;
//use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;
use App\ReceivingItem;
use App\Http\Requests;
use \Auth, \Redirect, \Validator, \Input, \Session;

class ReceivingController extends Controller
{   

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $receiving = Receiving::orderBy('id', 'desc')->first();
        $suppliers = Supplier::all();
        return view('receiving.index', compact('items'))->with('suppliers', $suppliers)->with('receiving', $receiving);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receiving = new Receiving;
        $receiving->supplier_id = $request->supplier_id;
        $receiving->user_id = Auth::user()->id;
        $receiving->payment_type = $request->payment_type;

        $supplier = DB::table('suppliers')->where('id', $receiving->supplier_id)->first();
        $employee = DB::table('users')->where('id', $receiving->user_id)->first();

        $receiving->save();

        // Store Receiving Item

        $item_array = array_combine( $request->item_id, $request->quantity );

        $i = 0;
        foreach ($item_array as $key => $value) {
            
            $receiving_items = Item::find($key);
        
            $receivingItemData = new ReceivingItem;

            $receivingItemData->receiving_id = $receiving->id;
            $receivingItemData->item_id = $key;
            $receivingItemData->cost_price = $receiving_items->buying_price;
            $receivingItemData->quantity = $value;
            $receivingItemData->total_cost = $receiving_items->buying_price * $value ;

            /*$receiving_array = array();
            $receiving_array[$i] = $receivingItemData;
            print_r($receiving_array);
            $i++; */

            $receiving_array = array();
            $receiving_array[] = array() $receivingItemData;
            print_r($receiving_array);
            

            $receivingItemData->save();



        }
        
        
        return view('receiving.complete')->with('receiving', $receiving_array)->with('supplier', $supplier)->with('employee', $employee);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
