<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Redirect, \Validator, \Session;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
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
            'company_name' => 'required|max:120',
            'email' => 'required|email|unique:suppliers',
        ]);

        $supplier = new Supplier;
        $supplier->company_name = $request->company_name;
        $supplier->product_name = $request->product_name;
        $supplier->email = $request->email;
        $supplier->phone_number = $request->phone_number;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->zip = $request->zip;
        $supplier->account = $request->account;

        $supplier->save();

        $image = $request->file('avatar');
            if( ! empty( $image ) ) {
                $sup_av_name = strtolower( $supplier->product_name );
                $sup_av_name = str_replace( ' ', '-', $sup_av_name );     
                $avatar_name = $sup_av_name . $supplier->id . '.' . $request->file('avatar')->getClientOriginalExtension();

                $request->file('avatar')->move( base_path() . '/public/images/suppliers/', $avatar_name );

                $supplier_avatar = Supplier::find($supplier->id);
                $supplier_avatar->avatar = $avatar_name;
                $supplier_avatar->save();
            }

        Session::flash('message', 'You have successfully added supplier');

        return Redirect::to('suppliers');
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
        $suppliers = Supplier::find($id);
        return view('supplier.edit')->with('supplier', $suppliers);
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
            'company_name' => 'required|max:120',
        ]);

        $supplier = Supplier::find($id);
        $supplier->company_name = $request->company_name;
        $supplier->product_name = $request->product_name;
        $supplier->email = $request->email;
        $supplier->phone_number = $request->phone_number;
        $supplier->address = $request->address;
        $supplier->city = $request->city;
        $supplier->zip = $request->zip;
        $supplier->account = $request->account;

        $supplier->save();

        $image = $request->file('avatar');
            if( ! empty( $image ) ) {
                $sup_av_name = strtolower( $supplier->product_name );
                $sup_av_name = str_replace( ' ', '-', $sup_av_name );     
                $avatar_name = $sup_av_name . $supplier->id . '.' . $request->file('avatar')->getClientOriginalExtension();

                $request->file('avatar')->move( base_path() . '/public/images/suppliers/', $avatar_name );

                $supplier_avatar = Supplier::find($supplier->id);
                $supplier_avatar->avatar = $avatar_name;
                $supplier_avatar->save();
            }

        Session::flash('message', 'You have successfully added supplier');

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
            $suppliers = Supplier::find($id);
            $suppliers->delete();
            // redirect
            Session::flash('message', 'You have successfully deleted supplier');
            return Redirect::to('suppliers');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('suppliers');
        }
    }
}
