@extends('admin.admin-master')
@section('title')
Edit Service
@endsection 

@section('main_section')
<section class="py-5">
    <form action="{{ route('update-service', $servicecontent->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Service Name:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" value="{{ $servicecontent->name }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Details:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="details" value="{{ $servicecontent->details }}">
            </div>
        </div>
        <div class="row mb-3 shadow">
            <label class="col-md-3 text-center">Image</label>
            <div class="col-md-7">
                <input type="file" name="image"  >
                <img style="width: 70px" src="{{ asset('images/'.$servicecontent->image) }}" alt="">

            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-3"></label>
            <div class="col-md-7">
                <input type="Submit" class="btn btn-success" value="Update">
            </div>
        </div>
    </form>
</section>
@endsection
