@extends('admin.admin-master')
@section('main_section')
<section class="py-5">
    <form action="{{ route('add_product') }}" method="post" enctype="multipart/form-data" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Product Name:</label>
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
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Price</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="price">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Service Name:</label>
            <div class="col-md-9">
                
                <select class="form-select col-md-5 form-control" name="category" aria-label="Default select example">
                    @foreach ($joinProduct as $product )
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                    
                </select>
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Stock</label>
            <div class="col-md-2">
                <input type="number" class="form-control" name="stock" value="">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Status</label>
            <div class="col-md-7">
                <input type="radio" id="published" name="status" value="1">
                    <label for="published">Published</label><br>
                <input type="radio" id="non-published" name="status" value="0">
                    <label for="non-published">Non Published</label><br>
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