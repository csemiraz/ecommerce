@extends('back-end.admin.layouts.app')
@section('title', 'Category Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Category</h4>
                    <p><a href="{{ route('categories.index') }}" class="btn btn-sm btn-success"><i class="fas fa-tasks"></i> Manage Category</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div>
                                <label for="" class="col-form-label">Name</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection