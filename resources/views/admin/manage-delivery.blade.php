@extends('admin.admin-master')

@section('title', 'Manage Delivery')

@section('main_section')
<section class="py-5">
<div class="container">
    
    <h4 class="text-center text-success">{{ Session::get('success') }}</h4>
    <h4 class="text-center text-success"></h4>
    <table class="table table-bordered mt-3" id="myTable">
        <thead class="bg-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
            <th scope="col">Address</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
        @foreach ($deliveris as $delivery )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $delivery->name }}</td>
            <td>{{ $delivery->email }}</td>
            <td>{{ $delivery->mobile }}</td>
            <td>{{ $delivery->address }}</td>
            <td>{{ $delivery->type }}</td>
            <td>
              <a href="{{ route('edit-delivery', ['id'=>$delivery->id]) }}" class="btn btn-success">Edit</a>
              <a href="{{ route('delete-delivery', $delivery->id) }}" onclick="return confirm('Are you Sure to Delete')" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>  
</div>
</section>
@endsection


