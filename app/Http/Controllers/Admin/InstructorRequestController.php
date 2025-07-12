<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use File;
class InstructorRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rqs = User::where('document', '!=', null)
        ->orderBy('id', 'DESC')
        ->get();
  
        return view('admin.instructor-request.index', compact('rqs'));
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
        $instructor = User::findOrFail($id);
        return view('admin.instructor-request.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'approve_status' => ['required']
        ]);
       $instructor = User::findOrFail($id);
        if ($request->approve_status === 'approved') {
          $instructor->role = 'instructor';
       }else{
          $instructor->role = 'student';
       }
       
       $instructor->approve_status = $request->approve_status;
     
       
       $instructor->save();
       notyf()->success('Application has been updated.');
       return redirect()->back();;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $request = User::findOrFail($id);
    
           if($request->image !== 'uploads/default-files/avatar.png' && File::exists(public_path($request->image))) {
                        File::delete(public_path($request->image));
                        File::delete(public_path($request->document));
                    }


        $request->delete();
        notyf()->success('Request has been deleted successfully.');
        return response(['status' => 'success']);
    }
}
