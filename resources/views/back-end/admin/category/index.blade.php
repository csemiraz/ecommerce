@extends('back-end.admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h4 class="text-center">Category List</h4>
                    <p><a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-info">Add New</a></p>
                    <p class="btn btn-secondary">Total <span class="badge badge-light">9</span></p>
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
                        <tr>
                            <th scope="row">1</th>
                            <td>paptop</td>
                            <td>
                                <a href="" class="btn btn-sm btn-info">Edit</a>
                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection