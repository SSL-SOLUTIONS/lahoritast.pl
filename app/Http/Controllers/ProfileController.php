<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(string $id)
  
    // {
    //     $user = User::findOrFail($id);
    //     return view('website.profile.show', compact('user'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('website.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
    return view('website.profile.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Fetch the user data based on the $id parameter
        $user = User::find($id);
    
        // Check if the user exists
        if (!$user) {
            // Handle the case where the user is not found, e.g., redirect or show an error message
        }
    
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id, 
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'image' => 'nullable|image',
        ]);
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/users'), $imageName);
            $user->image = $imageName;
           }
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone = $validatedData['phone'];
        $user->address = $validatedData['address'];
        $user->save();
        return redirect()->route('profile.show', ['profile' => $user->id])->with('success', 'Profile updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
