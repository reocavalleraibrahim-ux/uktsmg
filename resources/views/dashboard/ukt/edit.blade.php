@extends('dashboard.layout.app')

@section('title','Edit Data UKT')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/ukt')}}" class="btn btn-warning"><i class="ph ph-arrow-left"></i> Kembali</a> <br><br>
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <form method="post" action="{{ url('/ukt/'.$ukt->id)}}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Event UKT</label>
                            <input type="text" class="form-control" id="nama_ukt" name="nama_ukt" placeholder="Nama Event UKT" value="{{$ukt->nama_ukt}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Periode UKT</label>
                            <input type="number" class="form-control" id="periode" name="periode" placeholder="Periode" value="{{$ukt->periode}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Jenis UKT</label>
                            <select name="jenis_ukt" class="form-control">
                                <option>Pilih Jenis UKT</option>
                                <option value="UKT Reguler" <?php if($ukt->jenis_ukt == 'UKT Reguler'){ echo 'selected';}?>>UKT Reguler</option>
                                <option value="UKT Dan" <?php if($ukt->jenis_ukt == 'UKT Dan'){ echo 'selected';}?>>UKT Dan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" value="{{$ukt->tanggal_mulai}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir" value="{{$ukt->tanggal_akhir}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tempat UKT</label>
                            <input type="text" class="form-control" id="tempat_ukt" name="tempat_ukt" placeholder="Tempat UKT" value="{{$ukt->tempat_ukt}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Informasi Tambahan</label>
                            <textarea class="form-control" id="informasi" name="informasi">{{$ukt->informasi}}</textarea>
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