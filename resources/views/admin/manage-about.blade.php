@extends('admin.admin-master')

@section('title', 'Manage About')

@section('main_section')
<section class="py-5">
<div class="container">
    
    <h4 class="text-center text-success">{{ Session::get('success') }}</h4>
    <h4 class="text-center text-success"></h4>
    <table class="table table-bordered mt-3" id="myTable">
        <thead class="bg-primary">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Heading</th>
            <th scope="col">Taitle 1</th>
            <th scope="col">Description 1</th>
            <th scope="col">Title 2</th>
            <th scope="col">Description 2</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($contents as $content )
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $content->heading }}</td>
            <td>{{ $content->title1 }}</td>
            <td>{{ $content->description1 }}</td>
            <td>{{ $content->title2 }}</td>
            <td>{{ $content->description2 }}</td>
            <td>
              <img style="width:70px" src="{{ asset('images/'.$content->image) }}" alt="">
            </td>
            <td><a href="{{ route('edit-about',['id'=>$content->id]) }}" class="btn btn-success">Edit</a>
              <a href="{{ route('delete-about', $content->id) }}" onclick="return confirm('Are you Sure to Delete')" class="btn btn-danger">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
</div>
</section>
@endsection


