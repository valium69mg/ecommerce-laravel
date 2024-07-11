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

                .total {
                    padding: 24px 24px;
                    justify-content: end;
                    align-items: center;
                }


                .cartItem img {
                    height: auto;
                    width: 144px;
                }

                .cartItem input {
                    width: 48px;
                }
                .cartItem .red {
                    color:red;
                }

                #quantity {
                    width: 78px;
                }

                .editForm {
                    display: flex;
                    flex-direction: column;
                    justify-content:center;
                    align-items: center;
                    gap: 6px;
                    padding: 12px 24px;
                }

                .button {
                    padding: 12px 24px;
                    border-radius: 6px;
                    background-color: #f8f9fa;
                }

                .productLink {
                    text-decoration:none;
                    color:black;
                    width:30%;
                }

                .productLink:hover {
                    text-decoration:none;
                    color:black;
                }

                .green {
                    color:green;
                }

                .gray {
                    color:gray;
                }

        </style>
</head>
      <div class="hero_area">
         <!-- header section strats -->
         @include('navbar')
         <!-- end header section -->
         <div class="cartContainer">
            <h1> My orders </h1>
            @if (isset($data))
            @foreach ($data as $product)
            <div class="cartItem">
                <img src="product/{{$product->product_image}}"/>
                @if (strlen($product->product_title) > 18)
                <a class="productLink" href="/productDetails/{{$product->product_id}}"><h2> {{substr($product->product_title,0,18).'....'}} #{{$product->product_id}}</h2>
                </a>
                @else
                <a class="productLink" href="/productDetails/{{$product->product_id}}">
                <h2> {{$product->product_title}} #{{$product->product_id}}</h2>
                </a>
                @endif
                <h5> Quantity: <span class="gray">{{$product->product_quantity}}</span></h5>
                @if ($product->payment_status == 'pending')
                <h5> Payment Status: <span class="red">{{$product->payment_status}}</span></h5>
                @elseif ($product->payment_status == 'completed')
                <h5> Payment Status: <span class="green">{{$product->payment_status}}</span></h5>
                @endif
                @if ($product->delivery_status == 'pending')
                <h5> Delivery Status: <span class="red">{{$product->delivery_status}}</span></h5>
                @elseif ($product->delivery_status == 'completed')
                <h5> Delivery Status: <span class="green">{{$product->delivery_status}}</span></h5>
                @endif
                <h5> Address: <span class="gray">{{$product->address}}</span></h5>
                <h5> Total Price: <span class="green">${{$product->product_price - $product->discount_price}}</span></h5>
            </div>
            @endforeach
            @endif
        </div>
      </div>
        
      <!-- footer end -->
      
@include('footer')