@extends('back-end.admin.layouts.app')
@section('title', 'Sub Category Manage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h5>Sub Category List</h5>
                <div class="card">
                    <div class="card-header">
                        <h5 class="btn btn-sm btn-secondary">Total <span class="btn btn-sm btn-info">{{ $subCategories->count() }}</span></h5>
                        <!-- Button trigger modal -->
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"> Create</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategories as $key=>$subCategory)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $subCategory->name }}</td>
                                    <td>{{ $subCategory->category->name }}</td>
                                    <td>
                                        @if($subCategory->status==1)
                                        <span class="btn btn-sm btn-success">Publish</span>
                                        @else
                                        <span class="btn btn-sm btn-warning">Unpublish</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('sub-categories.edit', $subCategory) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="deleteData({{ $subCategory->id }})">Delete</a>
                                        <form id="delete-data-{{ $subCategory->id }}" action="{{ route('sub-categories.destroy', $subCategory) }}" method="POST" style="display: none;">
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
        </div>
    </div>

    
  <!-- Modal for brand store -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('sub-categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <select name="category_id" class="form-control">
                    <option value="" disabled>Select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Publish</option>
                    <option value="0">Unpublish</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Create Sub Category</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

 
@endsection