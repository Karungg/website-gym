<!DOCTYPE html>
<html>

<head>
    <title>Export PDF Paket</title>
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
            <th>Nama Paket</th>
            <th>Deskripsi</th>
            <th>Durasi</th>
            <th>Harga</th>
        </tr>
        <?php
        $no = 1;
        foreach ($packages as $package) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $package['nama_paket'] ?></td>
                <td><?= $package['deskripsi'] ?></td>
                <td><?= $package['durasi'] ?> Bulan</td>
                <td>Rp. <?= $package['harga'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>