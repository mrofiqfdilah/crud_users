<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
      <div class="card mx-auto" style="width: 700px; position: relative; top:70px;">
        <div class="card-body">
          <p class="tambah">SIGN UP</p>
         <div class="mb-2" style="width:70px; height:6px; position: relative; top:-10px; border-radius:8px; background:#27ae60;"></div>
         <div class="mb-4">
          <p>Sudah punya akun ? Silahkan <a href="{{ route("login") }}" style="text-decoration: underline; color:#27ae60;"> login</a></p>
      </div>
         <form action="{{ route('register') }}" method="POST" class="for">
          @if ($errors->any())
          <div class="alert alert-danger">
             
                  @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
           
          </div>
      @endif
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="kode_barang" class="form-label">Nama</label>
                  <input type="text" class="form-control" id="name" id="name" name="name" placeholder="Masukan nama anda">
                </div>
                <div class="mb-3">
                  <label for="nama_barang" class="form-label">Username</label>
                  <input type="text"  id="nama" class="form-control" id="username" name="username" placeholder="Masukan username anda">
                </div>
                <div class="mb-3">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select name="gender" class="form-select" id="gender">
                    <option value="" disabled selected>Pilih jenis kelamin</option>
                      <option value="laki-laki">Laki Laki</option>
                      <option value="perempuan">Perempuan</option>
                  </select>
              </div>              
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="tahun_masuk" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                </div>
                <div class="mb-3">
                  <label for="tahun_masuk" class="form-label">Email</label>
                  <input type="email" class="form-control" placeholder="Masukan Email anda" id="email" name="email">
                </div>
                <div class="mb-4">
                  <label for="tahun_masuk" class="form-label">Password email</label>
                  <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password">
                </div>
              </div>
            </div>
            <button type="submit" class="sign">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

  .form-label{
    letter-spacing: 1px;
  }
  .for{
    position: relative;
    top:-10px;
    transition:all .2s linear;
  }
  button {
    background-color: #27ae60;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    width:100px;
   
    font-size: 1rem;
}

button:hover {
  transition:all .2s linear;
    background-color: #219150;
}
  body{
      font-family: 'Poppins', sans-serif;
    background-color:  #27ae60;
  }
  #kode::placeholder {
    color:#AAAAAA;
  }
  #nama::placeholder {
    color:#AAAAAA;
  }
  #stock::placeholder {
    color:#AAAAAA;
  }
  #date::placeholder {
    color:#AAAAAA;
  }
  #kondisi::placeholder {
    color:#AAAAAA;
  }
  .tambah{
    color: #222222;
    font-size: 1.6rem;
    letter-spacing: 0.5px;
    font-weight: 600;

  }
</style>