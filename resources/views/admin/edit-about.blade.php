@extends('admin.admin-master')
@section('title')
Edit About
@endsection

@section('main_section')
<section class="py-5">
    <form action="{{ route('update-about', $content->id) }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Heading</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="heading" value="{{ $content->heading }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Title 1</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="title1" value="{{ $content->title1 }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Description 1</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="description1" value="{{ $content->description1 }}">
            </div>
        </div>
        
        <div class="row mb-3 shadow">
            <label class="col-md-3 text-center">Image</label>
            <div class="col-md-7">
                <input type="file" class="form-control" name="image"  >
                <img style="width: 70px" src="{{ asset('images/'.$content->image) }}" alt="">

            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Title 2</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="title2" value="{{ $content->title2 }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Description 2</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="description2" value="{{ $content->description2 }}">
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
