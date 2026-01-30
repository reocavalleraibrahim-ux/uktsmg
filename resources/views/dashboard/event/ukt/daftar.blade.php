@extends('dashboard.layout.app')

@section('title','Event Ujian Kenaikan Tingkat')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <h3>{{$event->nama_ukt}} Periode {{$event->periode}} - {{$event->tempat_ukt}}, {{date('d F Y',strtotime($event->tanggal_mulai))}} s.d {{date('d F Y',strtotime($event->tanggal_akhir))}} </h3>
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
                        <th>Dojang</th>
                        <th>Sabuk</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Daftar</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($jeja as $j)
                        @if($event->jenis_ukt == 'UKT Reguler')
                            @if($j->tingkat <= 7)
                                <tr>
                                    <td>{{$j->nama_jeja}}</td>
                                    <td>{{$j->dojang}}</td>
                                    <td>{{$j->warna}}</td>
                                    <td>{{$j->jkel}}</td>
                                    <td>
                                        @if($j->id_registrasi)
                                            <span style="color:green">Terdaftar</span>
                                        @else
                                            <span style="color:red">Belum Terdaftar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('registUKT') }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin Menambahkan {{$j->nama_jeja}} ke UKT?')">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id_jeja" value="{{$j->id_jeja}}">
                                            <input type="hidden" name="id_ukt" value="{{$event->id}}">
                                                <button type="submit" class="badge me-2 bg-blue-500 text-white f-12" style="border:none;">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @else
                            @if($j->tingkat > 7)
                                <tr>
                                    <td>{{$j->nama_jeja}}</td>
                                    <td>{{$j->dojang}}</td>
                                    <td>{{$j->warna}}</td>
                                    <td>{{$j->jkel}}</td>
                                    <td>
                                        @if($j->id_registrasi)
                                            <span style="color:green">Terdaftar</span>
                                        @else
                                            <span style="color:red">Belum Terdaftar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ url('/registUKT/'.$event->id.'/'.$j->id_jeja)}}" class="badge me-2 bg-blue-300 text-white f-12">Registrasi</a>
                                    </td>
                                </tr>
                            @endif
                        @endif
                       @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection