@extends('back-end.admin.layouts.app')
@section('title', 'Coupon Update')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Update Coupon</h4>
                    <p><a href="{{ route('coupons.index') }}" class="btn btn-sm btn-success"><i class="fas fa-tasks"></i> Manage Coupon</a></p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupons.update', $coupon) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Coupon</label>
                                <input type="text" name="coupon" value="{{ $coupon->coupon }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Discount</label>
                                <input type="text" name="discount" value="{{ $coupon->discount }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $coupon->status==1 ? 'selected' : '' }}>Publish</option>
                                    <option value="0" {{ $coupon->status==0 ? 'selected' : '' }}>Unpublish</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Update Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection