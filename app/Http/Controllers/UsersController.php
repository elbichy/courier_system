<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;
use Alert;

class UsersController extends Controller
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
        //
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
        //
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

    public function approveUser(User $user){
        $user->update(['isActive' => 1]);
        Alert::success('Approval Granted!', 'Success!')->autoclose(2500);
        return redirect()->route('pendingUsers');
    }

    public function declineUser(User $user){
        $user->update(['isActive' => 2]);
        Alert::success('User Declined!', 'Success!')->autoclose(2500);
        return redirect()->route('dashboard');
    }

    public function approvedUsers(){
        
        $users = User::where('isActive', 1)->get();
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.users.approved', compact(['users']));
        }
        
    }

    public function pendingUsers(){
        
        $users = User::where('isActive', 0)->get();
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.users.pending', compact(['users']));
        }
        
    }

    public function declinedUsers(){
        
        $users = User::where('isActive', 2)->get();
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.users.declined', compact(['users']));
        }
        
    }

    public function editUser(User $user){
        // return $user;
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.users.edit', compact(['user']));
        }
        
    }
    
    public function updateUser(Request $request, User $user){
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->isAdmin = $request->isAdmin;
        $user->save();
        Alert::success('User Updated!', 'Success!')->autoclose(2500);
        return redirect()->route('approvedUsers');
    }

    public function editProfile(){
        $user = auth()->user();
        if(!auth()->user()->isActive){
            return 'Admin is yet to approve your account!';
        }
        elseif(auth()->user()->isActive == 2){
            return 'Your approval has been declined';
        }
        else{
            return view('dashboard.users.editProfile', compact(['user']));
        }
        
    }

    public function updateProfile(Request $request){
        auth()->user()->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        Alert::success('User Updated!', 'Success!')->autoclose(2500);
        return redirect()->route('dashboard');
    }

    public function deleteUser(User $user, Request $request){
        $user->delete();
        Alert::success('User Updated!', 'Success!')->autoclose(2500);
        return redirect()->route('approvedUsers');
    }

}
