<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css">
    <title>Invoice</title>
</head>
<style>
    h4 {
        margin: 0;
    }
    .w-full {
        width: 100%;
    }
    .w-half {
        width: 50%;
    }
    .margin-top {
        margin-top: 1.25rem;
    }
    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
    }
    table {
        width: 100%;
        border-spacing: 0;
    }
    table.products {
        font-size: 0.875rem;
    }
    table.products tr {
        background-color: rgb(96 165 250);
    }
    table.products th {
        color: #ffffff;
        padding: 0.5rem;
    }
    table tr.items {
        background-color: rgb(241 245 249);
    }
    table tr.items td {
        padding: 0.5rem;
    }
    .total {
        text-align: right;
        margin-top: 1rem;
        font-size: 0.875rem;
    }
</style>
<body>
<table class="w-full">
    <tr>
        <td class="w-half">
            <img src="{{ asset('laraveldaily.png') }}" alt="laravel daily" width="200" />
        </td>
        <td class="w-half">
            <h2>Invoice ID: 834847473</h2>
        </td>
    </tr>
</table>

<div class="margin-top">
    <table class="w-full">
        <tr>
            <td class="w-half">
                <div><h4>To:</h4></div>
                <div>{{$invoice->name}}</div>
                <div>{{$invoice->address.' '.$invoice->town.' '.$invoice->country}}</div>
            </td>
            <td class="w-half">
                <div><h4>From:</h4></div>
                <div>Radka Staszko Pondelnikova</div>
                <div>Praha</div>
            </td>
        </tr>
    </table>
</div>

<div class="margin-top">
    <table class="products">
        <tr>
            <th>id</th>
            <th>Nazev produktu</th>
            <th>Mnozstvi</th>
            <th>Sleva v %</th>
            <th>Sazba DPH</th>
            <th>Cena</th>
        </tr>

        @foreach($invoice->items as $item)
            @php
                $total = 0;
                $total += $item->total;
                if($total < 2500){
                    $total = $total + 199;
                }

            @endphp
            <tr class="items">
                <td>{{ $loop->iteration }}</td>
                <td>
                    {{ $item->product->name }}

                </td>
                <td>
                    {{ (int) $item->quantity }}

                </td>
                <td>{{number_format($item->discount,0,',',' ')}} %</td>
                <td>{{number_format($item->tax,2,',',' ')}} %</td>
                <td>{{number_format((int) $item->total,2,',',' ').' '.$item->product->currency}} </td>
            </tr>
        @endforeach
    </table>
</div>

<div class="total">
    Total: {{number_format($total,2,',',' ').' '.$item->product->currency}}
</div>

<div class="footer margin-top">
    <div>Thank you</div>
    <div>&copy; Laravel Daily</div>
</div>
</body>
</html>
