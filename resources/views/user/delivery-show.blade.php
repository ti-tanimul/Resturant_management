@include('header')
@include('navbar')  
<br>
<br>
<br>
<br>
<br>
<br>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if(isset($productCarts))        
                <h1>{{ $productCarts['name'] }}</h1>
                <h3>{{ $productCarts['price'] }}</h3>
                @endif
            </div>
            
            <div class="col-md-6">
                <h2 style="text-align: center" >Delivery Addresss</h2>
                <form action="{{ route('store-delivery') }}" method="post" >
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Full Name</label>
                      <input type="text" class="form-control" name="name"
                      @if(Auth::check())
                      value="{{ Auth::user()->name }}"
                      @endif >
                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" 
                      @if(Auth::check())
                      value="{{ Auth::user()->email }}"
                      @endif >
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Mobile</label>
                      <input type="number" class="form-control" name="mobile">
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Full Address</label>
                      <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <button type="submit" class="btn btn-primary">Checkout</button>
                  </form>
            </div>
        </div>
    </div>
</section>

@include('footer')