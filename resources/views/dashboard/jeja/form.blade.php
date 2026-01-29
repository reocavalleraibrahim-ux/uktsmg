@extends('dashboard.layout.app')

@section('title','Buat Data Jeja')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/jeja')}}" class="btn btn-warning"><i class="ph ph-arrow-left"></i> Kembali</a> <br><br>
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <form method="post" action="{{ url('/jeja')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Jeja</label>
                            <input type="text" class="form-control" id="nama_jeja" name="nama_jeja" placeholder="Nama Jeja">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Sabuk</label>
                            <select name="tingkat" id="tingkat" class="form-control">
                                <option>Pilih Sabuk</option>
                                @foreach($tingkat as $t)
                                    <option value="{{$t->id}}"> <i class="putih"></i> {{$t->warna}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">No Registrasi</label>
                            <input type="text" class="form-control" id="no_registrasi" name="no_registrasi" placeholder="Nomor Registrasi">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
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