@include('header')
@include('navbar')
<br>
<br>
<br>
<br>
<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">Competitive Pricing</h1>
        </div>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('images/'.$product->image) }}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-truck service-icon"></i><a>{{ $product->name }} </a></h4>
                        <p class="m-0">{{ $product->details }}</p>
                        <br>
                        <h4>Price:{{ $product->price }}</h4>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>
<!-- Menu End -->
@include('footer')