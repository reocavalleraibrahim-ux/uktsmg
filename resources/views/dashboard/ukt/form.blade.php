@extends('dashboard.layout.app')

@section('title','Buat Data UKT')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/ukt')}}" class="btn btn-warning"><i class="ph ph-arrow-left"></i> Kembali</a> <br><br>
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <form method="post" action="{{ url('/ukt')}}" enctype="multipart/form-data">
                     @csrf
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Event UKT</label>
                            <input type="text" class="form-control" id="nama_ukt" name="nama_ukt" placeholder="Nama Event UKT">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Periode UKT</label>
                            <input type="number" class="form-control" id="periode" name="periode" placeholder="Periode">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Jenis UKT</label>
                            <select name="jenis_ukt" class="form-control">
                                <option>Pilih Jenis UKT</option>
                                <option value="UKT Reguler">UKT Reguler</option>
                                <option value="UKT Dan">UKT Dan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tempat UKT</label>
                            <input type="text" class="form-control" id="tempat_ukt" name="tempat_ukt" placeholder="Tempat UKT">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Informasi Tambahan</label>
                            <textarea class="form-control" id="informasi" name="informasi"></textarea>
                        </div>
                        <div class="col-md-6">
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
    var foto = document.getElementById('foto');
    var prev = document.getElementById('prev');
    foto.onchange = evt => {
        const [file] = foto.files
        if(file){
            prev.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection