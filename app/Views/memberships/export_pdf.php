<!DOCTYPE html>
<html>

<head>
    <title>Export PDF Membership</title>
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
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
            <th>Nomor KTP</th>
            <th>Alamat</th>
            <th>Nama Paket</th>
        </tr>
        <?php
        $no = 1;
        foreach ($memberships as $membership) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $membership['nama_lengkap'] ?></td>
                <td><?= $membership['email'] ?></td>
                <td><?= $membership['no_telp'] ?></td>
                <td><?= $membership['jenis_kelamin'] ?></td>
                <td><?= $membership['tgl_lahir'] ?></td>
                <td><?= $membership['no_ktp'] ?></td>
                <td><?= $membership['alamat'] ?></td>
                <td><?= $membership['id_paket'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>