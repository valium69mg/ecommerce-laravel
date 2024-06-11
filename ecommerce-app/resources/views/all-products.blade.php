<!DOCTYPE html>
<html>
   <head>
      
        <link rel="shortcut icon" href="template/images/favicon.png" type="">
        <title>Famms - Fashion HTML Template</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="template/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="template/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="template/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="template/css/responsive.css" rel="stylesheet" />
        <style>

        </style>
</head>
      <div class="hero_area">
         <!-- header section strats -->
         @include('navbar')
         <!-- end header section -->
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
                              <form action="{{url('/addToCart')}}" method="post">
                                 @csrf
                                 <input type="hidden" name="product_id" value="{{$product->id}}"/>
                                 <input type="hidden" name="quantity" value="1"/>
                                 <button type="submit" class="option2">
                                    Add to Cart
                                 </button>
                              </form>
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
         </div>
      </section>
      </div>
        
      <!-- footer end -->
      
@include('footer')