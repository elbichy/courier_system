<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;
use App\Document;
use App\Formation;
use App\Lga;
use App\Rank;
use App\State;
use Illuminate\Support\Facades\Storage;
use Rap2hpoutre\FastExcel\FastExcel;
use Yajra\DataTables\Facades\DataTables;

class PersonnelController extends Controller
{

    // CONSTRUCTOR
    public function __construct()
    {
        $this->middleware('auth');
    }


    // SHOW ALL PERSONNEL
    public function index()
    {
        return view('dashboard.personnel.all');
    }
    public function get_all(){
        $personnel = User::orderBy('created_at', 'DESC')->get();
        return DataTables::of($personnel)
            ->editColumn('created_at', function ($personnel) {
                return $personnel->created_at->toFormattedDateString();
            })
            ->addColumn('view', function($personnel) {
                return '
                    <a href="/dashboard/personnel/file/'.$personnel->service_number.'" class="login_btn btn-small btn waves-effect waves-light"><i class="material-icons left">folder_shared</i> Browse</a>
                ';
            })
            ->rawColumns(['view'])
            ->make();
    }


    // CREATE NEW PERSONNEL
    public function create()
    {
        $formations = Formation::all();
        return view('dashboard/personnel/new', compact(['formations']));
    }


    // STORE NEW PERSONNEL
    public function store(Request $request)
    {
        
        $validation = $request->validate([
            'type' => 'string',
            'name' => 'required|string',
            'service_number' => 'required',
            'rank' => 'string',
            'dob' => 'required',
            'gender' => 'string',
            'religion' => 'string',
            'tribe' => 'string',
            'phone' => 'string',
            'geoPol' => 'string',
            'soo' => 'required',
            'lgoo' => 'string',
            'address' => 'string',
            'dofa' => 'required',
            'doc' => 'required',
            'dopa' => 'required',
            'command' => 'string',
            'ippisNo' => 'required',
            'bank' => 'string',
            'accName' => 'string',
            'accNo' => 'required',
        ]);
        $image_name = NULL;
        if($request->has('passport')){

            $val = $request->validate([
                'passport' => 'required|image|mimes:jpeg,png,jpg,|max:800',
            ]);

            $file = $request->file('passport');
            $image = $file->getClientOriginalName();
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = $request->service_number.'.'.$ext;
            $file->storeAs('public/documents/'.$request->service_number.'/passport/', $image_name);
            // $image->storeAs('public/documents/'.$request->service_number.'/passport/', $image->getClientOriginalName());
        }

        $personnel = User::create([
            'type' => $request->type,
            'username' => $request->service_number,
            'name' => $request->name,
            'service_number' => $request->service_number,
            'password' => Hash::make($request->service_number.$request->phone),
            'rank' => $request->rank,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'tribe' => $request->tribe,
            'phone' => $request->phone,
            'email' => $request->email,
            'geoPol' => $request->geoPol,
            'soo' => $request->soo,
            'lgoo' => $request->lgoo,
            'address' => $request->address,
            'dofa' => $request->dofa,
            'doc' => $request->doc,
            'dopa' => $request->dopa,
            'command' => $request->command,
            'ippisNo' => $request->ippisNo,
            'bank' => $request->bank,
            'accName' => $request->accName,
            'accNo' => $request->accNo,
            'passport' => $image_name,
        ]);
        
        if($personnel){
            if($request->has('file')){

                $images = $request->file('file');
                foreach($images as $image)
                {
                    $file_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    $image->storeAs('public/documents/'.$personnel->service_number.'/', $image->getClientOriginalName());

                    $upload = User::find($personnel->id)->documents()->create([
                        'title' => $file_name,
                        'file' => $image->getClientOriginalName()
                    ]);
                }
            }
            Alert::success('Personnel record added successfully!', 'Success!')->autoclose(2500);
            return redirect()->route('newPersonnel');
        }

    }

