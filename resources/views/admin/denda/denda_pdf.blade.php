<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Denda</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5d6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            width: 18cm;
            height: 25.7cm;
            margin: 0 auto;
            color: #001028;
            background: #ffffff;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 200px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            border-top: 1px solid #5d6975;
            border-bottom: 1px solid #5d6975;
            color: #5d6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            text-align: center;
            margin: 0 0 20px 0;
            background: url('img/dimension.png');
        }

        #project {
            float: left;
        }

        #project span {
            color: #5d6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        #company {
            float: right;
            text-align: right;
        }

        #project div,
        #company div {
            white-space: nowrap;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f5f5f5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5d6975;
            border-bottom: 1px solid #c1ced9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 20px;
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5d6975;
        }

        #notices .notice {
            color: #5d6975;
            font-size: 1.2em;
        }

        footer {
            color: #5d6975;
            width: 100%;
            height: 30px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #c1ced9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
        </div>
        <div id="company" class="clearfix">
            <div>Rent Car and Motor Surabaya</div>
            <div>Jl. Jendral Sudirman No. 12,<br />Surabaya, Indonesia</div>
            <div>+62 896 6543 6512</div>
            <div>rentcarmotorsurabaya@gmail.com</div>
        </div>
    </header>
    <main>
        <h5>Laporan Denda</h5>
        <table>
            <thead>
                <th>No.</th>
                <th>Nama Penyewa</th>
                <th>Tanggal Sewa</th>
                <th>Lama Sewa</th>
                <th>Tanggal Kembali</th>
                <th>Pembayaran</th>
                <th>Total Bayar</th>
            </thead>
            <tbody>
                @foreach ($dendas as $denda)
                <tr>
                    <td class="service">{{ $loop->iteration }}</td>
                    <td class="service">{{ $denda->user->name }}</td>
                    <td class="service">{{ $denda->orderDetail->tanggal_sewa }}</td>
                    <td class="service">{{ $denda->orderDetail->lama_sewa }} Hari</td>
                    <td class="service">{{ $denda->pengembalianDetail->tanggal_kembali }}</td>
                    <td class="service">{{ $denda->bank->name }}</td>
                    <td class="service">Rp. {{ number_format($denda->total, 0, ',', '.') }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </main>
    <footer>
        Rent Car and Motor Surabaya.
    </footer>
</body>

</html>