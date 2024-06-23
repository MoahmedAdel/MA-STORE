<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all categories
        $categories = Category::whereNull('parent_id')->get();

        //get all sub categories
        $subCategories = Category::whereNotNull('parent_id')->get();

        return view('admin.category.view', compact('categories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view('admin.category.add', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // requst marge
        $request->merge([
            'slug' => Str::slug($request->post('name')),
            'user_id' => Auth::user()->id,
        ]);

        $data = $request->except('image');
        $data['image'] = Category::uploadFlie($request);


        // store data in DB
        $category = Category::create($data);

        //PRG "post redirect get"
        $successMassegeCreate = $request->parent_id == null ? 'Category Added Successfully!' : 'Sub Category Added Successfully!';
        return Redirect::route('categories.index')->with('successCreate', $successMassegeCreate);
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
        // give category will be edit if not founded return response 404
        $category = Category::findOrFail($id);

        // give all categories except which will be edit and sub categories
        $parents = Category::where('id', '<>', $id)->whereNull('parent_id')->get();

        $check = $category->parent_id == null ? true : false;

        return view('admin.category.edit', compact('category', 'parents', 'check'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // give category will be update
        $category = Category::findOrFail($id);

        $old_file = $category->image;
        $data = $request->except('image');
        $data['image'] = Category::uploadFlie($request);

        // delete old image from disk 
        if ($old_file) {
            Storage::disk('public')->delete($old_file);
        }
        // update data and save in DB
        $category->update($data);

        // massage alert to update category
        $successMassegeUpdate = $category->parent_id == null ? 'Category Updated Successfully!' : 'Sub Category Updated Successfully!';

        return Redirect::route('categories.index')->with('successUpdate', $successMassegeUpdate);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        $successMassegeDelete = $category->parent_id == null ? 'Category Deleted Successfully!' : 'Sub Category Deleted Successfully!';

        return Redirect::route('categories.index')->with('successDelete', $successMassegeDelete);
    }
}
