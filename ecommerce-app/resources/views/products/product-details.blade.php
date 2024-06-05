<!DOCTYPE html>
<html>
   <head>
      
        <link rel="shortcut icon" href="../template/images/favicon.png" type="">
        <title>Famms - Fashion HTML Template</title>
        <!-- bootstrap core css -->
        <link rel="stylesheet" type="text/css" href="../template/css/bootstrap.css" />
        <!-- font awesome style -->
        <link href="../template/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../template/css/style.css" rel="stylesheet" />
        <!-- responsive style -->
        <link href="../template/css/responsive.css" rel="stylesheet" />
        <style>
                .discountSpan{
                        color:transparent;
                }

                .discountPercent {
                        color:red;
                }

                .productDetailsContainer {
                    position: absolute;
                    left:50%;
                    top:15%;
                    transform: translateX(-50%);
                    display:flex;
                    background-color: #EEEEEE;
                    border-radius:12px;
                    padding: 12px;
                    gap:12px;
                }

                .productDetails {
                    display:flex;
                    flex-direction: column;
                    justify-content:center;
                    align-items:left;
                    padding: 12px 24px;
                    gap:12px;
                }

                .productDetails label {
                    text-decoration:bold;
                }

                .imgContainer img {
                    width: 480px;
                    height: auto;
                    background-color: #EEEEEE;
                    padding: 12px;
                }

                .btn {
                    border: 1px solid black;
                    border-radius: 12px;
                    padding: 12px 24px;
                }

                .pricesContainer {
                    display: flex;
                    justify-content:left;
                    align-items:center;
                    gap:12px;
                }

                .pricesContainer h4 {
                    color: #f7444e;
                }

                .discountPercent {
                    color: gray;
                }
        </style>
</head>


      <div class="hero_area">
         <!-- header section strats -->
         @include('products.navbar')
         <!-- end header section -->
         <!-- slider section -->
      </div>
      @if (isset($product))
        <div class="productDetailsContainer">
                <div class="imgContainer">
                    <img src="../product/{{$product->img_name}}"/>
                </div>
                <div class="productDetails">
                <h2> {{$product->title}}</h2>
                <p> {{$product->description}}</p>
                <div class="pricesContainer">
                <label> Price: </label>
                <h4>           
                    @if ($product->discount_price == 0)
                    {{'$'.$product->price}}
                    @else
                    {{('$'.$product->price - $product->discount_price)}}
                    @endif          
                </h4>
                </div>
                <div class="pricesContainer">
                <label> Discount: </label>
                @if ($product->discount_price == 0)
                    <h6 class="">
                        0%
                    </h6>
                    @else
                    <h6 class="discountPercent">
                    {{'-'.substr(($product->discount_price/$product->price)*100,0,3).'%'}}
                    </h6>
                @endif
                </div>
                <div class="buttonContainer">
                <button class="btn btn-gray"> Add to Cart </button>
                </div>
                </div>
        </div>
      @endif
      
      
@include('footer')