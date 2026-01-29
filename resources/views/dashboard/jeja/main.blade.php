@extends('dashboard.layout.app')

@section('title','Jeja')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/jeja/create')}}" class="btn btn-success"><i class="ph ph-plus"></i> Buat Data Jeja</a>
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
                        <th>Nama Jeja</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Sabuk</th>
                        <th>No Registrasi</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($data as $u)
                    <tr>
                        <td>{{$u->nama_jeja}}</td>
                        <td>{{$u->tempat_lahir}}, {{$u->tanggal_lahir}}</td>
                        <td>{{$u->warna}}</td>
                        <td>{{$u->no_registrasi}}</td>
                        <td>
                        <a href="{{ url('/jeja/'.$u->id.'/edit')}}" class="badge me-2 bg-blue-300 text-white f-12">edit</a>
                            <form action="{{ route('jeja.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin Menghapus Data Jeja?')">
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