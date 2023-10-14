@extends('admin.admin-master')
@section('main_section')
<section class="py-5">
    <form action="{{ route('store-about') }}" method="post" enctype="multipart/form-data" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Heading</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="heading">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Title 1</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="title1">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Description 1</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="description1">
            </div>
        </div>
        
        <div class="row mb-3 shadow">
            <label class="col-md-3 text-center">Image</label>
            <div class="col-md-7">
                <input type="file" class="form-control" name="image">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Title 2</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="title2">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Description 2</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="description2">
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