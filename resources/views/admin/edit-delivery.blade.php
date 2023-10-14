@extends('admin.admin-master')
@section('title')
Manage Delivery
@endsection 

@section('main_section')
<section class="py-5">
    <form action="{{ route('update-delivery', $manageDelivery->id) }}" method="post" >
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @csrf
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Name:</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="name" value="{{ $manageDelivery->name }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Email</label>
            <div class="col-md-7">
                <input type="text" class="form-control" name="email" value="{{ $manageDelivery->email }}">
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Mobile</label>
            <div class="col-md-7">
                <input type="number" class="form-control" name="mobile" value="{{ $manageDelivery->mobile }}">
            </div>
        </div>
        
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Address</label>
            <div class="col-md-7">
                <textarea  name="address" id="address" rows="4" cols="50"  >{{ $manageDelivery->address }}</textarea>
                
            </div>
        </div>
        <div class="row mb-3 ">
            <label class="col-md-3 text-center">Status</label>
            <div class="col-md-7 ">
                {{-- <input type="radio" id="pending" name="type" value="1" {{ $products->status == 1 ? 'checked' : '' }}> --}}
                <input type="radio" id="pending" name="type" value="1" {{ $manageDelivery->type == 1 ? 'checked' : '' }}>
                <label for="published">Pending</label><br>

                <input type="radio" id="deliverd" name="type" value="0" {{ $manageDelivery->type == 0 ? 'checked' : '' }}>
                <label for="non-published">Deliverd</label><br>

                <input type="radio" id="receive" name="type" value="2" {{ $manageDelivery->type == 2 ? 'checked' : '' }}>
                <label for="non-published">Received</label><br>
                
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
