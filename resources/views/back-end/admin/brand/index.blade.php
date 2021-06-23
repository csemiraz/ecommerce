@extends('back-end.admin.layouts.app')
@section('title', 'Brand Manage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h5>Brand List</h5>
                <div class="card">
                    <div class="card-header">
                        <h5 class="btn btn-sm btn-secondary">Total <span class="btn btn-sm btn-info">{{ $brands->count() }}</span></h5>
                        <!-- Button trigger modal -->
                        <a href="" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus"> Create</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $key=>$brand)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <img src="{{ asset($brand->logo) }}" alt="{{ $brand->name }}" style="height: 50px; width:60px">
                                    </td>
                                    <td>
                                        @if($brand->status==1)
                                        <span class="btn btn-sm btn-success">Publish</span>
                                        @else
                                        <span class="btn btn-sm btn-warning">Unpublish</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('brands.edit', $brand) }}" class="btn btn-sm btn-info">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="deleteData({{ $brand->id }})">Delete</a>
                                        <form id="delete-data-{{ $brand->id }}" action="{{ route('brands.destroy', $brand) }}" method="POST" style="display: none;">
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
          <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" class="form-control" name="logo">
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
          <button type="submit" class="btn btn-primary">Create Brand</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

 
@endsection