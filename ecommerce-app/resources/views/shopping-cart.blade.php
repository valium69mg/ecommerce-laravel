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
                    width:45%;
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
                <img src="product/{{$product->img_name}}"/>
                @if (strlen($product->title) > 15)
                <h2> {{substr($product->title,0,16).'....'}} #{{$product->product_id}}</h2>
                @else
                <h2> {{$product->title}} #{{$product->product_id}}</h2>
                @endif
                <label> Quantity: {{$product->quantity}}</label>
                <h5> Total Price: ${{$product->price - $product->discount_price}}</h5>
                <form action="{{url('/editQuantity')}}" method="post">
                    @csrf
                    <input name="product_id" type="hidden" value="{{$product->id}}"/>
                    <div class="editForm">
                    <input id="quantity" name="quantity" type="number" value="{{$product->quantity}}"/>
                    <button class="button" type="submit"> Edit Quantity </button>
                    </div>
                </form>
                <form action="{{url('/deleteProductCart')}}" method="post">
                    @csrf
                    <input name="product_id" type="hidden" value="{{$product->id}}"/>
                    <button class="button" type="submit"> <span>Delete</span> </button>
                </form>
            </div>
            @endforeach
            
            @endif
        </div>
      </div>
        
      <!-- footer end -->
      
@include('footer')