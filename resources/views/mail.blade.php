@include('header')
@include('navbar')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="text-center">
    <h1>Mail Varification</h1>
</div>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form action="{{ route('send-mail') }}" method="post">           
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Name" />
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile"
                             />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Address"
                             />
                    </div>
                    {{-- <div class="form-group">
                        <textarea type="text" class="form-control" name="message" placeholder="Message"
                             ></textarea>
                    </div> --}}
                    <div>
                        <button class="btn btn-primary btn-block font-weight-bold py-3"  type="submit">Submit</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</section>

@include('footer')