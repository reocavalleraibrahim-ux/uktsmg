@extends('dashboard.layout.app')

@section('title','Akun')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/users')}}" class="btn btn-warning"><i class="ph ph-arrow-left"></i> Kembali</a> <br><br>
                <h3>Buat Akun Dojang</h3>
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <form method="post" action="{{ url('/users')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Dojang</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Dojang">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nomor Whatsapp</label>
                            <input type="number" class="form-control" id="phone" name="phone" placeholder="Pakai 62">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Pelatih</label>
                            <input type="text" class="form-control" id="nama_pelatih" name="nama_pelatih" placeholder="Nama Pelatih">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" name="Create">
                        </div>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
<script>
    document.getElementById('username').addEventListener("keydown",function (e){
        if(e.key === " "){
            e.preventDefault();
        }
    });

    document.getElementById('username').addEventListener("paste", function(e){
        e.preventDefault();
    });
</script>
@endsection