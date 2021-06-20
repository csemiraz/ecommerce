@extends('back-end.admin.layouts.app')
@section('title', 'Category Manage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <div>
                    <h4 class="text-center">Category List</h4>
                    <p><a href="{{ route('categories.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Create</a></p>
                    <p class="btn btn-secondary">Total <span class="btn btn-sm btn-info">{{ $categories->count() }}</span></p>
                </div>
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key=>$category)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger" onclick="deleteData({{ $category->id }})">Delete</a>
                                <form id="delete-data-{{ $category->id }}" action="{{ route('categories.destroy', $category) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection