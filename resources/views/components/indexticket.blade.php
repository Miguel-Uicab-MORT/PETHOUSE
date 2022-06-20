<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket de venta</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            width: 50mm;
            font-family: Arial, Helvetica, sans-serif;
        }


        img {
            max-width: 100%;
            max-height: 100%;
            margin: 0 22px;
        }

        div.l {
            text-align: left;
        }

        div.r {
            text-align: right;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .logo {
            height: 25px;
            width: 25px;
        }

        .container {
            margin: 1mm;
            margin-bottom: 25px;
        }


        h1 {
            margin-left: 0 auto;
            margin-right: 0 auto;
            text-align: center;
            width: 32%;
            font-size: 5px;
            font-weight: bold;
        }

        h3 {
            margin-left: 0 auto;
            margin-right: 0 auto;
            width: 32%;
            font-size: 3px;
            font-weight: normal;
        }

        p {
            margin-left: 0 auto;
            margin-right: 0 auto;
            text-align: center;
            width: 32%;
            font-size: 3px;
        }
    </style>
</head>

<body>

    <div class="logo">
        <img align="center" src="img/logo-bn2.png">
    </div>

    <div class="container">
        <h1>
            Ticket de venta
        </h1>

        <p>
            Av Luis Donaldo Colosio Murrieta No.70 entre calle jalisco y
            calle Ecuador Barrio de Santa Ana, local No14 y 15 planta baja.
        </p>
        <p>
            Celular: 981-111-1111
        </p>

        <p>-------------------------------------------------------------</p>

        <div class="l">
            <h3>Cajero: {{ $cajero }}</h3>
        </div>
        <div class="l">
            <h3>Ticket: {{ $venta->id }}</h3>
        </div>
        <div class="r">
            <h3>{{ $venta->created_at }} .</h3>
        </div>

        <p>-------------------------------------------------------------</p>

        @php
            $items = json_decode($venta->content);
        @endphp
        @foreach ($items as $item)
            @php
                $subtotal = $item->qty * $item->price;
            @endphp
            <div class="l">
                <h3>{{ $item->qty . '. ' . $item->name }}</h3>
            </div>
            <div class="r">
                <h3>${{ number_format($subtotal, 2) }} .</h3>
            </div>
        @endforeach
        <p>-------------------------------------------------------------</p>
        <div class="r">
            <h3>
                <strong>
                    Total:
                </strong>
                ${{ number_format($venta->total, 2) }} .
            </h3>
            <h3>
                <strong>
                    Recibido:
                </strong>
                ${{ number_format($venta->recibido, 2) }} .
            </h3>
            <h3>
                <strong>
                    Cambio:
                </strong>
                ${{ number_format($venta->cambio, 2) }} .
            </h3>
        </div>
        <h1>
            Gracias por su compra
        </h1>
        <h1>
            PETHOUSE
        </h1>
        <h1>
            ¡REGRESE PRONTO!
        </h1>
        <p>-------------------------------------------------------------</p>

    </div>
</body>

</html>
