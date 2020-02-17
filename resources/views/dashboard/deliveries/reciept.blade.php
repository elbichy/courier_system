<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Reciept</title>
    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: 14px;
        }
        tfoot tr td {
            font-weight: bold;
            font-size: 14px;
        }
        .invoice table {
            margin: 15px;
			border: 1px solid black;
        }
        .invoice table, td, tr {
			border-collapse: collapse;
        }
		.invoice td{
			padding: 10px;
			border: 1px solid black;
		}
		.invoice th{
			padding: 10px;
		}
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #039be5;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
				<h3>{{ $order->user->name }}</h3>
                <pre>
					{{ $order->user->email }}
					{{ $order->user->phone }}
					<br /><br />
					Date: {{ $order->created_at }}
					Identifier: {{ $order->RefNo }}
					Status: Paid
				</pre>
            </td>
            <td align="center">
				<img src="{{asset('storage/logo.jpg')}}" alt="Logo" sizes="70%">
            </td>
            <td align="right" style="width: 40%;">
                <h3>Courier Management System</h3>
                <pre>
                    https://company.com
                    KB Aliyu street,
                    PDP Quarters, Suleja Niger state,
                    Nigeria.
                </pre>
            </td>
        </tr>
    </table>
</div>
<br/>

<div class="invoice">
    <h3>Payment Confirmation Reciept</h3>
    <table width="100%">
        <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
			<td>{{ $order->description }}</td>
            <td>1</td>
            <td align="right">NGN{{ $order->cost }}</td>
        </tr>
        </tbody>

        <tfoot>
        <tr>
            <td colspan="1"></td>
            <td align="left">Total</td>
            <td align="right" class="gray">NGN{{ $order->cost }}</td>
        </tr>
        </tfoot>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Courier Management System
            </td>
        </tr>

    </table>
</div>
</body>
</html>