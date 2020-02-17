<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Alert;
use App\Delivery;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('isActive', 0)->get();
        $deliveries = Delivery::all();
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.dashboard', compact(['users', 'deliveries']));
        }
        
    }

    

}
