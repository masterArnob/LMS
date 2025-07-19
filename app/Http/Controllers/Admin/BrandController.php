<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use File;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);
        $brand = new Brand();

        if ($request->has('image')) {


            $file = $request->image;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $brand->image = '/uploads/admin_images/' . $file_name;
        }


        $brand->url = $request->url;
        $brand->status = $request->status;
        $brand->save();
        notyf()->success('Brand created successfully!');
        return to_route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'url' => ['required', 'url'],
            'status' => ['required']
        ]);
        $brand = Brand::findOrFail($id);

        if ($request->has('image')) {
            if (File::exists(public_path($brand->image))) {
                File::delete(public_path($brand->image));
            }

            $file = $request->image;
            $file_name = rand() . $file->getClientOriginalName();
            $file->move(public_path('/uploads/admin_images/'), $file_name);
            $brand->image = '/uploads/admin_images/' . $file_name;
        }


        $brand->url = $request->url;
        $brand->status = $request->status;
        $brand->save();
        notyf()->success('Brand updated successfully!');
        return to_route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if (File::exists(public_path($brand->image))) {
            File::delete(public_path($brand->image));
        }
        $brand->delete();
        notyf()->success('Brand deleted successfully!');
        return response(['status' => 'success']);
    }
}
