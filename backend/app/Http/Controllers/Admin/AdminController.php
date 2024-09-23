<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthAdminRequest;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Fetch and Display today yesterday this month this year orders

    public function index()
    {
        $today_orders = Order::whereDay('created_at', Carbon::today())->get();
        $yesterday_orders = Order::whereDay('created_at', Carbon::yesterday())->get();
        $month_orders = Order::whereMonth('created_at', Carbon::now()->month)->get();
        $year_orders = Order::whereYear('created_at', Carbon::now()->year)->get();

        return view('admin.index')->with([
            'today_orders' => $today_orders,
            'yesterday_orders' => $yesterday_orders,
            'month_orders' => $month_orders,
            'year_orders' => $year_orders,
        ]);
    }

    //Display login form
    public function login()
    {
        if (!auth()->guard('admin')->check()) 
        {
            return view('admin.login');
        }
        return redirect('admin/dashboard');
    }

    //Auth the admin
    public function auth(AuthAdminRequest $request)
    {
        if ($request->validated()) 
        {
          if (auth()->guard('admin')->attempt([
                'email' => $request->email,
                'password' => $request->password,      
          ])){
            $request->session()->regenerate();
            return redirect()->route('admin.index');
          }else {
            return redirect()->route('admin.login')->with([
                'error' => 'These credentials do not match our records',
            ]);
          }
        }
    }

    //Logout the admin
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.index');
    }
}
