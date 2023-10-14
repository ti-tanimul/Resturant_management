@extends('admin.admin-master')

@section('title', 'Manage Product')

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
            <th scope="col">Details</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Stock</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($productcontents as $productcontent )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $productcontent->name }}</td>
            <td>{{ $productcontent->details }}</td>
            <td>{{ $productcontent->price }}</td>
            <td>{{ $productcontent->services_name }}</td>
            <td>
              @if ($productcontent->stock)
                  <span style="color: green;">In Stock</span>
              @else
                  <span style="color: red;">Out of Stock</span>
              @endif
          </td>
            <td>
              <img style="width:70px" src="{{ asset('images/'.$productcontent->image) }}" alt="">
            </td>
            <td>
              <a href="{{ route('edit-product', ['id'=>$productcontent->id]) }}" class="btn btn-success">Edit</a>
              <a href="{{ route('delete-product', $productcontent->id) }}" onclick="return confirm('Are you Sure to Delete')" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
</div>
</section>
@endsection


