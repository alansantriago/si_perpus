<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <table>
        <tr>
            <th>No</th>
            <th>No Pinjam</th>
            <th>Id Anggota</th>
            <th>Pinjam</th>
            <th>Harus Kembali</th>
            <th>Status</th>
            <th>Kembali</th>
        </tr>
        <?php
        $no =1;
        foreach ($Laporan as $trs): 
        ?>
        <tr>
            <td> <?php echo $no++?> </td>
            <td> <?php echo $trs['pinjam_id']?> </td>
            <td> <?php echo $trs['anggota_id']?> </td>
            <td> <?php echo $trs['tgl_pinjam']?> </td>
            <td> <?php echo $trs['tgl_balik']?> </td>
            <td> <?php echo $trs['status']?> </td>
            <td> <?php echo $trs['tgl_kembali']?> </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <script type="text/javascript">
        window.print()
    </script>
</body>
</html>