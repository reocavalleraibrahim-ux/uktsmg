@extends('dashboard.layout.app')

@section('title','Reset Password')

@section('content')
    <div class="col-xl-12 col-md-8">
            <div class="card Recent-Users table-card">
              <div class="card-header">
                <a href="{{ url()->previous()}}" class="btn btn-warning"><i class="ph ph-arrow-left"></i> Kembali</a> <br><br>
                @if (session('success'))
                  <br>
                  <br>
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif 

                @if (session('error'))
                  <br>
                  <br>
                  <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                  </div>
                @endif 
              </div>
              <div class="card-body px-0 py-3">
                <div class="table-responsive">
                  <form method="post" action="{{ url('/updatePass')}}" enctype="multipart/form-data">
                     @csrf
                     @method('POST')
                    <div class="container mt-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Masukkan No HP</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Ulangi Password Baru</label>
                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Ulang Password Baru">
                        </div>
                        <div class="col-md-6">
                            <small id="message"></small>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" id="res" name="Reset">
                        </div>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection