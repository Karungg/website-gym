<!DOCTYPE html>
<html>

<head>
    <title>Export PDF User</title>
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
            <th>Email</th>
            <th>Username</th>
            <th>Created At</th>
        </tr>
        <?php
        $no = 1;
        foreach ($users as $user) :
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['created_at'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>

</body>

</html>