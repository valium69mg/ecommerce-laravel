<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               @if (isset($data))
               @foreach ($data as $product)
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="productDetails/{{$product->id}}" class="option1">
                              Product Details
                              </a>
                              <a href="" class="option2">
                              Buy Now
                              </a>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="product/{{$product->img_name}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              @if (strlen($product->title) > 13)
                              {{substr($product->title,0,13).'...'}}
                              @else
                              {{$product->title}}
                              @endif
                           </h5>
                           <h6>
                              
                              @if ($product->discount_price == 0)
                              {{'$'.$product->price}}
                              @else
                              {{('$'.$product->price - $product->discount_price)}}
                              @endif
                              
                           </h6>
                        </div>
                        @if ($product->discount_price == 0)
                           <h6 class="discountSpan">
                              0%
                           </h6>
                           @else
                           <h6 class="discountPercent">
                           {{'-'.substr(($product->discount_price/$product->price)*100,0,3).'%'}}
                           </h6>
                        @endif
                        
                     </div>
                     </div>
               @endforeach
               {!!$data->withQueryString()->links('pagination::bootstrap-5')!!}
               @endif
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>