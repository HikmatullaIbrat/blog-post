<?php

namespace App\Http\Controllers;

// use App\Models\Setting;
use App\Models\Setting;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Session;

class SettingController extends Controller
{
    public function index(){
        return view('backend.settings.index')
        ->with('settings',Setting::skip(1)->take(1)->first());
        dd(Setting::skip(1)->take(1)->first());
    }
    public function store(Request $request){

        // dd('STORE FUNCTION EXECUTED');


        $request->validate([
            'logo'=>'required', 
            'facebook'=>'url',
            'twitter'=>'url',
            'email'=>'email',
            'phone'=>'string',
            'address' => 'string',

        ]);
        // dd("This is request: ");
        // Setting::where('id','2')->update(['logo'=>$request->logo, 'facebook'=>$request->facebook, 'twitter'=>$request->twitter, 'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->address]);
        $settings = Setting::skip(1)->take(1)->first();
        if (!$settings) {
            $settings = new Setting();
        }
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $settings->logo = $logoPath;
        }
        $settings->save();

        $data = [
            // 'logo' => $request->logo,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter, 
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        // dd($data); // Check the data being passed

             Setting::updateOrCreate(
            ['id' => 2], // Assuming you want to update the first record
           $data
        );
        // dd('Data saved successfully');

        Session::flash('success','Settings Updated');
        
        return redirect()->back();
        // return $request->all();
        
    }
}
