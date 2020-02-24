<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use Alert;
use PDF;
class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function deliveryNew(){
        return view('dashboard.users.new');
    }
    public function deliveryStore(Request $request){
        $delivery = auth()->user()->deliveries()->create([
            'RefNo' => time() . '-' . auth()->user()->id,
            'senderName' => $request->senderName,
            'recieverName' => $request->recieverName,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'state' => $request->state,
            'lga' => $request->lga,
            'address' => $request->address,
            'weight' => $request->weight,
            'cost' => $request->cost,
            'tellerNumber' => $request->tellerNumber,
            'description' => $request->description
        ]);

        Alert::success('Request placed successfully!', 'Success!')->autoclose(2500);
        return redirect()->route('deliveryRequest');
    }

    public function deliveryRequest(){
        $deliveries = Delivery::where('status', 0)->get();
        return view('dashboard.deliveries.pending', compact(['deliveries']));
    }

    public function deliveryPending(){
        $deliveries = Delivery::where('status', 1)->get();
        return view('dashboard.deliveries.Inprogress', compact(['deliveries']));
    }
    
    public function deliveryCompleted(){
        $deliveries = Delivery::where('status', 2)->get();
        return view('dashboard.deliveries.completed', compact(['deliveries']));
    }

    public function deliveryCancelled(){
        $deliveries = Delivery::where('status', 3)->get();
        return view('dashboard.deliveries.cancelled', compact(['deliveries']));
    }

    public function approveDelivery(Delivery $delivery){
        $delivery->update([
            'status' => 1
        ]);
        
        Alert::success('Request approved successfully!', 'Success!')->autoclose(2500);
        return redirect()->back();
    }

    public function cancelDelivery(Delivery $delivery){
        $delivery->update([
            'status' => 3
        ]);
        
        Alert::success('Request approved successfully!', 'Success!')->autoclose(2500);
        return redirect()->back();
    }

    public function completeDelivery(Delivery $delivery){
        $delivery->update([
            'status' => 2
        ]);
        
        Alert::success('Request approved successfully!', 'Success!')->autoclose(2500);
        return redirect()->back();
    }

    public function requestReciept(Delivery $delivery){
        $myDelivery = $delivery->with('user')->first();
        $pdf = PDF::loadView('dashboard.deliveries.reciept', ['order' => $myDelivery]);
        // $pdf->loadView('dashboard.deliveries.reciept', ['order' => $myDelivery]);
        return $pdf->stream('invoice.pdf');
        // return view('dashboard.deliveries.reciept', compact(['myDelivery']));
    }

    public function myDeliveryRequest(){
        $deliveries = auth()->user()->deliveries()->where('status', 0)->get();
        return view('dashboard.deliveries.pending', compact(['deliveries']));
    }

    public function myDeliveryInprogress(){
        $deliveries = auth()->user()->deliveries()->where('status', 1)->get();
        return view('dashboard.deliveries.Inprogress', compact(['deliveries']));
    }
    
    public function myDeliveryCompleted(){
        $deliveries = auth()->user()->deliveries()->where('status', 2)->get();
        return view('dashboard.deliveries.completed', compact(['deliveries']));
    }

    public function myDeliveryCancelled(){
        $deliveries = auth()->user()->deliveries()->where('status', 3)->get();
        return view('dashboard.deliveries.cancelled', compact(['deliveries']));
    }
    
    
}
