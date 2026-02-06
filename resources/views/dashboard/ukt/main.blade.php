@extends('dashboard.layout.app')

@section('title','Ujian Kenaikan Tingkat')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/ukt/create')}}" class="btn btn-success"><i class="ph ph-plus"></i> Buat Event UKT</a>
                @if (session('success'))
                  <br>
                  <br>
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif  
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                        <th>Nama UKT</th>
                        <th>Jenis UKT</th>
                        <th>Periode</th>
                        <th>Pelaksanaan</th>
                        <th>Tempat</th>
                        <th>Informasi</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($ukt as $u)
                        <tr>
                            <td>{{$u->nama_ukt}}</td>
                            <td>{{$u->jenis_ukt}}</td>
                            <td>{{$u->periode}}</td>
                            <td>{{date('d F Y',strtotime($u->tanggal_mulai))}} - {{date('d F Y',strtotime($u->tanggal_akhir))}}</td>
                            <td>{{$u->tempat_ukt}}</td>
                            <td>{{$u->informasi}}</td>
                            <td>
                                <a href="{{ url('/daftarUKT/'.$u->id)}}" class="badge me-2 bg-blue-500 text-white f-12">Lihat</a>
                                <a href="{{ url('/ukt/'.$u->id.'/edit')}}" class="badge me-2 bg-blue-300 text-white f-12">edit</a>
                                    <form action="{{ route('ukt.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin Menghapus Data UKT?')">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="badge me-2 bg-red-500 text-white f-12" style="border:none;">Hapus</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection