<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index')->with(['users' => User::all(),]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'tgl_lahir' => 'required',
        'gender' => 'required',
    ]);

    // Create a new User instance
    $user = new User;

    // Set the user attributes
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = Hash::make($request->password); // Hash the password
    $user->tgl_lahir = $request->tgl_lahir;
    
    // Set the default value for the 'level' field
    $user->level = 'user';

    $user->gender = $request->gender;

    // Save the user to the database
    $user->save();

    // Redirect to a success page or return a response as needed
    return redirect()->route('admin.index')->with('message', 'User created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.edit')->with(['users' => User::find($id),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'password' => 'nullable|min:8|confirmed',
            'level' => 'required|in:user,admin,author', // Ensure the level is one of these values
        ]);
    
        $user = User::findOrFail($id);
    
        // Update fields
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->gender = $request->gender;
    
        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->level = $request->level;
        $user->save();
    
        return redirect()->route('admin.index')->with('message', 'User updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();

        return back()->with('eror','databerhasil dihapus');
    }
}
