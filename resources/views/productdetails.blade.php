@extends('layouts.app')

@section('content')
<br><br><br><br><br><br><br><br><br><br>
      <!-- Searchbar -->
      <section class="search-bar">
          <div class="container">
              <div class="row">
                  <div class="col-lg-10 mx-auto">
                      <form action="/searchProduct" method="POST" role="search">
                          <div class="p-1 bg-light shadow-sm">
                              <div class="input-group">
                              @csrf
                                  <input type="search" placeholder="Search for a products" name="search" class="form-control" aria-label="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-link"><i class="fas fa-search"></i></button>
                                  </div>
                              </div>
                          </div>
                      </form>

                  </div>
              </div>
          </div>

      </section>

@if($message)
{{$message}}
@endif


<center>
@forelse($product as $product)

<div class="container py-4 my-4 mx-auto d-flex flex-column">
    <div class="header">
        <div class="row r1">
            <div class="col-md-9 abc">
                <h1>{{$product->name}}</h1>
            </div>
            <div class="col-md-3 text-right pqr"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
            <p class="text-right para">Based on 250 Review</p>
        </div>
    </div>
    <div class="container-body mt-4">
        <div class="row r3">
            <div class="col-md-5 p-0 klo">
                <table>
                    <tr>
                        <th><h4><b>Price :</b></h4></th><th></th><th></th><th></th><th></th><th></th>
                        <th>{{$product->price}}</th><br>
                    </tr>
                    <tr>
                        <th><h4><b>Quantity :</h4></th><th></th><th></th><th></th><th></th><th></th>
                        <th>{{$product->quantity}}</th><br>
                    </tr>
                    <tr>
                        <th><h4><b>Description :</h4></th><th></th><th></th><th></th><th></th><th></th>
                        <th>{{$product->description}}</th><br>
                    </tr>
                    <tr>
                        <th><h4><b>Note :</h4></th><th></th><th></th><th></th><th></th><th></th>
                        <th>Cash on delivery only available.</th><br>
                    </tr>
</table>
                    <!-- <h4><b>Price :</b>{{$product->price}}</h4>
                    <h4><b>Quantity :</b>{{$product->quantity}}</h4>
                    <h4><b>Description :</b>{{$product->description}}</h4>
                    <h4><b>Note :</b>Cash on delivery only available.</h4> -->
                    
                    <form action="/cart/store" method="POST">
                    @csrf
                  <input type="hidden" name = "product_id" value="{{$product->id}}">
                    <div class=""><button href="{{$product->cart}}" id ="login">Add to cart </button> </div>
                    </form>
                    
            </div>
            <div class="col-md-7"> 
          <img src="/storage/{{$product->image}}" alt="product image" width="70%" height="75%"> </div>
        <!-- </div>
</div> -->
     <div class="footer d-flex flex-column mt-5">
        <div class="row r4">
          @empty
           product not found
            <div class="col-md-2 myt "><button type="button" class="btn btn-outh4ne-warning"><a href="#">BUY NOW</a></button></div>
           

        </div>
    </div> 
</div>
</div> 
@endforelse


@endsection 