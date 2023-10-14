@include('header')
@include('navbar')
<br>
<br>
<br>
<section class="py-5">
    <!-- Reservation Start -->
    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row mx-auto">
                    <div class="col-lg-8">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Contact Us</h1>
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form class="mb-5" action="{{ route('store-contact') }}" method="post">
                                
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent border-primary p-4" name="name" placeholder="Name" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control bg-transparent border-primary p-4" name="email" placeholder="Email"
                                         />
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control bg-transparent border-primary p-4" name="mobile" placeholder="Mobile"
                                         />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control bg-transparent border-primary p-4" name="address" placeholder="Address"
                                         />
                                </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control bg-transparent border-primary p-4" name="message" placeholder="Message"
                                         ></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-block font-weight-bold py-3"  type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation End -->
</section>
@include('footer')