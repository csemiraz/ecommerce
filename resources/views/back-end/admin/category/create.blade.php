@extends('back-end.admin.layouts.app')
@section('title', 'Category Create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Create Category</h4>
                    <p><a href="{{ route('categories.index') }}" class="btn btn-sm btn-success"><i class="fas fa-tasks"></i> Manage Category</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="" class="col-form-label">Name</label>
                                <input type="text" name="name" placeholder="Enter name..." class="form-control">
                            </div>
                            <div>
                                <label for="" class="col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Unpublish</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-success">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection