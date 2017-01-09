<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;
use \Redirect, \Validator, \Session;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $customers = Customer::all();
        return view('customer.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('customer.create');
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
            'name' => 'required|max:120',
            'email' => 'required|email|unique:customers',
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->zip = $request->zip;
        $customer->company_name = $request->company_name;

        $customer->save();

        $image = $request->file('avatar');
                if( ! empty( $image ) ) {
                    $cus_av_name = strtolower( $customer->name );
                    $cus_av_name = str_replace( ' ', '-', $cus_av_name );     
                    $avatar_name = $cus_av_name . $customer->id . '.' . $request->file('avatar')->getClientOriginalExtension();

                    $request->file('avatar')->move( base_path() . '/public/images/customers/', $avatar_name );

                    $customer_avatar = Customer::find($customer->id);
                    $customer_avatar->avatar = $avatar_name;
                    $customer_avatar->save();
                }

        Session::flash('message', 'You have successfully added customer');

        return Redirect::to('customers');
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
        $customers = Customer::find($id);
        return view('customer.edit')->with('customer', $customers);
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
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->city = $request->city;
        $customer->zip = $request->zip;
        $customer->company_name = $request->company_name;

        $customer->save();

        $image = $request->file('avatar');
                if( ! empty( $image ) ) {
                    $cus_av_name = strtolower( $customer->name );
                    $cus_av_name = str_replace( ' ', '-', $cus_av_name );     
                    $avatar_name = $cus_av_name . $customer->id . '.' . $request->file('avatar')->getClientOriginalExtension();

                    $request->file('avatar')->move( base_path() . '/public/images/customers/', $avatar_name );

                    $customer_avatar = Customer::find($customer->id);
                    $customer_avatar->avatar = $avatar_name;
                    $customer_avatar->save();
                }

        Session::flash('message', 'You have successfully updated customer');

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
            $customers = Customer::find($id);
            $customers->delete();
            // redirect
            Session::flash('message', 'You have successfully deleted customer');
            return Redirect::to('customers');
        }
        catch(\Illuminate\Database\QueryException $e)
        {
            Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('customers');
        }
    }
}
