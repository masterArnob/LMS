<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLinks;
use Illuminate\Http\Request;
use File;
class SocialLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = SocialLinks::orderBy('id', 'DESC')->paginate(10);
        return view('admin.footer.footer-social-links.index', compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footer.footer-social-links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => ['required', 'image', 'max:2048'],
            'url' => ['required', 'url'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $links = new SocialLinks();
          if ($request->has('icon')) {
            if (File::exists(public_path($links->icon))) {
                File::delete(public_path($links->icon));
            }

            $file = $request->icon;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $links->icon = '/uploads/admin_images/' . $file_name;
        }

        $links->url = $request->url;
        $links->status = $request->status;
        $links->save();
        notyf()->success('Footer Social Link created successfully');
        return to_route('admin.footer-social-links.index');
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
        
        $link = SocialLinks::findOrFail($id);
        return view('admin.footer.footer-social-links.edit', compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
           $request->validate([
            'url' => ['required', 'url'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        $links = SocialLinks::findOrFail($id);

          if ($request->has('icon')) {
            if (File::exists(public_path($links->icon))) {
                File::delete(public_path($links->icon));
            }

            $file = $request->icon;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $links->icon = '/uploads/admin_images/' . $file_name;
        }


        $links->url = $request->url;
        $links->status = $request->status;
        $links->save();
        notyf()->success('Footer Social Link updated successfully');
        return to_route('admin.footer-social-links.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $links = SocialLinks::findOrFail($id);
        if (File::exists(public_path($links->icon))) {
            File::delete(public_path($links->icon));
        }
        $links->delete();
        notyf()->success('Footer Social Link deleted successfully!');
        return response(['status' => 'success']);
    }
}
