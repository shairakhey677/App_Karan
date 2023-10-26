<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
     body {
        background-image: url('https://source.unsplash.com/1200x250/?school');
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
  </style>


  </head>
  <body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%">
            <div class="col-md-8">
                <div class="card border-0 shadow rounded">
                  <div class="card-header mb-3">
                    <strong>Aplikasi PeSaT - Pencatatan Siswa Terlambat</strong>
                  </div>
                  <form name="kirim_data">
                    <div class="card-body">
                      <!-- alert -->
                      <div class="alert alert-success alert-dismissible fade show alert-berhasil d-none" role="alert">
                        <strong>Kirim data berhasil!</strong> Data sudah masuk ke dalam database aplikasi Pesat..
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      <button type="button" class="btn btn-danger float-right" onclick="logout()">Logout</button>
                      <button type="button" class="btn btn-primary float-right" id="tambahBaris">Tambah Data</button>
                      <table class="table" id="tabelData">
                        <thead>
                            <tr>
                                <th>Jam Terlambat</th>
                                <th>Kelas</th>
                                <th>Nama Siswa</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelBody">
                        <tr>
                          <td>
                            <input type="datetime-local" class="form-control" id="birthdaytime" name="jam_terlambat">
                          </td>
                            <td>
                              <select class="form-control pilihan" name="kelas">
                                <option value="">Pilih Kelas</option>
                                <option value="X PPLG">X PPLG</option>
                                <option value="X DKV">X DKV</option>
                                <option value="X TJKT 1">X TJKT 1</option>
                                <option value="X TJKT 2">X TJKT 2</option>
                              </select>
                            </td>
                            <td>                   
                              <input type="text" name="nama" class="form-control" placeholder="Nama Siswa">
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input type="checkbox" class="btn-check" name="status" value="Terlambat" id="btncheck1" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btncheck1">Terlambat</label>
                              </div>
                            </td>
                            <td>
                              <a href="" class="btn btn-danger btn-remove"><span class="badge rounded-pill text-bg-danger"><i class="bi bi-trash-fill"></i></span></a>
                            </td>
                        </tr>
                            <!-- Tambahkan baris sebanyak yang Anda perlukan -->
                        </tbody>
                      </table>
                    </div>
                    <div class="p-3">
                        <button type="submit" class="btn btn-success btn-kirim">Kirim data</button>
                        <button class="btn btn-success btn-loading d-none" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                      </button>
                    </div>
                  </form>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- proses kirim data ke database -->
    <script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbxdDTEW7k8O0Hme7kWosdMFyR2l0UlF8OeLgB2sN0dB5sVO1gZibH7TnvQAodQ1tx18/exec'
      const form = document.forms['kirim_data']
      const btnLoading = document.querySelector('.btn-loading');
      const btnKirim = document.querySelector('.btn-kirim');
      const alertBerhasil = document.querySelector('.alert-berhasil');

      form.addEventListener('submit', e => {
        e.preventDefault();

        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');

        fetch(scriptURL, { method: 'POST', body: new FormData(form)})
          .then(response => {
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

            alertBerhasil.classList.toggle('d-none');
            form.reset();

            console.log('Success!', response);
          })
          .catch(error => console.error('Error!', error.message))
      });
    </script>

    <script>
        function logout() {
            console.log("Berhasil logout");
            window.location.href = "index.php";
            history.pushState(null, null, "index.php");
        }
    </script>

    <script>
      document.getElementById('tambahBaris').addEventListener('click', function() {
        var tbody = document.getElementById('tabelBody');
        var newRow = document.createElement('tr');
        var rowCount = tbody.getElementsByTagName('tr').length + 1; // Menghitung jumlah baris
    
        newRow.innerHTML = `
        <td>                   
          <input type="datetime-local" class="form-control" id="birthdaytime" name="jam_terlambat_${rowCount}">
        <td>
          <select class="form-control" id="pilihan" name="kelas_${rowCount}">
            <option value="">Pilih Kelas</option>
            <option value="X PPLG">X PPLG</option>
            <option value="X DKV">X DKV</option>
            <option value="X TJKT 1">X TJKT 1</option>
            <option value="X TJKT 2">X TJKT 2</option>
          </select>
        <td>
            <input type="text" class="form-control" name="nama_${rowCount}" placeholder="Nama Siswa">
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" autocomplete="off" checked>
                <label class="btn btn-outline-primary">Terlambat</label>
            </div>
        </td>
        <td>
          <a href="" class="btn btn-danger btn-remove"><span class="badge rounded-pill text-bg-danger"><i class="bi bi-trash-fill"></i></span></a>
        </td>
        `;
    
        tbody.appendChild(newRow);
    });
    document.getElementById('tabelBody').addEventListener('click', function(e) {
      if (e.target.classList.contains('btn-remove')) {
          e.target.parentElement.parentElement.remove();
      }
    });    
    </script>      
  </body>
</html>