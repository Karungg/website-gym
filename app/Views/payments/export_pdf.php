<!DOCTYPE html>
<html>

<head>
    <title>Export PDF Pembayaran</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Nama Paket</th>
            <th>Tanggal Bayar</th>
            <th>Metode Pembayaran</th>
            <th>Keterangan</th>
            <th>Total</th>
        </tr>
        <?php
        $no = 1;
        foreach ($payments as $payment) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $payment['nama_lengkap'] ?></td>
                <td><?= $payment['nama_paket'] ?></td>
                <td><?= $payment['tgl_bayar'] ?></td>
                <td><?= $payment['metode_pembayaran'] ?></td>
                <td><?= $payment['keterangan'] ?></td>
                <td>Rp. <?= $payment['total'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>