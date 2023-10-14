
@include('header')
@include('navbar')
<br>
<br>
<br>
<br>
<!-- Service Start -->
  
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Our Services</h4>
            <h1 class="display-4">Fresh & Organic Beans</h1>
        </div>
        <div class="row">
            @foreach ($servicecontents as $servicecontent)
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('images/'.$servicecontent->image) }}" alt="">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-truck service-icon"></i><a href="{{ route('category-product', ['id'=>$servicecontent->id]) }}">{{ $servicecontent->name }}</a></h4>
                        <p class="m-0">{{ $servicecontent->details }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Service End -->
@include('footer')