<?php

namespace App\Http\Controllers;

use App\Models\Submissions;
use App\Models\Submit;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FronController extends Controller
{
    public function formControoler()
    {
        return view('welcome');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required | string',
            'phone' => 'required|digits_between:10,15',
            'city' => 'required | string',
            'profile_picture' => 'required|file|mimes:png,jpg|max:7168 ',
        ]);
        $userDetails = new Submit();
        $userDetails->name = $request->name;
        $userDetails->email = $request->email;
        $userDetails->phone = $request->phone;
        $userDetails->city = $request->city;
        if ($request->hasFile('profile_picture')) {
            $userDetails->profile_picture = $request->file('profile_picture')->store('profile_picture', 'public');
        }
        $userDetails->save();
        return redirect()->route('home')->with('success', 'Your application has been submitted successfully.');
    }
}