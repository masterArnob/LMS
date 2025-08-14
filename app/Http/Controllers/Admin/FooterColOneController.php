<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterColOne;
use Illuminate\Http\Request;

class FooterColOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ones = FooterColOne::paginate(10);
        return view('admin.footer.footer-col-one.index', compact('ones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view('admin.footer.footer-col-one.create');
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


        $colOne = new FooterColOne();
        $colOne->title = $request->title;
        $colOne->url = $request->url;
        $colOne->status = $request->status;
        $colOne->save();
        notyf()->success('Footer Column One created successfully');
        return to_route('admin.footer-col-one.index');
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
        $one = FooterColOne::findOrFail($id);
        return view('admin.footer.footer-col-one.edit', compact('one'));
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


        $colOne = FooterColOne::findOrFail($id);
        $colOne->title = $request->title;
        $colOne->url = $request->url;
        $colOne->status = $request->status;
        $colOne->save();
        notyf()->success('Footer Column One updated successfully');
        return to_route('admin.footer-col-one.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $colOne = FooterColOne::findOrFail($id);
        $colOne->delete();
        notyf()->success('Footer Column One deleted successfully!');
        return response(['status' => 'success']);
    }
}
