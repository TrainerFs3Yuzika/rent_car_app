<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Export</title>
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
            padding: 5px 0; /* Mengurangi padding header */
            margin-bottom: 20px; /* Mengurangi margin bawah header */
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
            font-size: 2em; /* Mengurangi ukuran font */
            line-height: 1.2em; /* Mengurangi tinggi baris */
            font-weight: normal;
            text-align: center;
            margin: 0 0 15px 0; /* Mengurangi margin bawah */
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
            margin-bottom: 10px; /* Mengurangi margin bawah tabel */
        }

        table tr:nth-child(2n-1) td {
            background: #f5f5f5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 10px; /* Mengurangi padding dalam tabel */
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
            padding: 10px; /* Mengurangi padding dalam sel tabel */
            text-align: right;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1em; /* Mengurangi ukuran font */
        }

        table td.grand {
            border-top: 1px solid #5d6975;
        }

        #notices .notice {
            color: #5d6975;
            font-size: 1em; /* Mengurangi ukuran font */
        }

        footer {
            color: #5d6975;
            width: 100%;
            height: 20px; /* Mengurangi tinggi footer */
            position: absolute;
            bottom: 0;
            border-top: 1px solid #c1ced9;
            padding: 5px 0; /* Mengurangi padding footer */
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <div id="logo">
        </div>
        <h1 style="margin-top:2em ;">Pesanan ke-{{ $orderDetails -> order_id }}</h1>
        <div id="company" class="clearfix">
            <div>Rent Car and Motor Surabaya</div>
            <div>Jl.Jl. Jendral Sudirman No. 12,<br /> Surabaya, Indonesia</div>
            <div>+62 896 6543 6512</div>
            <div>rentcarmotorsurabaya@gmail.com</div>
        </div>
        <div id="project">
            <div><span>Menyewa</span> Penyewaan {{ $orderDetails -> kendaraan -> category -> nama }}</div>
            <div><span>Penyewa</span> {{ $orderDetails -> order -> user -> name }}</div>
            <div><span>Alamat</span> {{ $orderDetails -> order -> user -> address }}</div>
            <div><span>Email</span> {{ $orderDetails -> order -> user -> email }}</div>
            <div><span>No.Telf</span> {{ $orderDetails -> order -> user -> phone }}</div>
        </div>
    </header>
    <main>
        <h5>Laporan Penyewaan {{ $orderDetails -> kendaraan -> category -> nama }}</h5>
        <table>
            <tbody>
                <tr>
                    <td class="service">Kendaraan</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Merk</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> brand -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Tipe</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> type -> nama }}</td>
                </tr>
                <tr>
                    <td class="service">Warna</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> warna }}</td>
                </tr>
                <tr>
                     <td class="service">Plat Nomor</td>
                    <td class="unit">{{ $orderDetails -> kendaraan -> plat_nomor }}</td>
                </tr>
                <tr>
                    <td class="service">Jumlah Penumpang</td>
                    <td class="unit">{{ $orderDetails -> kendaraan -> jumlah_penumpang }}</td>
                </tr>
                <tr>
                    <td class="service">Tahun</td>

                    <td class="unit">{{ $orderDetails -> kendaraan -> tahun }}</td>
                </tr>
                <tr>
                    <td class="service">Tanggal Sewa</td>

                    <td class="unit">{{ $orderDetails -> tanggal_sewa }}</td>
                </tr>
                <tr>
                    <td class="service">Durasi</td>

                    <td class="unit">{{ $orderDetails -> lama_sewa }} hari</td>
                </tr>
                <tr>
                    <td class="service">Total Bayar</td>

                    <td>Rp. {{ number_format($orderDetails -> total_bayar) }}</td>
                </tr>
                <tr>
                    <td class="service">Opsi</td>

                    <td>
                        @if($orderDetails -> opsi == 1)
                        Tanpa Sopir
                        @elseif($orderDetails -> opsi == 2)
                        Dengan Sopir
                        @else
                        Dengan Supir dan BBM
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="service">Catatan Sewa</td>

                    <td class="unit">{{ $orderDetails -> catatan }}</td>
                </tr>
                <tr>
                    <td class="service">Status Pesanan</td>

                    <td>
                        @if ($orderDetails -> order -> status == 1)
                        Dalam Peminjaman
                        @elseif ($orderDetails -> order -> status == 2)
                        Selesai
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="service">Pembayaran</td>

                    <td class="unit">{{ $orderDetails -> order -> bank -> name }}</td>
                </tr>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">Ketika melakukan pengembalian kendaraan mohon bawa surat peminjaman ini.</div>
        </div>
    </main>
    <footer>
        Rent Car and Motor Surabaya.
    </footer>
</body>

</html>