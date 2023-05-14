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
                <?php foreach ($students as $d) { ?>
                    <tr>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['name']; ?></td>
                        <td><?php echo $d['class_name']; ?></td>
                        <td>
                            <a href="<?php echo site_url("taskbsi/edit/" . $d['nim']) ?>">edit</a> ||
                            <a href="#">hapus</a>
                            </center>
                        </td>
                    </tr>
                <?php } ?>
        </div>
        </table>
    </div>

    <div class="col-6">
        <div class="alert"><?php echo validation_errors(); ?></div>


        <?php if ($this->session->flashdata('pesanku')) : ?>
            <div class="alert">
                <?php echo $this->session->flashdata('pesanku') ?>
            </div>
        <?php endif ?>

        <!-- add mahasiswa -->
        <div class="card">
            <div class="card-header">
                <h2>Tambah Mahasiswa</h2>
            </div>

            <div class="card-body">

            <form action="<?= site_url('taskbsi/update/'.$student->nim)  ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Mahasiswa" value="<?= $student->name ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="nim" name="nim" placeholder="Nim Mahasiswa"  value="<?= $student->nim ?>">
                    </div>
                    <div class="form-group">
                        <?= form_dropdown('class', $class_dropdown, $student->class, 'class="form-control" id="class" required');  ?>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>

                </form>
            </div>
        </div>

        <!-- add class -->
        <div class="card row">
            <table class="table col-6">
                <thead class="thead-dark">
                    <tr>
                        <th>Nama Kelas </th>
                        <th>Deskripsi </th>
                        <th>Semester </th>
                        <th>Aksi </th>
                    </tr>
                </thead>
                <?php foreach ($class as $c) { ?>
                    <tr>
                        <td><?php echo $c['class_name']; ?></td>
                        <td><?php echo $c['class_description']; ?></td>
                        <td><?php echo $c['semester']; ?></td>
                        <td>
                            <a href="<?php echo site_url("datamhs/" . $d['nim']) ?>">detail</a> ||
                            <a href="#">edit</a> ||
                            <a href="#">hapus</a>
                            </center>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="col-6">
                <h2>Tambah Kelas</h2>

                <form action="<?= site_url('taskbsi/update/')  ?>" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="class_name" name="class_name" placeholder="Nama Kelas">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="class_description" name="class_description" placeholder="Deskripsi Kelas">
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control form-control-user" id="semester" name="semester" placeholder="semester">
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>

                </form>
            </div>

        </div>
    </div>


</body>

</html>