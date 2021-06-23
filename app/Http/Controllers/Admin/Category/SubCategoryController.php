<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subCategories = SubCategory::latest()->get();
        return view('back-end.admin.sub-category.index', compact('subCategories', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:sub_categories',
            'category_id'=>'required',
            'status'=>'required'
        ]);

        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->save();

        Toastr::success('Sub Category info addedd.', ':) Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('back-end.admin.sub-category.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'status'=>'required'
        ]);

        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->status = $request->status;
        $subCategory->save();

        Toastr::success('Sub Category info updated.', ':) Success');
        return redirect()->route('sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        Toastr::success('Sub Category info deleted.', ':) Success');
        return redirect()->back();
    }
}
