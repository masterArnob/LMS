<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use File;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        //dd($request->all());
        switch ($request->register_for) {
            case 'student':
                //dd('Registering as student');
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'student',
                    'status' => 'active',
                    'approve_status' => 'pending'
                ]);

                event(new Registered($user));

                Auth::login($user);
                return to_route('student.dashboard');

                break;
            case 'instructor':
                 //dd('Registering as instructor');
                  $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                    'contact' => ['required'],
                    'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                    'document' => ['required', 'mimes:pdf,doc,docx'],
                ]);
               

                $image = null;
                $document = null;
                if ($request->has('image')) {
                    $file = $request->image;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/instructor_images/'), $file_name);
                    $image = '/uploads/instructor_images/' . $file_name;
                }

                 if ($request->has('document')) {
                    $file = $request->document;
                    $file_name = rand() . $file->getClientOriginalName();
                    $file->move(public_path('/uploads/instructor_images/'), $file_name);
                    $document = '/uploads/instructor_images/' . $file_name;
                }

                  $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => 'student',
                    'status' => 'active',
                    'image' => $image,
                    'document' => $document,
                    'contact' => $request->contact,
                    'approve_status' => 'pending'
                ]);

                event(new Registered($user));

                Auth::login($user);
                return to_route('student.dashboard');
                break;
        }



        return redirect(route('dashboard', absolute: false));
    }
}
