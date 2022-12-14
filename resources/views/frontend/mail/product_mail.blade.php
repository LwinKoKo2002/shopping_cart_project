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
                                        Dear {{ $order->customer->name }} ,<br>
                                        Thanks for buying our products.
                                        <p>Please wait for your products for {{ $order->city->duration->delivery_time
                                                }} to arrive your home.
                                        </p>
                                        @foreach ($order->orderItems as $item)
                                        <h4>Name - {{ $item->product->model }}</h4>
                                        <p>Storage - {{ $item->product->storage }}</p>
                                        <p>Ram - {{ $item->product->ram }}</p>
                                        <p>Cpu - {{ $item->product->cpu }}</p>
                                        <p>Quantity - {{ $item->quantity }}</p>
                                        <p>Selling Price - {{ number_format($item->product->selling_price) }} MMK</p>
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