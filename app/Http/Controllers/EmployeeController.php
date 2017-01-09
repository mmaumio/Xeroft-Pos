<?php

namespace App\Http\Controllers;

use App\User; 
use Illuminate\Http\Request;
use \Redirect, \Validator, \Session, \Hash;
use App\Http\Requests;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::all();
        return view('employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
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
            'password' => 'required|same:password',
            'password_confirmation' => 'required|same:password',    
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);

        $users->save();

        Session::flash('message', 'You\ve successfully added an Employee');

        return Redirect::to('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = User::find($id);

        return view('employee.edit')->with('employee', $employees);
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
        if($id == 2)
        {
            Session::flash('message', 'You cannot delete admin');
            Session::flash('alert-class', 'alert-danger');
                return Redirect::to('employees');
        }
        else
        {       
            try 
            {
                $users = User::find($id);
                $users->delete();
                // redirect
                Session::flash('message', 'You have successfully deleted employee');
                return Redirect::to('employees');
            }
            catch(\Illuminate\Database\QueryException $e)
            {
                Session::flash('message', 'Integrity constraint violation: You Cannot delete a parent row');
                Session::flash('alert-class', 'alert-danger');
                return Redirect::to('employees');   
            }
        }
    }
}
