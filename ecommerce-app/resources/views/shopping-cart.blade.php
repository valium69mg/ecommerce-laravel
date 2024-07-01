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
                    width:40%;
                }

                .productLink:hover {
                    text-decoration:none;
                    color:black;
                }

                .green {
                    color:green;
                }

                .toOrder {
                    margin-right: 15%;
                    align-self:end;
                    display:flex;
                    flex-direction:column;
                    align-items:end;
                    justify-content:center;
                    row-gap: 12px;
                }

                .proceedCashBtn {
                    color: white;
                    background-color:green;
                    width: 70%;
                    text-align:center;
                }

                .proceedCardBtn {
                    color: white;
                    background-color:blue;
                    width: 70%;
                    text-align:center;
                }

                .proceedCashBtn:hover {
                    color:white;
                }
                .proceedCardBtn:hover {
                    color:white;
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
                <a class="productLink" href="/productDetails/{{$product->product_id}}"><h2> {{substr($product->title,0,16).'....'}} #{{$product->product_id}}</h2>
                </a>
                @else
                <a class="productLink" href="/productDetails/{{$product->product_id}}">
                <h2> {{$product->title}} #{{$product->product_id}}</h2>
                </a>
                @endif
                <label> Quantity: {{$product->quantity}}</label>
                <h5> Total Price: ${{$product->price - $product->discount_price}}</h5>
                <form action="{{url('/editQuantity')}}" method="post">
                    @csrf
                    <input name="product_id" type="hidden" value="{{$product->id}}"/>
                    <div class="editForm">
                    <input id="quantity" name="quantity" type="number" value="{{$product->quantity}}"/>
                    <button class="button" type="submit" onclick="return confirm('Are you sure to edit this item`s quantity?')"> Edit Quantity </button>
                    </div>
                </form>
                <form action="{{url('/deleteProductCart')}}" method="post">
                    @csrf
                    <input name="product_id" type="hidden" value="{{$product->id}}"/>
                    <button class="button" type="submit" onclick="return confirm('Are you sure to delete this item?')"> <span class="red">Delete</span> </button>
                </form>
                
            </div>
            @endforeach
            <div class="cartItem total">
                    @if (isset($total))
                    <h3> Total: <span class="green">${{$total}}</span></h3>
                    @else
                    <h3> Total: $0 </h3>
                    @endif
            </div>
                
            <div class="toOrder">
                <h1> Proceed to Order: </h1>
                <a class="button proceedCashBtn" href="#"> Cash On Delivery </a>
                <a class="button proceedCardBtn" href="#"> Pay Using Card </a>
            </div>
            @endif
        </div>
      </div>
        
      <!-- footer end -->
      
@include('footer')