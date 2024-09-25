<div class="row">
    <div class="col m12">
        <h5>Daftar Data Buku Perpustakaan</h5>
        <hr>
    </div>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

    <!-- Simple Search Input -->
    <div class="form-group">
        <input type="text" id="searchInput" class="form-control" placeholder="Cari buku...">
    </div>

    <div id="noResultMessage" class="alert alert-warning" style="display: none;">
        Tidak ada buku yang ditemukan.
    </div>

    <table id="table-buku" class="table modern-table">
        <thead class="table-header">
            <tr>
                <th>No</th>
                <th>ID Buku</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Penerbit</th>
                <th>Tahun Buku</th>
                <th>Stok Buku</th>
                <th>No. Rak</th>
                <th>Tanggal Masuk</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data_buku->result_array() as $isi) { ?>
                <tr>
                    <td><?= $no; ?>.</td>
                    <td><?= $isi['buku_id']; ?></td>
                    <td><?= $isi['isbn']; ?></td>
                    <td><?= $isi['title']; ?></td>
                    <td><?= $isi['penerbit']; ?></td>
                    <td><?= $isi['thn_buku']; ?></td>
                    <td><?= $isi['jml']; ?></td>
                    <td><?= $isi['id_rak']; ?></td>
                    <td><?= $isi['tgl_masuk']; ?></td>
                    <td><?= $isi['isi']; ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>

<!-- CSS for Modern Table Design -->
<style>
    /* Existing styles for the table and form-control */
    .modern-table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .modern-table thead {
        background-color: #000896; /* Teal color */
        color: white;
    }

    .modern-table th, .modern-table td {
        padding: 12px 15px;
        text-align: left;
    }

    .modern-table tbody tr {
        transition: background-color 0.3s ease;
    }

    .modern-table tbody tr:hover {
        background-color: #f1f1f1; /* Light gray hover effect */
    }

    .modern-table td {
        border-bottom: 1px solid #ddd; /* Light gray border */
    }

    .modern-table tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Zebra striping effect */
    }

    .form-control {
        width: 100%;
        max-width: 400px; /* Optional: limit max width for better look */
        margin-bottom: 20px;
        border-radius: 4px; /* Rounded corners */
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
    }

    .form-control:focus {
        border-color: #000896; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 121, 107, 0.5);
    }

    .alert {
        margin-top: 20px; /* Space above the alert */
        display: none; /* Hidden by default */
    }
</style>

<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let table = document.getElementById('table-buku');
    let tr = table.getElementsByTagName('tr');
    let noResultMessage = document.getElementById('noResultMessage');
    let found = false;

    for (let i = 1; i < tr.length; i++) { // Start from 1 to skip the header
        let td = tr[i].getElementsByTagName('td');

        for (let j = 0; j < td.length; j++) {
            if (td[j]) {
                let txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // Show row
                    found = true;
                    break;
                } else {
                    tr[i].style.display = "none"; // Hide row
                }
            }
        }
    }

    // Show or hide the no result message
    if (!found) {
        noResultMessage.style.display = "block"; // Show message if no books found
    } else {
        noResultMessage.style.display = "none"; // Hide message if books found
    }
});
</script>
