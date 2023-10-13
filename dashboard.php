<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%">
            <div class="col-md-8">
                <div class="card border-0 shadow rounded">
                  <div class="card-header mb-3">
                    <strong>Aplikasi PeSaT - Pencatatan Siswa Terlambat</strong>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-danger float-right" onclick="logout()">Logout</button>
                    <button type="button" class="btn btn-primary float-right" id="tambahBaris">Tambah Data</button>
                    <table class="table" id="tabelData">
                      <thead>
                          <tr>
                              <th>Nama Siswa</th>
                              <th>Kelas</th>
                              <th>Keterangan</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody id="tabelBody">
                      <tr>
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
                              <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" checked>
                              <label class="btn btn-outline-primary" for="btncheck1">Terlambat</label>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-danger btn-remove"><i class="bi bi-trash-fill"></i></button>
                          </td>
                      </tr>
                          <!-- Tambahkan baris sebanyak yang Anda perlukan -->
                      </tbody>
                    </table>
                  </div>
                <button type="submit" class="btn btn-success text-center">Kirim data</button>
            </div>
          </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
    
        newRow.innerHTML = `
        <td>
          <select class="form-control" id="pilihan" name="kelas">
            <option value="">Pilih Kelas</option>
            <option value="X PPLG">X PPLG</option>
            <option value="X DKV">X DKV</option>
            <option value="X TJKT 1">X TJKT 1</option>
            <option value="X TJKT 2">X TJKT 2</option>
          </select>
        <td>
            <input type="text" class="form-control" placeholder="Nama Siswa">
        </td>
        <td>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" autocomplete="off" checked>
                <label class="btn btn-outline-primary">Terlambat</label>
            </div>
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-remove"><i class="bi bi-trash-fill"></i></button>
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