<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use Hash;
use Auth;
use Log;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function access(Request $request)
    {
        $this->validate($request, [
            'national_card_id' => 'required',
        ]);

        $patient = Patient::where('national_card_id', $request->national_card_id)->first();

        $data =[
            'patient' => $patient,
        ];

        return view('dashboard.patient.details', $data);
    }

    public function account()
    {
        return view('dashboard.account.view');
    }

    public function updateAccount(Request $request)
    {
        $validator = Validator::make(request()->all() ,[
            'profile_pic' => 'nullable|image',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'othernames' => 'nullable|string',
            'email' => 'required|email',
            'phone_number' => 'required|phone:GH',
            'affiliate_institution' => 'required|string',
            'pharmacist_card_number' => 'required|string',
            'gender' => 'required|string',
            'age' => 'required|numeric',
            'region' => 'required|string',
            'district' => 'required|string',
            'town' => 'required|string',
            'landmark' => 'required|string',
            'residential_address' => 'required|string',
        ]);
        if ($validator->fails()) {
            Log::error($validator->errors());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();
            $user->update(request()->except('profile_pic'));
            
            if(request()->profile_pic){
                $user = request()->file('profile_pic');
                $name = $user->id . '_profile_pic' . '.' .
                $image->getClientOriginalExtension();
                $folder = '/uploads/emergency_unit/';
                $filePath = $this->uploadOne($image, $folder, $name);
                $user->profile_pic = $filePath;
                $user->save();
            }
            
            DB::commit();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();

            session()->flash('error_message', 'Paramedic\'s Details Was Not Successfully Updated.');
            return redirect()->back();
        }

        session()->flash('success_message', 'Paramedic\'s Details Was Successfully Updated.');

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        DB::beginTransaction();

        try {
            $user = auth()->user();
            if(Hash::check($request->old_password, $user->password)){
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }else{
                session()->flash('error_password', 'Old Password was Inaccurate.');
                return redirect()->back();
            }
            DB::commit();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            DB::rollback();

            session()->flash('error_password', 'Password Update was Not Successfully.');
            return redirect()->back();
        }

        session()->flash('success_password', 'Password Update was Successfully.');

        return redirect()->back();
    }
}
