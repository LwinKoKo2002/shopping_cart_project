<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!--  Cdn Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
        <div class="row">
                <div class="col-md-6">
                        <div class="card">
                                <div class="card-body">
                                        <div
                                                style="width: 40px;height:40px;background-color:aqua;border-radius:50%;display:flex;justify-content:center;align-items:center;">
                                                <i class="fa-solid fa-check" style="font-size: 20px"></i>
                                        </div>
                                        Dear {{ $order->customer->name }} ,<br>
                                        Thanks for buying our products.
                                        <p>Please wait for your products for {{ $order->city->duration->delivery_time }}
                                        </p>
                                        @foreach ($order->orderItems as $item)
                                        <h4>Model - {{ $item->product->model }} {{ $item->product->storage }}</h4>
                                        <p>Quantity - {{ $item->quantity }}</p>
                                        <p>Selling Price - {{ $item->product->selling_price }}</p>
                                        <div style="width: 400px;margin-bottom:2px solid black;"></div>
                                        <p style="margin-bottom:30px;">Total Price - {{
                                                number_format($item->order->total )}} MMK</p>
                                        @endforeach
                                </div>
                        </div>
                </div>
        </div>

        <!-- Link to JQuery 3.6.0 cdn js -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Boostrp 4 cdn js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
        </script>
</body>

</html>