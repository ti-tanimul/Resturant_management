@extends('admin.admin-master')
@section('main_section')
<section class="py-5">
    <form action="{{ route('store-service') }}" method="post" enctype="multipart/form-data" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Service Name:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Details</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="details">
            </div>
        </div>
        <div class="row mb-3 shadow">
            <label class="col-md-3 text-center">Image</label>
            <div class="col-md-7">
                <input type="file"  name="image">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-md-3"></label>
            <div class="col-md-7">
                <input type="Submit" class="btn btn-success" value="Submit">
            </div>
        </div>
    </form>
</section>
@endsection