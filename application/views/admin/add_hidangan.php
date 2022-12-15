<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Hidangan</title>
     <!-- CDN FontAwesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>View | Hidangan</title>
    <!-- import file style.css -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/entry.css"); ?>">
</head>
<body>
    


    <nav class="area-tombol">
         <!-- buat tombol lihat data -->
         <button id="btn-lihat" name="btn-lihat" class="btn-primary">Lihat Data</button>
         <!-- buat tombol refresh data -->
         <button id="btn-refresh" name="btn-refresh" class="btn-secondary" onclick="return setRefresh()" >Refresh Data</button>
    </nav>
    <!-- bagian utama -->
    <main class="container-grid">
        <!-- area foto -->
        <section class="item-foto">
            <label for="file_upload">
            <img src="<?php echo base_url("ext/images/no-img.png");?>" alt="Foto Makanan" class="image-upload" title="Upload Foto Makanan" id="img_upload">
            </label>
          
            <input type="file" id="file_upload" name="file_upload" accept=".png,.jpg,.jpeg" style="display: none;"/>
        </section>
        <!-- area label 1 -->
        <section class="item-label-1">No</section>
        <!-- area input 1 -->
        <section class="item-input-1">
            <input type="text" id="txt_no" maxlength="9" class="text-object">
            <!-- eror info -->
            <p class="eror-info" id="err_no"></p>
        </section>
        <!-- area label 2 -->
        <section class="item-label-2">Nama Makanan</section>
        <!-- area input 2 -->
        <section class="item-input-2">
            <input type="text" id="txt_nama" maxlength="100" class="text-object">
            <!-- eror info -->
            <p class="eror-info" id="err_nama"></p>
        </section>
        <!-- area label 3 -->
        <section class="item-label-3">Harga</section>
        <!-- area input 3 -->
        <section class="item-input-3">
            <input type="text" id="txt_telepon" maxlength="15" class="text-object">
            <!-- eror info -->
            <p class="eror-info" id="err_telepon"></p>
        </section>
        <!-- area label 3 -->
        <section class="item-label-4">Aksi</section>
        <!-- area input 3 -->
        <section class="item-input-4">
            <input type="text" id="txt_telepon" maxlength="15" class="text-object">
            <!-- eror info -->
            <p class="eror-info" id="err_telepon"></p>
        </section>
    </main>
    <nav class="area-tombol" style="justify-content: flex-start; margin-top :20px;">
        <!-- buat tombol lihat data -->
        <button id="btn-simpan" name="btn-simpan" class="btn-primary">Simpan Data</button>
    </nav>


    <!-- CDN FontAwesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // definisikan variabel 
        let btn_lihat = document.getElementById("btn-lihat");
        let btn_simpan = document.getElementById("btn-simpan");
        let file_upload = document.getElementById("file_upload");
        let img_upload = document.getElementById("img_upload");
        let file_extension;
        // buat event "btn-tambah" 
        btn_lihat.addEventListener('click',function(){
        // alihkan ke controller "Mahasisswa"
        // function "create"
            location.href='<?php echo base_url();?>'
        })
        function setRefresh()
        {
            // alihkan ke controller Mahasiswa
            location.href='<?php echo site_url("Mahasiswa/create");?>'
        }
        // buat event untuk btn-simpan
        btn_simpan.addEventListener('click',function(){
            // definisikan variabel input dan error
            let txt_npm = document.getElementById("txt_npm");
            let err_npm = document.getElementById("err_npm");
            let act_npm;

            let txt_nama = document.getElementById("txt_nama");
            let err_nama = document.getElementById("err_nama");
            let act_nama;

            let txt_telepon = document.getElementById("txt_telepon");
            let err_telepon = document.getElementById("err_telepon");
            let act_telepon;

            let cbo_jurusan = document.getElementById("cbo_jurusan");
            let err_jurusan = document.getElementById("err_jurusan");
            let act_jurusan;

            let rdb_aktif = document.getElementById("rdb_aktif");
            let rdb_pasif = document.getElementById("rdb_pasif");

            let err_status = document.getElementById("err_status");
            let act_status;

            const cek_status = (rdb_aktif.checked === true)?
            "0"
            :(rdb_pasif.checked === true)?
            "1"
            : 
            "-"

            // alert(cek_status)

            // jika "txt_npm" tidak di isi
            if (txt_npm.value === "")
            {
                // DOM CSS
                txt_npm.style.borderColor = "#FF0000";
                err_npm.style.display = 'unset';
                err_npm.innerHTML = '<?php echo ICONERROR ?>'+"NPM Harus Diisi";
                act_npm=0;
            }
            // jika "txt_npm" disii
            else
            {
                txt_npm.style.borderColor = "unset";
                err_npm.style.display = 'none';
                err_npm.innerHTML = "";
                act_npm = 1;
            }

            // ternary operator (js)
            const nama = (txt_nama.value === "")?
            [
                txt_nama.style.borderColor = "#FF0000",
                err_nama.style.display = 'unset',
                err_nama.innerHTML = '<?php echo ICONERROR ?>'+"Nama Mahasiswa Harus Diisi",
                act_nama=0
            ]
            :
            [
                txt_nama.style.borderColor = "unset",
                err_nama.style.display = 'none',
                err_nama.innerHTML = "",
                act_nama = 1
            ]
            
            const telepon = (txt_telepon.value === "")?
            [
                txt_telepon.style.borderColor = "#FF0000",
                err_telepon.style.display = 'unset',
                err_telepon.innerHTML = '<?php echo ICONERROR ?>'+"Telepon Harus Diisi",
                act_telepon=0
            ]
            :
            [
                txt_telepon.style.borderColor = "unset",
                err_telepon.style.display = 'none',
                err_telepon.innerHTML = "",
                act_telepon = 1
            ]
            const jurusan = (cbo_jurusan.selectedIndex === 0)?
            [
                cbo_jurusan.style.borderColor = "#FF0000",
                err_jurusan.style.display = 'unset',
                err_jurusan.innerHTML = '<?php echo ICONERROR ?>'+"Jurusan Harus Diisi",
                act_jurusan=0
            ]
            :
            [
                cbo_jurusan.style.borderColor = "unset",
                err_jurusan.style.display = 'none',
                err_jurusan.innerHTML = "",
                act_jurusan = 1
            ]
            const status = (cek_status === "-")?
            [
                
                err_status.style.display = 'unset',
                err_status.innerHTML = '<?php echo ICONERROR ?>'+"Status Harus Diisi",
                act_status=0
            ]
            :
            [
                
                err_status.style.display = 'none',
                err_status.innerHTML = "",
                act_status = 1
            ]
            // proses kirim data
            const proses = (act_npm === 1 && act_nama === 1 && act_telepon ===1 && act_jurusan === 1 && act_status === 1)?
            //panggil fungsi setSave 
                setSave(txt_npm.value,txt_nama.value,txt_telepon.value,cbo_jurusan.value,cek_status)
            :
               ""
            
        });
        // // buat fungsi setSave
        // const setSave = (npm,nama,telepon,jurusan,status) => {
        //         // buat variabel untuk form
        //         const form = new FormData();
        //         // isi nilai atau atribut dari form
        //         form.append("npmnya", npm);
        //         form.append("namanya",nama);
        //         from.append("teleponya",telepon);
        //         form.append("jurusannya",jurusan);
        //         form.append("statusnya",status);

        //         // metode async "Promise"
        //         fetch('<?php echo site_url('Mahasiswa/save'); ?>',{
        //             method : "POST",
        //             body : form
        //         })
        //         .then((response)=> response.json())
        //         .then(function (result){
        //             // jika status = 1
        //             if (result.status === 1)
        //             {
        //                 alert ("Data Mahasiswa Berhasil Disimpan")
        //             }
        //             // jika status = 0
        //             else
        //             {
        //                 alert ("Data Mahasiswa Gagal Disimpan")
        //             }
        //         })
        //         .catch((error)=> alert("Gagal Mengambil Data !"))

        // }

        // buat fungsi setSave
        const setSave = (npm, nama, telepon, jurusan, status) => {
            // buat variabel untuk form
            const form = new FormData();
            // isi nilai/atribut dari form
            form.append("npmnya", npm);
            form.append("namanya", nama);
            form.append("teleponnya", telepon);
            form.append("jurusannya", jurusan);
            form.append("statusnya", status);

            // metode async "promise"
            fetch('<?php echo site_url("Mahasiswa/save"); ?>', {
                    method: "POST",
                    body : form
                })
                .then((response) => response.json())
                .then(function(result) {
                    // jika status = 1
                    if(result.status === 1)
                    {
                        alert("Data Mahasiswa Berhasil Disimpan")
                    }
                    // jika status = 0
                    else
                    {
                      alert("Data Mahasiswa Gagal Disimpan !")   
                    }
                })
                .catch((error) => alert("Gagal Mengirim Data !"))

        }
        file_upload.addEventListener('change',function(){
            // baca extensi file
            file_extension = file_upload.value.split(".").pop().toUpperCase();
            // jika ekstensi (png/jpg/jpeg)
            if (file_extension.toUpperCase() === ('PNG') ||file_extension.toUpperCase() === ('JPG') || file_extension.toUpperCase() === ('JPEG') )
            {
                // baca ukuran file
                let file_size;
                file_size = parseFloat(file_upload.files[0].size/1000).toFixed(2);
                // jika file kurang dari 10mb
                if (file_size<=10000)
                {
                    // tampilkan file foto
                    img_upload.src = URL.createObjectURL(file_upload.files[0])

                }
                // jika file lebih dari 10mb
                else
                {

                }


            }
            // jika ekstensi bukan (png/jpg/jpeg)
            else
            {
                alert("Format file salah contoh : .PNG/.JPG/.JPEG")
            }
        })

    </script>

</body>
</html>