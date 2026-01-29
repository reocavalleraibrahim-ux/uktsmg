@extends('dashboard.layout.app')

@section('title','Akun')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url('/users/create')}}" class="btn btn-success"><i class="ph ph-plus"></i> Buat Akun Dojang</a>
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
                        <th>Nama Dojang</th>
                        <th>Nama Pelatih</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($user as $u)
                    <tr>
                        <td>{{$u->name}}</td>
                        <td>{{$u->nama_pelatih}}</td>
                        <td>
                        <a href="{{ url('/users/'.$u->id.'/edit')}}" class="badge me-2 bg-blue-300 text-white f-12">edit</a>
                            <form action="{{ route('users.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin Menghapus Akun?')">
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