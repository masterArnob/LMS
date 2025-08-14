<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterColTwo;
use Illuminate\Http\Request;

class FooterColTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $twos = FooterColTwo::paginate(10);
        return view('admin.footer.footer-col-two.index', compact('twos'));
    }

    /**
     * Show the form for creating a new resource.
     */
     public function create()
    {
           return view('admin.footer.footer-col-two.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'status' => ['required', 'in:active,inactive'],
        ]);


        $colTwo = new FooterColTwo();
        $colTwo->title = $request->title;
        $colTwo->url = $request->url;
        $colTwo->status = $request->status;
        $colTwo->save();
        notyf()->success('Footer Column Two created successfully');
        return to_route('admin.footer-col-two.index');
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
        $two = FooterColTwo::findOrFail($id);
        return view('admin.footer.footer-col-two.edit', compact('two'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $colTwo = FooterColTwo::findOrFail($id);
        $colTwo->title = $request->title;
        $colTwo->url = $request->url;
        $colTwo->status = $request->status;
        $colTwo->save();
        notyf()->success('Footer Column Two updated successfully');
        return to_route('admin.footer-col-two.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colTwo = FooterColTwo::findOrFail($id);
        $colTwo->delete();
        notyf()->success('Footer Column Two deleted successfully!');
        return response(['status' => 'success']);
    }
}
