<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>

</head>

<body>
    <style type="text/css">
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
    <center>
        <h5 style="text-align: center;">Laporan Transaksi</h4>
        </h5>
    </center>

    <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Nama Penyewa</th>
                <th>Jumlah</th>
                <th>Pembayaran</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $key => $value) { ?>
                <tr>
                    <td><?= $key + 1  ?></td>
                    <td><?= $value->nama_barang ?></td>
                    <td><?= $value->name ?></td>
                    <td><?= $value->jumlah ?></td>
                    <td><?= strtoupper($value->payment_method) ?></td>
                    <td><?= $value->tanggal ?></td>
                    <td><?= $value->tanggal_keluar ?></td>
                    <td><?= $value->status ?></td>
                </tr>
            <?php  } ?>
        </tbody>
    </table>

</body>

</html>