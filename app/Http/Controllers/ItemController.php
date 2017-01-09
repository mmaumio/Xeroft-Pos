<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Redirect, \Validator, \Session;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'item_name' => 'required|max:120',
        ]);

        $item = new Item;
        $item->tracking_number = $request->tracking_number;
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->buying_price = $request->buying_price;
        $item->selling_price = $request->selling_price;
        $item->type = $request->type;
        $item->quantity = $request->quantity;

        $item->save();

        $image = $request->file('item_image');
            if( ! empty( $image ) ) {
                $itm_av_name = strtolower( $item->item_name );
                $itm_av_name = str_replace( ' ', '-', $itm_av_name );     
                $avatar_name = $itm_av_name . $item->id . '.' . $request->file('item_image')->getClientOriginalExtension();

                $request->file('item_image')->move( base_path() . '/public/images/items/', $avatar_name );

                $item_avatar = Item::find($item->id);
                $item_avatar->item_image = $avatar_name;
                $item_avatar->save();
            }

        Session::flash('message', 'You have successfully added item');

        return Redirect::to('items');
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
        $items = Item::find($id);
        return view('item.edit')->with('item', $items);
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
        $this->validate( $request, [
            'item_name' => 'required|max:120',
        ]);

        $item = Item::find($id);
        $item->tracking_number = $request->tracking_number;
        $item->item_name = $request->item_name;
        $item->description = $request->description;
        $item->buying_price = $request->buying_price;
        $item->selling_price = $request->selling_price;
        $item->quantity = $request->quantity;

        $item->save();

        $image = $request->file('item_image');
                if( ! empty( $image ) ) {
                    $itm_av_name = strtolower( $item->item_name );
                    $itm_av_name = str_replace( ' ', '-', $itm_av_name );     
                    $avatar_name = $itm_av_name . $item->id . '.' . $request->file('item_image')->getClientOriginalExtension();

                    $request->file('item_image')->move( base_path() . '/public/images/items/', $avatar_name );

                    $item_avatar = Item::find($item->id);
                    $item_avatar->avatar = $avatar_name;
                    $item_avatar->save();
                }

        Session::flash('message', 'You have successfully updated item');

        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $items = Item::find($id);
            $items->delete();
            // redirect
            Session::flash('message', 'You have successfully deleted item');
            return Redirect::to('items');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('items');
        }
    }
}
