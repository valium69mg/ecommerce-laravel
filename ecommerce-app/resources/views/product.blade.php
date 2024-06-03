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
                              <a href="" class="option1">
                              {{substr($product->title,0,10)}}
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
                              @if (strlen($product->title) > 15)
                              {{substr($product->title,0,16).'...'}}
                              @else
                              {{$product->title}}
                              @endif
                           </h5>
                           <h6>
                              @if ($product->discount_price == 0)
                              @else
                              <span class="discountSpan">
                              {{'-'.($product->discount_price)}}
                              </span>
                              @endif
                              
                           </h6>
                           <h6>
                              {{'$'.$product->price}}
                           </h6>
                        </div>
                     </div>
                     </div>
               @endforeach
               @endif
            </div>
            <div class="btn-box">
               <a href="">
               View All products
               </a>
            </div>
         </div>
      </section>