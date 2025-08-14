<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CustomPageBuilder;
use Illuminate\Http\Request;

class CustomPageBuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = CustomPageBuilder::orderBy('id', 'DESC')->paginate(10);
        return view('admin.custom-page-builder.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.custom-page-builder.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'show_at_nav' => ['required', 'in:yes,no'],
            'status' => ['required', 'in:active,inactive'],
        ]);


        $pageBuilder = new CustomPageBuilder();
        $pageBuilder->title = $request->title;
        $pageBuilder->slug = \Str::slug($request->title);
        $pageBuilder->content = $request->content;
        $pageBuilder->seo_title = $request->seo_title;
        $pageBuilder->seo_description = $request->seo_description;
        $pageBuilder->show_at_nav = $request->show_at_nav;
        $pageBuilder->status = $request->status;
        $pageBuilder->save();
        notyf()->success('Custom Page created successfully');
        return to_route('admin.custom-page-builder.index');
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
        $page = CustomPageBuilder::findOrFail($id);
        return view('admin.custom-page-builder.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'show_at_nav' => ['required', 'in:yes,no'],
            'status' => ['required', 'in:active,inactive'],
        ]);


        $pageBuilder = CustomPageBuilder::findOrFail($id);
        $pageBuilder->title = $request->title;
        $pageBuilder->slug = \Str::slug($request->title);
        $pageBuilder->content = $request->content;
        $pageBuilder->seo_title = $request->seo_title;
        $pageBuilder->seo_description = $request->seo_description;
        $pageBuilder->show_at_nav = $request->show_at_nav;
        $pageBuilder->status = $request->status;
        $pageBuilder->save();
        notyf()->success('Custom Page updated successfully');
        return to_route('admin.custom-page-builder.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $page = CustomPageBuilder::findOrFail($id);
        $page->delete();
        notyf()->success('Custom Page deleted successfully!');
        return response(['status' => 'success']);
    }
}
