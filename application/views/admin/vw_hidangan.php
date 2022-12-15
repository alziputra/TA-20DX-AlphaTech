<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View | Hidangan </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url("/assets/css/admin.css")?>">

</head>
<body>
 
  <div class="main-content">
    <div class="wrapper">
      <h1>Kelola Hidangan</h1>

      <br /><br />

      <!-- bagian menu navigasi -->
      <nav class="area-button">
        <!-- buat tombol tambah data -->
        <button id="btn-add" name="btn-add" class="btn-primary">Tambah</button>
        <!-- buat tombol refresh data -->
        <button id="btn-refresh" name="btn-refresh" class="btn-secondary" onclick="return setRefresh()">Refresh Data</button>
      </nav>

      <br /><br /><br />
      <table class="tbl-full">
        <thead>
          <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aktif</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          //nilai awal "no"
          $no = 1;
          foreach ($hasil as  $record) {
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $record->nama; ?></td>
              <td>Rp. <?= $record->harga; ?></td>
              <td><?= $record->foto; ?></td>
              <td><?= $record->aktif; ?></td>
              <td style="text-align: center;">
                <nav class="area-aksi">
                  <!-- Tombol edit -->
                  <button id="btn-edit" name="btn-edit" class="btn-edit" title="Ubah Data" onclick="return setEdit()">
                    <i class="fa-solid fa-pen"></i>
                  </button>
                  <!-- Tombol hapus -->
                  <button id="btn-hapus" name="btn-hapus" class="btn-hapus" title="Hapus Data" onclick="return setDelete()">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </nav>
              </td>

            </tr>
          <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- CDN FontAwesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- javascript internal -->
  <script>
    // definisikan variabel 
    let btn_add = document.getElementById("btn-add");

    // buat event "btn-add" 
    btn_add.addEventListener('click', function() {
      // alihkan ke controller "Hidangan"
      // function "create"
      location.href = '<?php echo site_url("Hidangan/create"); ?>'

    })

    // fungsi reload halaman
    function setRefresh() {
      // alihkan ke controller Hidangan
      location.href = '<?php echo base_url(); ?>'
    }

    // fungsi untuk ubah data 
    function setEdit(title) {
      // konversi data ke base64 Encode
      let judul = btoa(title);

      // alihkan ke controller "Hidangan"
      // function "create"
      location.href = '<?php echo site_url("Hidangan/update/"); ?>' + judul;
    }
    // fungsi untuk menampilkan pesan hapus data 
    function setDelete(title) {
      let desc = title;
      // tampilkan massage box
      if (confirm('Data Hidangan ' + desc + '\nIngin dihapus ?') == true) {
        // proses penghapusan


      }
    }
  </script>
</body>

</html>

