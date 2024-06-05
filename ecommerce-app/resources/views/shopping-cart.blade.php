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
                .cartContainer {
                    display:flex;
                    flex-direction:column;
                    align-items: center;
                    margin-top: 24px;
                    row-gap: 24px;
                }

                .cartItem {
                    display: flex;
                    gap:24px;
                    justify-content:center;
                    align-items: center;
                    border-radius: 12px;
                    box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.75);
                    width: 70%;
                    padding: 12px 24px;
                }

                .cartItem h2 {
                    width:50%;
                }

                .cartItem img {
                    height: auto;
                    width: 144px;
                }

                .cartItem input {
                    width: 48px;
                }
                .cartItem span {
                    color:red;
                }
        </style>
</head>
      <div class="hero_area">
         <!-- header section strats -->
         @include('navbar')
         <!-- end header section -->
         <div class="cartContainer">
            @if (isset($cart))
            @foreach ($cart as $product)
            <div class="cartItem">
                <h2> {{$product->title}} {{$product->product_id}}</h2>
                <label for="quantity"> Quantity: </label>
                <input type="number" value="{{$product->quantity}}"/>
                <img src="product/{{$product->img_name}}"/>
                <h5> Total Price: ${{$product->price - $product->discount_price}}</h5>
                <a type="submit"> Edit Quantity </a>
                
                <a type="submit"> <span>Delete</span> </a>
            </div>
            @endforeach
            
            @endif
        </div>
      </div>
        
      <!-- footer end -->
      
@include('footer')