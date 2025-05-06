<?php

namespace App\Http\Controllers;

use App\Models\Submissions;
use App\Models\Submit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'password' => 'required|min:6',
            'phone' => 'required|digits_between:10,15',
            'city' => 'required | string',
            // 'profile_picture' => 'nullable|file|mimes:png,jpg|max:7168',

        ]);
        // $userDetails = new Submit();
        // $userDetails->name = $request->name;
        // $userDetails->email = $request->email;
        // $userDetails->phone = $request->phone;
        // $userDetails->city = $request->city;
        // $userDetails->password = Hash::make($request->password);
        // if ($request->hasFile('profile_picture')) {
        //     $userDetails->profile_picture = $request->file('profile_picture')->store('profile_picture', 'public');
        // }
        // $userDetails->save();
        // return redirect()->route('home')->with('success', 'Your application has been submitted successfully.');
        $userDetails = $request->only(['name', 'email', 'phone', 'city']);
        $userDetails['password'] = Hash::make($request->password);

        // Save user
        $user = Submit::create($userDetails);

        // Create token
        $token = $user->createToken('api-token')->plainTextToken;
        // return redirect()->route('home')->with('success', 'Your application has been submitted successfully.');
        return response()->json([
            'message' => 'Registered successfully',
            'user' => $user,
            'token' => $token,
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required | string',
            'password' => 'required | string'
        ]);
        $userDetails = Submit::where('email', $request->email)->first();
        if (! $userDetails || ! Hash::check($request->password, $userDetails->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = $userDetails->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $userDetails,
            'token' => $token,
        ]);
    }
    public function show()
    {
        $user = Submit::all();
        return $user;
    }
}