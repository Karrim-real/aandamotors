@include('frontend.layout.head')
<link href="{{ asset('frontend/assets/css/product.css') }}" rel="stylesheet">
@include('frontend.layout.nav')

<main>
    <div class="container">
        <div class="row">
           
                
            <div class="product">
                <div class="col-md-10">
                    <br>
                    <br>
                    <div class="image">
                        <img src="{{ $prod->image  }}" width="500px" height="450px" alt="" >
                    </div>
                    <div class="title">
                        <h4>{{ $prod->name }}</h4>
                    </div>
                    <div class="price">
                        <h5>{{ $prod->selling_price }}</h5>
                    </div>
                    <div class="desc">
                        <p>{{ $prod->desc }}</p>
                    </div>
                    <div class="cart">
                        <a href="{{ url('add-to-cart/'.$prod->id) }}"><button class="btn btn-success btn-lg"> Add To Cart</button></a> 
                     </div>
                </div>
            </div>
         
        </div>
    </div>
</main>


@include('frontend.layout.footer')
