<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .email {
            width: 700px;
            margin: auto;
            font-family: sans-serif;
        }

        .header {
            justify-content: center;
            padding: 10px 0;
            display: flex;
            background-color: #f5e4e9;
            margin-bottom: 40px;
        }

        .logo {
            display: flex;
            align-items: center;
            margin: auto;
        }

        .logo-img {
            margin:auto;
            width: 50px;
            margin-right: 5px;
        }

        .logo-p {
            text-align:center;
            font-size: 17px;
            font-weight: 600;
            color: #3f3f3f;
             margin-top: 10%;
        }

        .receipt-top {
            text-align: center;
            margin-bottom: 40px;
        }

        .receipt-top-text {
            font-weight: 600;
            font-size: 33px;
            margin-bottom: 25px;
            color:black !important;
        }
        
          .receipt-top-text-p {
            color:black !important;
            font-size:17px !important;
        }

        .order-summary {
            display: flex;
            justify-content: space-between;
            font-size: 15px;
            background-color: #f5e4e9;
            padding: 20px 10px;
        }

        .order-summary-p {
            margin-bottom: 10px;
            color:black !important;
        }

        .summary {
            width: 45%;
        }

        .summary-top-p {
            font-weight: 600;
            color:black !important;
        }

        .summary-detail {
            display: flex;
            justify-content: space-between;
        }

        .shipping {
            width: 40%;
        }

        .ordered-items {
            margin-top: 40px;
            padding: 10px;
            font-size:16px;
        }

        .ordered-items-top {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid rgb(215, 215, 215);
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .ordered-items-top-p {
            font-weight: 600;
             color:black !important;
        }

        .ordered-items-top-p1{
            width: 60%;
        }

        .ordered-items-top-p2{
            width: 20%;
        }

        .ordered-items-top-p3{
            width: 20%;
        }

        .ordered-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border-bottom: 1px solid #e2e2e2;
            padding-bottom: 10px;
        }

        .name {
            width: 60%;
            color:black !important;
        }

        .qty {
            width: 20%;
             color:black !important;
        }

        .price {
            width: 20%;
             color:black !important;
        }

        .ordered-total {
            padding: 20px;
            width: 55%;
            margin-left: auto;
            color: black;
            font-size: 16px;
        }

        .ordered-total-div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .ordered-total-div-p1 {
            font-weight: 600;
        }

        footer {
            background: #f5e4e9;
            padding: 10px;
            display: flex;
            justify-content: space-between;
        }

        .footer-logo {
            width: 25%;
        }

        .footer-logo1 {
            margin-bottom: 20px;

        }

        .links-a {
            display: block;
            color: #2f2e2e;
            margin-bottom: 7px;
            font-size: 15px;
        }

        .links-a:hover {
            text-decoration: underline;
        }

      .footer-information {
            padding: 15px 0;
            width: 60%;
        }

        footer .footer-information p:nth-child(1) {
            font-weight: 600;
            font-size: 17px;
            color: #131313;
            margin-bottom: 15px;
        }

        .footer-information-p {
            font-size: 15px;
            color: #161616;
        }
    </style>
</head>

<body>

    <div class="email">


        <div class="header">
            <div class="logo">
                <img class="logo-img" src="https://printmeall.com/images1/logo2.png" alt="">
                <p class="logo-p">Printmeall</p>
            </div>
        </div>
        <div class="receipt">
            @if($user != 'admin')
            <div class="receipt-top">
                <p class="receipt-top-text">Thanks for your order</p>
                <p class="receipt-top-text-p">You'll receive email when the items are shipped. If you have any questions, Call us +971 55 6997715
                </p>
            </div>
            @else
             <div class="receipt-top">
                <p class="receipt-top-text">Hi, You Got A New Order</p>
                <p class="receipt-top-text-p">Hi, Admin. You received a new order. Please review it.
                </p>
            </div>
            @endif

            <div class="order-summary">
                <div class="summary">
                    <div class="summary-top">
                        <p class="summary-top-p">SUMMARY</p>
                    </div>
                    <div class="summary-details">
                        <div class="summary-detail">
                            <p class="order-summary-p">Order #:</p>
                            <p class="order-summary-p">{{$orders->id}}</p>
                        </div>
                        <div class="summary-detail">
                            <p class="order-summary-p">Order Date:</p>
                            <p class="order-summary-p">{{$orders->created_at}}</p>
                        </div>
                        <div class="summary-detail">
                            <p class="order-summary-p">Order Total:</p>
                            <p class="order-summary-p">{{$orders->currency}} {{$orders->total}}</p>
                        </div>
                    </div>
                </div>
                <div class="shipping">
                    <div class="summary-top">
                        <p class="summary-top-p">SHIPPING&nbsp;ADDRESS</p>
                    </div>
                    <div class="shipping-details">
                        <p class="order-summary-p">{{$orders->firstname}}&nbsp;{{$orders->lastname}}</p>
                        <p class="order-summary-p">{{$orders->line1}}&nbsp;{{$orders->province}}&nbsp;{{$orders->country}}</p>
                    </div>
                </div>
            </div>
            <div class="ordered-items">
                <div class="ordered-items-top">
                    <p class="ordered-items-top-p ordered-items-top-p1">Name</p>
                    <p class="ordered-items-top-p ordered-items-top-p1">Qty</p>
                    <p class="ordered-items-top-p ordered-items-top-p3">Price</p>
                </div>
                @foreach($orders->orderItems as $items)
                <div class="ordered-item">
                    <div class="name">
                        <p>{{$items->rproduct->name}}</p>
                    </div>
                    <div class="qty">
                        <p>{{$items->quantity}}</p>
                    </div>
                    <div class="price">{{$orders->currency}} {{$items->price}}</div>
                </div>
                @endforeach
            </div>
            <div class="ordered-total">
                <div class="ordered-total-div ordered-total-div-p1">
                    <p>Subtotal (2 items):</p>
                    <p>{{$orders->currency}} {{$orders->subtotal}}</p>
                </div>
                <div class="ordered-total-div">
                    <p>Shipping:</p>
                    <p>{{$orders->currency}} 00.0</p>
                </div>
                <div class="ordered-total-div">
                    <p>Order Total:</p>
                    <p>{{$orders->currency}} {{$orders->total}}</p>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-logo">
                <div class="footer-logo1">
                  <img class="logo-img" src="https://printmeall.com/images1/logo2.png" alt="">
                    <p><b>Printmeall</b></p>
                </div>

                <div class="links">
                    <a class="links-a" href="tel:+971 55 6997715">+971556997715</a>
                    <a class="links-a" href="https://printmeall.com/">Printmeall.com</a>
                    <a class="links-a" href="mailto:info@printmeall.com">info@printmeall.com</a>
                </div>
            </div>
            <div class="footer-information">
                <p></p>
                <p class="footer-information-p">Print Me All is the state-of-the-art one-stop custom boxes solution provider with creative print ideas in all over UAE. Our customized boxes and packaging services are available for all businesses and professional requirements. </p>
            </div>
        </footer>
    </div>
</body>

</html>