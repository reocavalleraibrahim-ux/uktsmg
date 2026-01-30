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
                  <form method="post" action="{{ url('/jeja/'.$jeja->id)}}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Nama Jeja</label>
                            <input type="text" class="form-control" id="nama_jeja" name="nama_jeja" placeholder="Nama Jeja" value="{{$jeja->nama_jeja}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$jeja->tempat_lahir}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{$jeja->tanggal_lahir}}">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Sabuk</label>
                            <select name="tingkat" id="tingkat" class="form-control">
                                <option>Pilih Sabuk</option>
                                @foreach($tingkat as $t)
                                    <option value="{{$t->id}}" <?php if($t->id == $jeja->tingkat){ echo 'selected';}?> <i class="putih"></i> {{$t->warna}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            @if($jeja->foto <> null)
                                <img id="prev" alt="" style="max-width:200px" src="{{asset('storage/'.$jeja->foto)}}">
                            @else
                                <img id="prev" alt="" style="max-width:200px" src="{{asset('img/user.png')}}">
                            @endif
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Jenis Kelamin</label>
                            <select name="jkel" class="form-control">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="laki-laki" <?php if($jeja->jkel == 'laki-laki'){ echo 'selected';}?>>Laki-Laki</option>
                                <option value="perempuan" <?php if($jeja->jkel == 'perempuan'){ echo 'selected';}?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">No Registrasi</label>
                            <input type="text" class="form-control" id="no_registrasi" name="no_registrasi" placeholder="Nomor Registrasi" value="{{$jeja->no_registrasi}}">
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
    foto.onchange = evt => {
        const [file] = foto.files
        if(file){
            prev.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection