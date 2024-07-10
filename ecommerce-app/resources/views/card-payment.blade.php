<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>Card Payment </title>
    <style>
        
        .paymentPage {
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: whitesmoke;
            font-family: "Inter", sans-serif;
        }

        .paymentContainer {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            background-color: white;
            width: 30%;
            height: 50%;
            border-radius: 6px;
            padding:12px 24px;
            box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.75);
        }

        .formContainer {
            width: 100%;
        }

        .detailContainer {
            display:flex;
            flex-direction: column;
            align-items: start;
            justify-content: center;
            margin: 24px;
            font-weight: bold;
        }

        .detailContainer input {
            width: 100%;
            height: 32px;
            border-radius: 3px;
        }

        .shortEntry {
            width: 30%;
        }

        
        .detailContainer button {
            justify-self: center;
            align-self: center;
            width: 40%;
            background-color: blueviolet;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 1rem;
        }

        .paymentBanner {
            display:flex;
            flex-direction: column;
            align-items: center;
            column-gap: 12px;
            color:blueviolet;
        }

    </style>
</head>
<body>
    <div class="paymentPage">
        <div class="paymentContainer">
            <div class="paymentBanner">
            <h1> CARD PAYMENT </h1>    
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1z"/>
            </svg>
            </div>
            <form method="post" action="" class="formContainer">
                @csrf
                <div class="detailContainer">
                <label for="name">Name on Card</label>
                <input name="name" type="text" placeholder="Ex. John Doe"/>
                </div>

                <div class="detailContainer">
                <label for="cardNumber"> Card Number </label>
                <input name="cardNumber" type="text" placeholder="Ex. 4242 4242 4242 4242"/>
                </div>

                <div class="detailContainer shortEntry">
                <label for="cvc">CVC</label>
                <input name="cvc" type="text" placeholder="CVC"/>
                </div>

                <div class="detailContainer shortEntry">
                <label for="expMonth"> Expiration Month </label>
                <input name="expMonth" type="text" placeholder="MM"/>
                </div>

                <div class="detailContainer shortEntry">
                <label for="expYear">Expiration Year</label>
                <input name="expYear" type="text" placeholder="YYYY"/>
                </div>

                <div class="detailContainer">
                @if(isset($total))
                    <button type="submit"> Pay Now (${{$total}}) </button>
                @endif    
                </div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>