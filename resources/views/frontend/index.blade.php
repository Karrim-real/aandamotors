
@include('frontend.layout.head')
<link href="{{ asset('frontend/assets/css/product.css') }}" rel="stylesheet">
@include('frontend.layout.nav')

<main>
  <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 fw-normal">Punny headline</h1>
      <div class="image">
          {{-- <img src="data:image/jpeg;base64,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" alt="" srcset=""> --}}
      </div>
      <p class="lead fw-normal">And an even wittier subheading to boot. Jumpstart your marketing efforts with this example based on Apple’s marketing pages.</p>
      <a class="btn btn-outline-secondary" href="">Coming soon</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
  </div>


  <div class="container">
    <div class="row">
        @if (!count($prods))
            <div class="alert alert-warning">
                <h3> No Products Available </h3>
            </div>
        @endif
        @foreach ($prods as $prod )

        <div class="col-md-6">
         
            <div class="product">
                <div class="product-title pg-4">
                    <h3 class="">{{ $prod->name }}</h3>
                </div>
                <div class="product-image">
                    <img src="{{ $prod->image }}" alt="{{ $prod->name }}" srcset="" width="400px" height="400px">
                </div>
                <div class="col-md-6">
                    <h4> ${{ $prod->selling_price }}</h4>
                </div>
                <div class="product-desc">
                    <p style="font-size: 18px">{{ $prod->desc }}</p>
                </div>
                <div class="col-md-6">
                   <a href="{{ url('product/'.$prod->id) }}"><button class="btn btn-primary">Add to Cart</button></a> 
                   <a href="{{ url('product/'.$prod->id) }}"> <button class="btn btn-dark btn-md">Buy Now</button></a>
                </div>
            </div>
        
        </div>
        @endforeach
    </div>
  </div>

 
</main>
{{-- @include('frontend.layout.script') --}}
@include('frontend.layout.footer')
