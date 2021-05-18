@extends('layouts.app')

@section('content')
<br><br><br><br><br><br><br><br><br>
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

      <div class="cart_section">
          <div class="container-fluid">
              
              <div class="row">
                  <div class="col-lg-10 offset-lg-1">
                      
                      <div class="cart_container">
                          <div class="cart_title">Shopping Cart<small> (Select an item from your cart) </small></div>
                          <div class="cart_items">
                              <ul class="cart_list">
                                  <li class="cart_item clearfix">
                                        @foreach($product as $product)
                                      <div class="cart_item_image">
                                       <img src="/storage/{{$product->image}}"style="height:120px; width:170px;" ></div>
                                      <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                         <div class="cart_item_name cart_info_col">
                                               <div class="cart_item_title">Name
                                                </div>
                                                <div class="cart_item_text">{{ $product->name}}
                                                </div>
                                         </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                               <div class="cart_item_text">
                                                    <form action="/buynow" method="POST" >
                                                  @csrf
                                                 <input type="hidden" value="{{$product->id}}" name="product">
                                              <input type="number" name="quantity" id="quantity" onchange="price()" required>
                                                 </div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                              <div class="cart_item_text" id="price"> {{ $product->price}}</div>
                                            </div>
                                         <div class="cart_item_total cart_info_col">
                                            <div class="cart_item_title">Total</div>
                                            <div class="cart_item_text" id="finalprice">a</div>
                                            </div>
                                      </div>
                                      @endforeach
                                    </li>
                              </ul>
                            </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">Price</div>
                            </div>
                        </div>
                        <div class="cart_buttons"> 
                    <a type="button" href="/home" class="button cart_button_clear">Continue Shopping</a> 
                        <button type="submit" class="button cart_button_checkout">Buy Now</button></form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
