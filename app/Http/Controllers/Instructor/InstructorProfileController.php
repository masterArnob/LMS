<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use File;
use Illuminate\Support\Facades\Auth;
class InstructorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('instructor.profile.edit');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $user = Auth::user();
       
        switch($request->update_type){
            case 'profile_update':
                //dd('Profile update logic here');
                $request->validate([
                    'name' => ['required', 'string'],
                    'email' => ['required', 'email', 'unique:users,email,' . $id],
                ]);

                
                  if ($request->has('image')) {
                    if($user->image !== 'uploads/default-files/avatar.png' && File::exists(public_path($user->image))) {
                        File::delete(public_path($user->image));
                    }
                   
                    $file = $request->image;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/instructor_images/'), $file_name);
                    $user->image = '/uploads/instructor_images/' . $file_name;
                }

                $user->name = $request->name;
                $user->email = $request->email;
                $user->contact = $request->contact;
                $user->address = $request->address;
                $user->gender = $request->gender;
                $user->headline = $request->headline;
                $user->bio = $request->bio;
                $user->facebook = $request->facebook;
                $user->x = $request->x;
                $user->linkedin = $request->linkedin;
                $user->website = $request->website;
                $user->github = $request->github;
               
                $user->save();
                notyf()->success('Your profile has been updated.');
                return redirect()->back();
                break;
            case 'password_update':
                //dd('Password update logic here');
                 $request->validate([
                    'current_password' => ['required', 'current_password'],
                    'password' => ['required', Password::defaults(), 'confirmed'],
                ]);

                $user->update([
                    'password' => bcrypt($request->password),
                ]);
               notyf()->success('Your profile has been updated.');
                return redirect()->back();
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
