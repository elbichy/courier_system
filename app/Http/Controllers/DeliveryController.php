<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deliveryNew(){
        return view('dashboard.users.new');
    }

    public function deliveryRequest(){
        
    }

    public function deliveryCompleted(){

    }

    public function deliveryCancelled(){

    }
    
    
}
