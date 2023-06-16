<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;
    public function login()
    {
        return view('frontEnd.customer.auth');
    }
    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();
        if ($this->customer)
        {
            if(password_verify($request->password, $this->customer->password))
            {
                session::put('customer_id', $this->customer->id);
                session::put('customer_name', $this->customer->name);

                return redirect('/customer/dashboard');
            }
            else
            {
                return back()->with('massage','Invalid Password.');
        }
        }
        else
        {
            return back()->with('massage','Invalid email address.');
        }
    }

    public function register()
    {

    }

    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
