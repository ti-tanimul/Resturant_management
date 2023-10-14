@include('header')
@include('navbar')
<br>

<!-- Service Start -->

<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
            <h1 class="display-4">Fresh & Organic Beans</h1>
        </div>
        <div class="row">
            @foreach ($results as $result)
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('images/'.$result->image) }}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-truck service-icon"></i><a>{{ $result->name }} </a></h4>
                        <p class="m-0">{{ $result->details }}</p>
                        <br>
                        <h4>Price:{{ $result->price }}</h4>
                        <p> 
                            @if ($result->stock)
                                <span style="color: green;">In Stock</span>
                            @else
                                <span style="color: red;">Out of Stock</span>
                                
                            @endif
                        </p>
                    </div>

                    <div>
                        <br>
                        {{-- <a href="{{ route('delivery', ['id'=>$result->id]) }}" class="btn btn-success">Buy Now</a>
                        <a href="{{ url('add-to-cart/'.$result->id) }}" class="btn btn-danger">Add To Cart</a> --}}
                       
                        @if ($result->stock)
                            <a href="{{ route('delivery-cart', ['id'=>$result->id]) }}" class="btn btn-success">Buy Now</a>
                            <a href="{{ url('add-to-cart/'.$result->id) }}" class="btn btn-danger">Add To Cart</a>
                        @else
                            <button class="btn btn-secondary" disabled>Buy Now</button>
                            {{-- <a href="{{ url('add-to-cart/'.$result->id) }}" class="btn btn-danger">Add To Cart</a> --}}
                            <button class="btn btn-danger" disabled>Add To Cart</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
    </div>
</div>

<!-- Service End -->
@include('footer')
