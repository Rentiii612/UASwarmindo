<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pembayaran Pesanan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        h1 {
            color: #333;
        }

        .info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8f9fa;
        }

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        .back {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-size: 15px;
        }

        button {
            background: #28a745;
            color: white;
        }

        button:hover {
            background: #218838;
        }

        .back {
            background: #6c757d;
            color: white;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Pembayaran Pesanan</h1>

        <div class="info">
            <p>
                <strong>Nomor Pesanan:</strong>
                #{{ $order->order_number }}
            </p>

            <p>
                <strong>Nomor Meja:</strong>
                {{ $order->table_number ?? '-' }}
            </p>
        </div>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h3>Detail Pesanan</h3>

        <table>

            <thead>
                <tr>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($order->items as $item)

                    <tr>
                        <td>
                            {{ $item->menu->nama_menu ?? 'Menu tidak ditemukan' }}
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </td>

                        <td>
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </td>
                    </tr>

                @endforeach

            </tbody>

        </table>

        <div class="total">
            Total Pembayaran:
            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
        </div>

        <form
            action="{{ route('kasir.payment.store', $order->id) }}"
            method="POST"
        >

            @csrf

            <label for="amount_paid">
                Jumlah Uang Dibayar
            </label>

            <input
                type="number"
                id="amount_paid"
                name="amount_paid"
                min="{{ $order->total_amount }}"
                required
            >

            <label for="payment_method">
                Metode Pembayaran
            </label>

            <select
                id="payment_method"
                name="payment_method"
                required
            >

                <option value="">
                    -- Pilih Metode Pembayaran --
                </option>

                <option value="cash">
                    Cash
                </option>

                <option value="qris">
                    QRIS
                </option>

                <option value="transfer">
                    Transfer
                </option>

            </select>

            <div class="buttons">

                <a
                    href="{{ route('kasir.orders') }}"
                    class="back"
                >
                    Kembali
                </a>

                <button type="submit">
                    Selesaikan Pembayaran
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>