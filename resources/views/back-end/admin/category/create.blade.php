@extends('back-end.admin.layouts.app')
@section('content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Home</a>
    <span class="breadcrumb-item active">Category</span>
  </nav>

  <div class="sl-pagebody">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div>
                            <div class="label" class=" col-form-label">Name</div>
                            <input type="text" name="name" placeholder="Category Name..." class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection