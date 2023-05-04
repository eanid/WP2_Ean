<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-5 row">
        <div class="col-6">
            
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Nim Mahasiswa </th>
                        <th>Nama Mahasiswa </th>
                        <th>Kelas </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['class_name']; ?></td>
                        <td>
                            <a href="<?php echo site_url("datamhs/" . $d['nim']) ?>">detail</a> ||
                            <a href="#">edit</a> ||
                            <a href="#">hapus</a>
                        </center>
                    </td>
            </tr>
            <?php } ?>
        </div>
    </table>
</div>
    <div class="col-6 bg-dark">
    </div>


</body>

</html>