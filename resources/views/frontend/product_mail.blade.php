<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
</head>

<body>
        <div class="card">
                <div class="card-body">
                        <h4>Model - {{ $item->product->model }}</h4>
                        <p>Quantity - {{ $item->quantity }}</p>
                        <p>Total Price - {{ number_format($item->order->total )}} MMK</p>
                </div>
        </div>
</body>

</html>