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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($presensi as $key => $row) { ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $row->kode_mp; ?></td>
                    <td><?php echo $row->alpha; ?></td>
                    <td><?php echo $row->ijin; ?></td>
                    <td><?php echo $row->sakit; ?></td>
                    <td><?php echo $row->kode_ta; ?></td>
                    <td><?php echo $row->nis; ?></td>
                    <td>
                        <a href="<?= base_url('presensi/edit/'. $row->id_presensi); ?>">Edit</a>
                    </td>
                </tr>
            <?php } ?>
            <a href="<?= base_url('siswa/index'); ?>">siswa</a>
        </tbody>
    </table>
</body>
</html>
