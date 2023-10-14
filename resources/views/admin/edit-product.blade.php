@extends('admin.admin-master')
@section('title')
Edit Product
@endsection 

@section('main_section')
<section class="py-5">
    <form action="{{ route('update-product', $products->id) }}" method="post" enctype="multipart/form-data" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Product Name:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" value="{{ $products->name }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Details</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="details" value="{{ $products->details }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Price</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="price" value="{{ $products->price }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Service Name:</label>
            <div class="col-md-9">
                
                <select class="form-select col-md-5 form-control" name="category" aria-label="Default select example">
                    @foreach ($services as $service )
                        <option value="{{ $service->id }}"{{ $service->id == $products->category ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Stock</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="stock" value="{{ $products->stock }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Status</label>
            <div class="col-md-7 ">
                <input type="radio" id="published" name="status" value="1" {{ $products->status == 1 ? 'checked' : '' }}>
                <label for="published">Published</label><br>

                <input type="radio" id="non-published" name="status" value="0" {{ $products->status == 0 ? 'checked' : '' }}>
                <label for="non-published">Non Published</label><br>
                
            </div>
        </div>
        <div class="row mb-3 shadow">
            <label class="col-md-3 text-center">Image</label>
            <div class="col-md-7">
                <input type="file" name="image"  >
                <img style="width: 70px" src="{{ asset('images/'.$products->image) }}" alt="">
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
