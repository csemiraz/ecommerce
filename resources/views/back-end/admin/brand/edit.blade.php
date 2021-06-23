@extends('back-end.admin.layouts.app')
@section('title', 'Brand Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Brand</h4>
                    <p><a href="{{ route('brands.index') }}" class="btn btn-sm btn-success"><i class="fas fa-tasks"></i> Manage Brand</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brands.update', $brand) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $brand->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" style="height: 100px; width:120px">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $brand->status==1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $brand->status==0 ? 'selected' : '' }}>Unpublish</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Update Brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection