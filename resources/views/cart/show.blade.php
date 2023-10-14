@include('header')
@include('navbar')
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    
    <h4 class="text-center text-success">{{ Session::get('success') }}</h4>
    <h4 class="text-center text-success"></h4>
    <table class="table table-bordered mt-3" id="myTable">
        <thead>
            
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
            @if(session('cart'))
            @foreach ($cart as $id => $details)

            <tr>
                <td>{{ $details['name'] }}</td>
                <td>{{ $details['price'] }}</td>
                <td>
                    <form method="post" action="{{ route('update-cart', $id) }}">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $details['id'] }}" > --}}
                        <input type="hidden" value="{{ $id }}" name="id">
                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" max="5" style="width: 50px"> 
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>{{ $details['price'] * $details['quantity'] }}</td>
                <td>
                    <a href="{{ route('delete-cart', $id) }}" onclick="return confirm('Are you Sure to Delete')" class="btn btn-danger">Delete</a>
                </td>
            </tr>
                @php
                $itemTotal = $details['price'] * $details['quantity'];
                $totalPrice += $itemTotal;
                @endphp
                @endforeach
        
                @endif
            </tbody>
        </table>
      <h3 class="text-center">Total Price:{{ $totalPrice }}</h3>
      <div class="text-right">
        <a href="{{ route('delivery', $id) }}"11z class="btn btn-outline-success">Checkout</a>
      </div>

</div>
</body>
</html>
@include('footer')