    // IMPORT NEW PERSONNEL
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);

        // 'name' => $line['Name'],

        $path = $request->file('import_file')->getRealPath();
        $data = (new FastExcel)->import($path);
        if($data->count()){
            $users = (new FastExcel)->import($path, function ($line) {
                return User::create([
                    'name' => $line['name'], 
                    'username' => $line['username'],
                    'email' => $line['email'],
                    'phone' => $line['phone'],
                    'gender' => $line['gender'],
                    'dob' => $line['dob'],
                    'geoPol' => $line['geoPol'],
                    'soo' => $line['soo'],
                    'lgoo' => $line['lgoo'],
                    'address' => $line['address'],
                    'religion' => $line['religion'],
                    'tribe' => $line['tribe'],
                    'type' => $line['type'],
                    'service_number' => $line['service_number'],
                    'dofa' => $line['dofa'],
                    'doc' => $line['doc'],
                    'dopa' => $line['dopa'],
                    'rank' => $line['rank'],
                    'ippisNo' => $line['ippisNo'],
                    'bank' => $line['bank'],
                    'accName' => $line['accName'],
                    'accNo' => $line['accNo'],
                    'command' => $line['command']
                ]);
            });
            Alert::success('Personnel records imported successfully!', 'Success!')->autoclose(2500);
            return back();
        }

        // return back()->with('success', 'Insert Record successfully.');
        
    }

    // EXPORT MULTIPLE PERSONNEL
    public function export()
    {
        
    }

    // SHOW SPECIFIC PERSONNEL
    public function show($user)
    {
        $personnel = User::where('service_number', $user)->with('documents')->first();
        $state = State::where('id', $personnel->soo)->first();
        $lga = Lga::where('id', $personnel->lgoo)->first();
        $rank = Rank::where('id', $personnel->rank)->first();
        return view('dashboard/personnel/show', compact(['personnel', 'state', 'lga', 'rank']));
    }


    // EDIT A PERSONNEL
    public function edit($user)
    {
        $personnel = User::where('service_number', $user)->first();
        $lga = Lga::where('id', $personnel->lgoo)->first();
        $lga = $lga !== NULL ? $lga->lg_name : '';
        $rank = Rank::where('id', $personnel->rank)->first();
        $rank = $rank !== NULL ? $rank->full_title : '';
        return view('dashboard/personnel/edit', compact(['personnel', 'lga', 'rank']));
    }


    // UPDATE A PERSONNEL RECORD
    public function update(Request $request, User $user)
    {
        $validation = $request->validate([
            'type' => 'string',
            'name' => 'required|string',
            'service_number' => 'required',
            'rank' => 'string',
            'dob' => 'required',
            'gender' => 'string',
            'religion' => 'string',
            'tribe' => 'string',
            'phone' => 'string',
            'geoPol' => 'string',
            'soo' => 'required',
            'lgoo' => 'string',
            'address' => 'string',
            'dofa' => 'required',
            'doc' => 'required',
            'dopa' => 'required',
            'command' => 'string',
            'ippisNo' => 'required',
            'bank' => 'string',
            'accName' => 'string',
            'accNo' => 'required',
        ]);

        $image_name = $user->passport;
        if($request->has('passport')){

            $val = $request->validate([
                'passport' => 'required|image|mimes:jpeg,png,jpg,|max:80',
            ]);

            $file = $request->file('passport');
            $image = $file->getClientOriginalName();
            $ext = pathinfo($image, PATHINFO_EXTENSION);
            $image_name = $request->service_number.'.'.$ext;
            $file->storeAs('public/documents/'.$request->service_number.'/passport/', $image_name);
        }

        $personnel = $user->update([
            'type' => $request->type,
            'username' => $request->service_number,
            'name' => $request->name,
            'service_number' => $request->service_number,
            'password' => Hash::make($request->service_number.$request->phone),
            'rank' => $request->rank,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'tribe' => $request->tribe,
            'phone' => $request->phone,
            'email' => $request->email,
            'geoPol' => $request->geoPol,
            'soo' => $request->soo,
            'lgoo' => $request->lgoo,
            'address' => $request->address,
            'dofa' => $request->dofa,
            'doc' => $request->doc,
            'dopa' => $request->dopa,
            'command' => $request->command,
            'ippisNo' => $request->ippisNo,
            'bank' => $request->bank,
            'accName' => $request->accName,
            'accNo' => $request->accNo,
            'passport' => $image_name,
        ]);
        
        if($request->has('file')){

            $images = $request->file('file');
            foreach($images as $image)
            {
                $file_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $image->storeAs('public/documents/'.$request->service_number.'/', $image->getClientOriginalName());

                $upload = $user->documents()->create([
                    'title' => $file_name,
                    'file' => $image->getClientOriginalName()
                ]);
            }
        }
        Alert::success('Personnel record updated successfully!', 'Success!')->autoclose(2500);
        return redirect()->route('showPersonnel', $user->service_number);
    }


    // DELETE PERSONNEL RECORD
    public function destroy(User $user)
    {
       
        Storage::deleteDirectory('public/documents/'.$user->service_number);
        $user->delete();
        Alert::success('Personnel record deleted successfully!', 'Success!')->autoclose(2500);
        return redirect()->route('allPersonnel');
    }
    

    // DELETE PERSONNEL DOCUMENT
    public function destroyDocument($id)
    {
        $document = Document::where('id', $id)->with('user')->first();
        Storage::delete(['public/documents/'.$document->user->service_number.'/'.$document->file]);
        $document->delete();
        Alert::success('Document deleted successfully!', 'Success!')->autoclose(2500);
        return redirect()->back();
    }
}
