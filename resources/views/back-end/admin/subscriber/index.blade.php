@extends('back-end.admin.layouts.app')
@section('title', 'Subscriber Manage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-1">
                <h5>Subscriber List</h5>
                <div class="card">
                    <div class="card-header">
                        <h5 class="btn btn-sm btn-secondary">Total <span class="btn btn-sm btn-info">{{ $subscribers->count() }}</span></h5>
                        <!-- Button trigger modal -->
                        <a href="" class="btn btn-warning float-end"><i class="fas fa-trash"> Delete All</i></a>
                    </div>
                    <div class="card-body">
                        <table class="table" id="myTable">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subscribers as $key=>$subscriber)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $subscriber->email }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="deleteData({{ $subscriber->id }})">Delete</a>
                                        <form id="delete-data-{{ $subscriber->id }}" action="{{ route('subscribers.destroy', $subscriber->id) }}" method="POST" style="display: none;">
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

@endsection