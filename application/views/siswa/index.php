<html>

<head>
    <title>Daftar Siswa</title>
</head>

<body>
    <h1>Daftar Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>nis</th>
                <th>Alamat</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($siswa as $key => $row) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    <td><?php echo $row->nama_lengkap; ?></td>
                    <td><a href="<?= base_url('presensi/nis/' . $row->nis) ?>">Lihat Presensi</a></td>
                </tr>
            <?php } ?>
        </tbody>


        <form action="<?php echo site_url('siswa/insert_csv_data'); ?>" method="post" enctype="multipart/form-data">
            <label for="csv_file">Upload File CSV:</label>
            <input type="file" name="csv_file" id="csv_file">
            <br><br>
            <input type="submit" value="Upload">
        </form>

    </table>
</body>

</html>