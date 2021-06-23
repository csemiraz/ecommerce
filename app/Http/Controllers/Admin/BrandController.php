<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('back-end.admin.brand.index', compact('brands'));
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
    public function photo(Request $request) {
        $image = $request->file('logo');
        $brandSlugName = Str::slug($request->name);
        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $brandSlugName.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $imagePath = 'assets/images/category/brand/';
            $imageUrl = $imagePath.$imageName;
            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
            else {
                Image::make($image)->resize(500,300)->save($imageUrl);
            }
        }
        else {
            $imageUrl = 'assets/images/default/default.jpg';
        }
        return $imageUrl;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:brands|max:30',
            'logo'=>'mimes:png,jpg,jpeg,gif|image',
            'status'=>'required'
        ]);
        $imageUrl = $this->photo($request);
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->logo = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
        
        Toastr::success('Brand added successfully :)', 'Success');
        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('back-end.admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function photoUpdate(Request $request, $brand) {
        $image = $request->file('logo');
        $brandSlugName = Str::slug($request->name);
        if(isset($image)) {
            $imageExtension = $image->getClientOriginalExtension();
            $currentDate = Carbon::now()->toDateString();
            $imageName = $brandSlugName.'_'.$currentDate.'_'.time().'.'.$imageExtension;
            $imagePath = 'assets/images/category/brand/';
            $imageUrl = $imagePath.$imageName;
            if(!file_exists($imagePath)) {
                mkdir($imagePath, 666, true);
            }
                Image::make($image)->resize(500,300)->save($imageUrl);
        }
        elseif(file_exists($brand->logo)) {
            $imageUrl = $brand->logo;
        }
        else {
            $imageUrl = 'assets/images/default/default.jpg';
        }
        return $imageUrl;
    }

    public function update(Request $request, Brand $brand)
    {
        /* $request->validate([
            'name'=>'required',
            'logo'=>'image|mimes:png,jpg,jpeg,gif',
            'status'=>'required'
        ]); */
    
        $imageUrl = $this->photoUpdate($request, $brand);
        $brand->name = $request->name;
        if(isset($request->logo) && file_exists($brand->logo) && $brand->logo!='assets/images/default/default.jpg') {
            unlink($brand->logo);
        }
        $brand->logo = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
        Toastr::success('Brand info updated successfully', ':)Success');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if(file_exists($brand->logo) && $brand->logo!='assets/images/defualt/default.jpg') {
            unlink($brand->logo);
        }
        $brand->delete();
        Toastr::success('Brand info deleted successfully.', ':) Success');
        return redirect()->back();
    }
}
