@extends('back-end.admin.layouts.app')
@section('title', 'Sub Category Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Sub Category</h4>
                    <p><a href="{{ route('sub-categories.index') }}" class="btn btn-sm btn-success"><i class="fas fa-tasks"></i> Manage Brand</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sub-categories.update', $subCategory) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $subCategory->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Category Name</label>
                                <select name="category_id" class="form-control">
                                    <option disabled>Select</option>
                                    @foreach($categories as $key=>$category)
                                    <option value="{{ $category->id }}" {{ $subCategory->category_id==$category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $subCategory->status==1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $subCategory->status==0 ? 'selected' : '' }}>Unpublish</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Sub Category Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection