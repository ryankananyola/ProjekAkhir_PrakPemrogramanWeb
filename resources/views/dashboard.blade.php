<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    {{-- icon --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        body,
        html, {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        * {
            box-sizing: border-box;

        }

        .material-symbols-outlined {
        font-variation-settings:
            'FILL' 0,
            'wght' 500,
            'GRAD' 0,
            'opsz' 24
        }

    </style>
    <title>Laravel 10</title>
</head>

<body>
    <script>
        let kir = [];
        let verif2x = [];
        let verif3 = [];
    </script>
    <nav class="fixed-top navbar navbar-expand-lg bg-warning"">
        <div class="container">
            <a class="navbar-brand" href="#">REKENING BERSAMA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" id="btnHome">Home</a>
                    </li>
                    <li class="nav-itemw">
                        <a class="nav-link" href="#" id="btnCariAkun">Cari Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btnCariAdmin">Cari Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class=" btn btn-danger" href="/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 3.5em">1</div>
    {{-- ================================================================================================================= --}}
    <div class="container bg-primary-subtle">

        <div class="row h-100 min-vh-100">
            <div class="col-md-2 bg-info h-500 min-vh-300 flex-col pt-4"> 
                <div id="btnProfile" class="profile p-2 bg-light rounded mb-2" style="cursor: default;">Profile</div>
                <div id="btnPenjualan" class="profile p-2 bg-light rounded mb-2"  style="cursor: default;">Penjualan</div>
                <div id="btnPembelian" class="profile p-2 bg-light rounded mb-2"  style="cursor: default;">Pembelian</div>
            </div>
            <div id="1" class="col-md-10 bg-info-subtle">
                {{-- konten profile --}}
                <div id="contentProfile" class=" m-3 rounded shadow w-80 p-3 bg-light">
                    <h1>{{ $user->name }}</h1>
                    <div class="row">
                        <div class="col-4">
                            <p>Email</p>
                            <p>WhatsApp No.</p>
                            <p>NIK</p>
                        </div>
                        <div class="col-8">
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->wano }}</p>
                            <p>{{ $user->nik }}</p>

                        </div>
                    </div>
                    <button class="btn btn-success">Edit</button>
                </div>
                {{-- akhir kontent profile --}}






                {{-- penjualan --}}
                <div id="contentPenjualan" class="p-3 bg-light-subtle">
                    <div class="card">
                        <div class="card-header bg-primary-subtle">
                            Featured
                        </div>
                        @if (session()->has('errorHapusMsg'))
                            <div class="alert alert-warning" role="alert">
                                {{session('errorHapusMsg')}}
                            </div>
                            @php
                                session()->forget('errorHapusMsg');
                            @endphp
                        @endif
                        <div class="row m-0">
                            <div class="col-sm-5 p-3">
                                <h5 class="card-title">Your Listing</h5>
                                <p class="card-text">Buatlah penawaranmu semenarik mungkin untuk pengunjung yang lain.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah katalog akun
                                </button>
                            </div>
                            <div class="col-sm-7 p-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title">Katalogmu</h5>
                                        <p class="card-text">Jumlah katalog yang anda pasang</p>
                                        <button type="button" class="btn btn-success"
                                            @disabled(true)>{{ count($transaksis) }}</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <h5 class="card-title">Penawaran</h5>
                                        <p class="card-text">Transaksimu yang sedang berlangsung</p>
                                        <button type="button" class="btn btn-warning"
                                            @disabled(true)>{{ count($transaksis) }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- tambahData --}}
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-primary-subtle">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Katalog Akun</h1>
                                    <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body bg-warning">
                                    <form class="" action="/addJual" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="jenis_g" class="form-label">Jenis Game</label>
                                                    <input type="text" name="type_game" class="form-control" id="jenis_g" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga_g" class="form-label">Harga</label>
                                                    <input type="number" name="price" class="form-control" id="harga_g" aria-describedby="emailHelp" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="desc_g" class="form-label">Deskripsi akun</label>
                                                    <textarea name="akun_info" class="form-control" id="desc_g" aria-describedby="emailHelp" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Foto Akun</label>
                                                    <input id="imgInp" type="file" name="img" class="form-control" id="" aria-describedby="emailHelp" required>
                                                </div>
                                                <img id="preview" src="" alt="your image" height="200px" width="350px" class=" d-none" style="object-fit: cover;">
                                            </div>
                                            <input type="text" name="seller_id" hidden value="{{ $user->id }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-success" id="tambahData">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- tambahData --}}

                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start flex-wrap">
                        @foreach ($transaksis as $key => $transaksi)
                        @if ($transaksi->seller_id == $user->id && $transaksi->buyyer_id == null)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($transaksi->img) }}" height="200px" class="card-img-top" alt="..." style="object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $transaksi->type_game }}</h5>
                                <p class="card-text mb-0">{{ $transaksi->akun_info }}.</p>
                                <p class="card-text">{{ $transaksi->price }}</p>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2{{$key}}">
                                    Edit
                                </button>
                                <a href="/delJual/{{$transaksi->id}}" class="btn btn-danger">Hapus</a>
                            </div>
                        </div>
                        {{-- edit --}}
                        <div class="modal fade" id="exampleModal2{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Katalog Akun</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-dark-subtle">
                                        <form class="" action="/updateJual" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="jenis_g2" class="form-label">Jenis Game</label>
                                                        <input type="text" name="type_game" class="form-control" id="jenis_g2" aria-describedby="emailHelp" required value="{{ $transaksi->type_game }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="harga_g2" class="form-label">Harga</label>
                                                        <input type="number" name="price" class="form-control" id="harga_g2" aria-describedby="emailHelp" required value="{{ $transaksi->price }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="desc_g2" class="form-label">Deskripsi akun</label>
                                                        <textarea name="akun_info" class="form-control" id="desc_g2" aria-describedby="emailHelp" required>{{ $transaksi->akun_info }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Foto Akun</label>
                                                        <input id="imgInp2" type="file" name="img" class="form-control" id="" aria-describedby="emailHelp" >
                                                    </div>
                                                    <img id="preview2" src="{{ asset($transaksi->img) }}" alt="your image" height="200px" width="350px" class="" style="object-fit: cover;">
                                                </div>
                                                <input type="text" name="seller_id" hidden value="{{ $user->id }}">
                                                <input type="text" name="id" hidden value="{{ $transaksi->id }}">
                                                <input type="text" name="img_tmp" hidden value="{{ $transaksi->img }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button  type="submit" class="btn btn-success" id="tambahData">Edit Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- edit --}}
                        @endif
                        @endforeach
                    </div>

                    {{-- penjualan yang belum ada adminnya --}}
                    <div class="alert alert-warning" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Penjualan anda yang belum memiliki admin
                    </div>
                    @php
                        $jualadminbelum = 0;
                        @endphp
                    @foreach ($transaksis as $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id == null  && $tran->buyyer_id != null && $tran->buyyer_id != $user->id)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <button class="cariAdmin btn btn-warning">Cari Admin</button>
                    <script>
                        document.querySelector('.cariAdmin')
                        .addEventListener('click', (e) => {
                            console.log(e.target.getAttribute('name'));
                            @php

                            @endphp
                            document.getElementById('1').classList.add('d-none');
                            document.getElementById('2').classList.add('d-none');
                            document.getElementById('3').classList.remove('d-none');
                        });
                    </script>
                    @else
                    <span class="badge text-bg-info">Belum ada pembeli baru di penjualan anda</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($transaksis as $key => $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id == null && $tran->buyyer_id != null)

                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalA{{$key}}">
                                    Detail
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalA{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    <button class="btn btn-warning">Belum ada admin</button>

                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <button class="cariAdmin btn btn-warning" data-bs-dismiss="modal">Cari Admin</button>
                                        <script>
                                            for (let i = 0; i < document.getElementsByClassName('cariAdmin').length; i++) {
                                                document.getElementsByClassName('cariAdmin')[i]
                                                .addEventListener('click', (e) => {
                                                    console.log(e.target.getAttribute('name'));
                                                    document.getElementById('1').classList.add('d-none');
                                                    document.getElementById('2').classList.add('d-none');
                                                    document.getElementById('3').classList.remove('d-none');
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- penjualan yang belum ada adminnya --}}



                    {{-- penjualan yang sudah ada adminnya --}}
                    <div class="alert alert-info" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Penjualan anda yang sudah memiliki admin <span class="badge text-bg-secondary">Silakan menunggu transaksi ini diverifikasi oleh admin</span>
                    </div>
                    @php
                        $jualadminsudah = 0;
                        @endphp
                    @foreach ($transaksis as $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id != null  && $tran->buyyer_id != null && $tran->verified == 0)
                            @php
                                $jualadminsudah++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminsudah != 0)
                    <p>Sudah ada transaksi beradmin</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi baru di penjualan anda</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($transaksis as $key => $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id != null && $tran->buyyer_id != null && $tran->verified == 0)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalB{{$key}}">
                                    Detail
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalB{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Anda tinggal menunggu pembeli melakukan pembayaran kepada admin, setelah admin mengkonfirmasi ia akan memverifikasi transaksi ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- penjualan yang sudah ada adminnya --}}


                    {{-- penjualan anda yang sudah terverifikasi admin --}}
                    <div class="alert alert-success" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Penjualan anda yang sudah terverifikasi <span class="badge text-bg-secondary">Silakan melakukan pengisian data akun di bagian detail</span>
                    </div>
                    @php
                        $jualadminsudah = 0;
                        @endphp
                    @foreach ($transaksis as $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id != null  && $tran->buyyer_id != null && $tran->verified == 1)
                            @php
                                $jualadminsudah++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminsudah != 0)
                    <p>Sudah ada transaksi terverifikasi <span class="badge text-bg-warning">Silakan melakukan pengisian data akun di bagian detail</span></p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi terverifikasi di penjualan anda</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($transaksis as $key => $tran)
                        @if ($tran->seller_id == $user->id && $tran->admin_id != null && $tran->buyyer_id != null && $tran->verified == 1)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalB{{$key}}">
                                    Detail
                                </button>
                                @if ($tran->akun != null)
                                <span class="badge text-bg-warning">Akun sudah anda kirim</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalB{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-info-subtle">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <form action="/kirim_akun" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <input type="text" name="idTran" class="d-none" value="{{$tran->id}}">
                                                <label for="exampleFormControlTextarea1" class="form-label">Isikan Informasi akun anda seperti username dan password :</label>
                                                <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" placeholder="username : ...  ||  Password : ...">{{$tran->akun}}</textarea>
                                              </div>
                                              <button type="submit" class="kirim{{$key}} d-none">ok</button>
                                        </form>
                                        <span class="badge text-bg-info mb-2">Info penting</span>
                                        <p>Pembeli memiliki waktu 1x24Jam untuk melakukan checking dan mengubah kemananan akun. Jika tidak ada kendala, dana akan segera diteruskan ke anda sebagai penjual melalui Chat WhatsApp oleh Admin</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @if ($tran->akun == null)
                                            <button type="button" class="btn btn-primary" onclick="kir[{{$key}}](event)" >Kirim</button>
                                            @else
                                            <button type="button" class="btn btn-success" onclick="kir[{{$key}}](event)" >Update</button>
                                            @endif
                                        </div>
                                        <script>
                                            kir[{{$key}}] = (e) => {
                                                if(window.confirm("Harap benar2 pastikan bahwa email tersebut adalah data yang valid yang akan dicek langsung oleh Pembeli...\nSetelah anda menekan 'Kirim' akun akan segera dicek oleh Buyyer")){
                                                    document.querySelector('.kirim'+{{$key}}).click();
                                                };
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- penjualan anda yang sudah terverifikasi admin --}}


                    {{-- Penjualan yang sudah diakhiri pembeli =  berhasil --}}
                    <div class="alert alert-primary" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Akun yang sudah diakhiri pembeli <span class="badge text-bg-warning fw-medium"></span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id != null  && $tran->seller_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-warning">Info</span>
                    <p>Admin akan meneruskan dana Anda secepat mungkin. Jika tidak silakan menghubungi admin terkait </p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id != null  && $tran->seller_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalD{{$key}}">
                                    Detail
                                </button>

                                @if ($tran->akun != null)
                                <span class="badge text-bg-warning">Akun sudah dikirim</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalD{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-danger">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Data akun username dan password :</label>
                                            <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" disabled placeholder="">{{$tran->akun}}</textarea>
                                        </div>

                                        <span class="badge text-bg-warning">Info Penting</span>
                                        <p>Jika Anda sebagai penjual belum menerima dana dari Admin, jangan pernah menyelesaikan transaksi ini dahulu</p>
                                        <form action="/selesai/{{$tran->id}}" method="post">
                                            @csrf
                                            <div class="mb-3 form-check">
                                                <label class="col-form-label"  for="verio">Pesan anda untuk transaksi ini</label>
                                                <textarea class="form-control" name="admin_msg" id="verio" placeholder="pesan anda sebagai penjual...">{{$tran->admin_msg}}</textarea>
                                                @if ($tran->admin_msg == null)
                                                <button type="submit" class=" btn btn-primary">Simpan pesan</button>
                                                @else
                                                <button type="submit" class=" btn btn-success">Update pesan</button>
                                                @endif
                                            </div>
                                        </form>
                                        <a href="/selesaikan/{{$tran->id}}" class="selesai{{$key}} d-none">pl</a>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @if ($tran->send_seller == 0)
                                            <button type="button" class="btn btn-primary" onclick="verif4(event)" data-bs-dismiss="modal">Selesaikan (Dana Telah Anda Terima)</button>
                                            @else
                                            <span class="badge text-bg-warning">Transaksi ini telah anda selesaikan</span>
                                            @endif
                                        </div>
                                        <script>
                                            const verif4 = (e) => {
                                                // console.log(e.target.value);

                                                if(window.confirm("Apakah anda yakin ingin menyelesaikan transaksi ini?\n\nPastikan anda telah menerima dana dari Admin")){
                                                    document.querySelector('.selesai'+{{$key}}).click();
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- Penjualan yang sudah berhasil --}}


                </div>
                {{-- penjualan --}}


                {{-- pembelian --}}
                <div class="p-3 bg-light" id="contentPembelian">
                    <div class="alert alert-info" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Transaki yang anda beli dan belum memiliki admin. <span class="badge text-bg-warning fw-medium">Setiap transaksi membutuhkan admin</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id == null  && $tran->buyyer_id == $user->id)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-info">Info</span>
                    <p>Silakan mencari admin untuk dapat mengurus transaksimu.</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id == null  && $tran->buyyer_id == $user->id)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalA{{$key}}">
                                    Detail
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalA{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-light">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    <span class="badge text-bg-info">Belum ada adminnya</span>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button class="cariAdmin btn btn-warning" data-bs-dismiss="modal">Cari Admin</button>
                                        <script>
                                            for (let i = 0; i < document.getElementsByClassName('cariAdmin').length; i++) {
                                                document.getElementsByClassName('cariAdmin')[i]
                                                .addEventListener('click', (e) => {
                                                    console.log(e.target.getAttribute('name'));
                                                    document.getElementById('1').classList.add('d-none');
                                                    document.getElementById('2').classList.add('d-none');
                                                    document.getElementById('3').classList.remove('d-none');
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>

                    {{-- Yang sudah ada admin, Bayar dulu --}}
                    <div class="alert alert-success" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Transaki sudah ada admin. <span class="badge text-bg-warning fw-medium">Saatnya melakukan pembayaran melalui admin</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 0)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-info">Info</span>
                    <p>Silakan menghubungi admin untuk melakukan pembayaran. Setelah melakukan pembayaran dengan admin, silakan mengkonfirmasi bahwa akun telah dibayar di bagian detail transaksi di bawah ini.</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 0)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalB{{$key}}">
                                    Detail
                                </button>
                                @if ($tran->payyed == 1)
                                <span class="badge text-bg-success">Akun sudah dibayar</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalB{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-danger">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @if($tran->payyed == 0)
                                            <hr>
                                            <div class="mb-3 form-check">
                                                <input type="checkbox" class="form-check-input" id="veri" value="true" onchange="verif2x[{{$key}}](event)">
                                                <label class="form-check-label"  for="veri">Konfirmasi bahwa anda telah membayar akun yang dibeli.</label>
                                            </div>
                                        @endif
                                        <a href="/payyed/{{$tran->id}}" id="payy{{$key}}" class="payy{{$key}} d-none"> o</a>
                                        <script>
                                            verif2x[{{$key}}] = (e) => {
                                                // console.log(e.target.value);
                                                if (e.target.checked == true){
                                                    if(window.confirm("Harap benar-benar memastikan anda telah melakukan pembayaran melalui Admin yang mengurus transaksi ini.\nJika sudah tekan 'Ok")){
                                                        document.querySelector('.payy{{$key}}').click();
                                                    }
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                    {{-- Yang sudah ada admin, Bayar dulu --}}

                    {{-- Yang sudah terverifikasi --}}
                    <div class="alert alert-success" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Transaki yang sudah terverifikasi <span class="badge text-bg-warning fw-medium">Menunggu Admin melakukan verifikasi pembayaranmu.</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun == null)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-info">Info</span>
                    <p>Silakan menunggu atau menghubungi admin terkait verifikasi pembayaranmu.</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun == null)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach

                                @if ($tran->verified == 1)
                                <span class="badge text-bg-info">Akun sudah divrifikasi</span>
                                @endif
                            </div>
                        </div>


                        @endif
                        @endforeach
                    </div>
                    {{-- Yang sudah terverifikasi --}}

                    {{-- yang sudah dikirim penjual --}}
                    <div class="alert alert-primary" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Akun yang sudah dikirim penjual <span class="badge text-bg-warning fw-medium">Menunggu Admin melakukan verifikasi pembayaranmu.</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 0)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-warning">Info Penting</span>
                    <p>Segera lakukan pengecekan dan pengubahan data autentikasi atau keamanan akun. Anda diberi waktu 1x24 jam untuk proses pengamanan akun yang anda beli </p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 0)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalC{{$key}}">
                                    Detail
                                </button>

                                @if ($tran->akun != null)
                                <span class="badge text-bg-warning">Akun sudah dikirim</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalC{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-light-subtle">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-danger">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Data akun username dan password :</label>
                                            <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" disabled placeholder="">{{$tran->akun}}</textarea>
                                        </div>

                                        <form action="/pesanPembeli" method="post">
                                            @csrf
                                            <div class="mb-3 form-check">
                                                <input type="text" name="idTran" value="{{$tran->id}}" class="d-none">
                                                <label class="col-form-label"  for="verio">Pesan anda untuk transaksi ini</label>
                                                <textarea class="form-control" name="buyyer_msg" id="verio" placeholder="pesan anda sebagai pembeli...">{{$tran->buyyer_msg}}</textarea>
                                                @if ($tran->buyyer_msg == null)
                                                <button type="submit" class=" btn btn-primary">Simpan pesan</button>
                                                @else
                                                <button type="submit" class=" btn btn-success">Update pesan</button>
                                                @endif
                                            </div>
                                        </form>



                                        <span class="badge text-bg-warning">Info</span>
                                        <p>Setelah anda mengakhiri transaksi, penjual berhak menerima dana melalui Admin</p>
                                        {{-- <form action="/akhiri/{{$tran->id}}" method="post">
                                            @csrf
                                            <div class="mb-3 form-check">
                                                <label class="col-form-label"  for="verio">Pesan anda untuk transaksi ini</label>
                                                <textarea class="form-control" name="buyyer_msg" id="verio" placeholder="pesan anda sebagai pembeli..."></textarea>
                                                <button type="submit" class="finish{{$key}} d-none">ok</button>
                                            </div>
                                        </form> --}}
                                        <a href="/akhiri/{{$tran->id}}" class="finish{{$key}} d-none">ok</a>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button  type="submit" class="btn btn-primary" id="tambahData" onclick="verif3[{{$key}}](event)">Akhiri Transaksi</button>
                                        </div>
                                        <script>
                                            verif3[{{$key}}] = (e) => {
                                                // console.log(e.target.value);

                                                if(window.confirm("Apakah anda yakin ingin mengakhiri transaksi ini?")){
                                                    document.querySelector('.finish{{$key}}').click();
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- Akun yang sudah dikirim --}}

                    {{-- selesai dari sisi pembeli --}}
                    <div class="alert alert-primary" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Akun yang sudah Anda akhiri <span class="badge text-bg-warning fw-medium"></span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-warning"></span>
                    <p>Terima kasih atas kepercayaan anda kepada kami. </p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang anda lakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id != null  && $tran->buyyer_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
                        <div class="card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        Buyyer
                                        <h5 class="text-primary fw-bold my-2">{{ $val->name}} <a href="http://wa.me/62{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                        @break
                                    @endif
                                @endforeach
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalD{{$key}}">
                                    Detail
                                </button>

                                @if ($tran->akun != null)
                                <span class="badge text-bg-warning">Akun sudah dikirim</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalD{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;">
                                                <h3>{{$tran->type_game}}</h3>
                                                <p>{{ $tran->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$tran->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-danger">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Data akun username dan password :</label>
                                            <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" disabled placeholder="">{{$tran->akun}}</textarea>
                                        </div>

                                        <span class="badge text-bg-warning">Info</span>
                                        <p>Setelah anda mengakhiri transaksi, penjual berhak menerima dana melalui Admin</p>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- selesai dari sisi pembeli --}}


                </div>
                {{-- pembelian --}}






            {{-- 2 market share --}}
            </div>
            <div id="2" class="col-md-10 bg-primary-subtle d-none">
                <div class="mt-2 alert alert-warning" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                    </svg>
                    Belum ada pembeli
                </div>
                <div class="d-flex flex-sm-row p-3 justify-content-sm-evenly">
                    @foreach ($market as $key => $transaksi)
                    @if ($transaksi->seller_id != $user->id && $transaksi->buyyer_id != $user->id)
                        <div class="card me-3 mb-3 bg-success-subtle" style="width: 320px">
                            <img src="{{ asset($transaksi->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $transaksi->type_game }}</h5>
                                <p class="card-text mb-0">{{ $transaksi->akun_info }}.</p>
                                <p class="card-text">{{ $transaksi->price }}</p>
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalM{{$key}}">
                                    Detail
                                </button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalM{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($transaksi->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;" >
                                                <h3>{{$transaksi->type_game}}</h3>
                                                <p>{{ $transaksi->akun_info }}</p>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Pemilik akun</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $transaksi->seller_id)
                                                            <h5 class="text-primary">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Mobile WhatsApp Seller</h6>
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $transaksi->seller_id)
                                                            <h5 class="text-success">
                                                                <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a>
                                                            </h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Harga akun</h6>
                                                    <h5>{{$transaksi->price}}</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Admin</h6>
                                                    @if($transaksi->admin_id == null)
                                                    <div class="alert alert-warning fw-bold" role="alert">
                                                        Belum ada Adminnya
                                                    </div>
                                                    @else
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $transaksi->admin_id)
                                                            <h5 class="text-success">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="/pasang/{{$user->id}}/{{$transaksi->id}}" class="btn btn-primary" title="ajukan pembelian akun ini untuk anda">Ajukan Pembelian</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
            {{-- 2 market share --}}

            {{-- 3 cariadmin --}}
            <div id="3" class="col-md-10 bg-dark-subtle d-none">
                <div class="mt-5 ms-3 p-3 bg-body-tertiary shadow-sm rounded-3 w-80">
                    <h4>Cari Admin Yang Nyaman Untuk Anda.</h4>
                    <p>Transaksi baru bisa dimulai ketika sudah ada admin yang bersedia mengkoordinasi transaksi anda. </p>
                    <hr>
                    <span class="badge text-bg-warning mb-3">Info Penting</span>
                    <p>Untuk mendapatkan admin di transaksimu, silakan menghubungi admin melalui mobile no. yang tersedia agar admin tersebut mengakuisisi transaksi anda</p>
                    <span class="badge text-bg-primary">Semoga Transaksimu menyenangkan...</span>
                </div>
                <div class="d-flex fex-row">
                    @foreach ($allUser as $key => $user)
                    @if ($user->admined == 1 )
                        <div  class=" m-3 rounded border w-80">
                            <div class="">
                                <h1 class="rounded-top p-3 bg-info text-light">{{ $user->name }}</h1>
                            </div>
                            <div class="p-3 bg-light ">
                                <div class="row">
                                    <div class="col-4">
                                        <p>Email</p>
                                        <p>WhatsApp No.</p>
                                        <p>NIK</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->email }}</p>
                                        <p><a href="http://wa.me/{{ $user->nowa }}" class="badge text-decoration-none text-bg-success">wa.me/{{ $user->nowa }}</a></p>
                                        <p>{{ $user->nik }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endif
                    @endforeach
                </div>
            </div>
            {{-- 3 cariadmin --}}

        </div>
    </div>


    <script>
        window.addEventListener("DOMContentLoaded", (event) => {

            // const cariAdmin = document.getElementsByClassName('.cariAdmin');
            // console.log(cariAdmin)
            console.log('1');
            // console.log(document.querySelector('.cariAdmin'));





                console.log('2');
            const btnProfile = document.getElementById('btnProfile');
            const btnPenjualan = document.getElementById('btnPenjualan');
            const btnPembelian = document.getElementById('btnPembelian');

            const btnHome = document.getElementById('btnHome');
            const btnCariAkun = document.getElementById('btnCariAkun');
            const btnCariAdmin = document.getElementById('btnCariAdmin');
            // console.log(btnHome);
            // console.log(btnCariAkun);

            const contentPenjualan = document.getElementById('contentPenjualan');
            const contentProfile = document.getElementById('contentProfile');
            const contentPembelian = document.getElementById('contentPembelian');
            contentPenjualan.classList.add('d-none');
            contentProfile.classList.add('d-none');
            contentPembelian.classList.add('d-none');

            let paginator = {{ Illuminate\Support\Js::from(session('paginator')) }};
            if (paginator == 'profile') {
                contentPenjualan.classList.add('d-none');
                contentProfile.classList.remove('d-none');
                contentPembelian.classList.add('d-none');
            }else if (paginator == 'penjualan'){
                contentPenjualan.classList.remove('d-none');
                contentProfile.classList.add('d-none');
                contentPembelian.classList.add('d-none');

            }

            // console.log(btnProfile);
            // console.log(btnPembelian);
            // console.log(btnPenjualan);
            btnHome.addEventListener('click', (e) => {
                btnHome.classList.add('active');
                btnCariAkun.classList.remove('active');
                btnCariAdmin.classList.remove('active');

                document.getElementById('1').classList.remove('d-none');
                document.getElementById('2').classList.add('d-none');
                document.getElementById('3').classList.add('d-none');
            });

            btnCariAkun.addEventListener('click', (e) => {
                btnHome.classList.remove('active');
                btnCariAkun.classList.add('active');
                btnCariAdmin.classList.remove('active');

                document.getElementById('1').classList.add('d-none');
                document.getElementById('2').classList.remove('d-none');
                document.getElementById('3').classList.add('d-none');
            });

            btnCariAdmin.addEventListener('click', (e) => {
                btnHome.classList.remove('active');
                btnCariAkun.classList.remove('active');
                btnCariAdmin.classList.add('active');

                document.getElementById('1').classList.add('d-none');
                document.getElementById('2').classList.add('d-none');
                document.getElementById('3').classList.remove('d-none');
            });


            btnProfile.addEventListener('click', (e) => {
                // console.log('okprofile clicked');
                btnProfile.classList.add('shadow');
                btnProfile.classList.add('bg-gray-800');

                btnPembelian.classList.remove('shadow');
                btnPembelian.classList.remove('bg-gray-800');
                btnPenjualan.classList.remove('shadow');
                btnPenjualan.classList.remove('bg-gray-800');

                contentProfile.classList.remove('d-none');
                contentPembelian.classList.add('d-none');
                contentPenjualan.classList.add('d-none');
            });

            btnPembelian.addEventListener('click', (e) => {
                btnProfile.classList.remove('shadow');
                btnProfile.classList.remove('bg-gray-800');
                btnPembelian.classList.add('shadow');
                btnPembelian.classList.add('bg-gray-800');
                btnPenjualan.classList.remove('shadow');
                btnPenjualan.classList.remove('bg-gray-800');

                contentProfile.classList.add('d-none');
                contentPembelian.classList.remove('d-none');
                contentPenjualan.classList.add('d-none');

            });

            btnPenjualan.addEventListener('click', (e) => {
                btnProfile.classList.remove('shadow');
                btnProfile.classList.remove('bg-gray-800');
                btnPembelian.classList.remove('shadow');
                btnPembelian.classList.remove('bg-gray-800');
                btnPenjualan.classList.add('shadow');
                btnPenjualan.classList.add('bg-gray-800');

                contentProfile.classList.add('d-none');
                contentPembelian.classList.add('d-none');
                contentPenjualan.classList.remove('d-none');
            });

            const imgInp = document.getElementById('imgInp');
            const preview = document.getElementById('preview');
            console.log(imgInp);
            console.log(preview);

            imgInp.onchange = (e) => {
                const [file] = imgInp.files;
                if (file) {
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('d-none');
                }
            }

            console.log('3');


            const imgInp2 = document.getElementById('imgInp2');
            const preview2 = document.getElementById('preview2');

            imgInp2.onchange = (e) => {
                const [file2] = imgInp2.files;
                if (file2) {
                    preview2.src = URL.createObjectURL(file2);
                    preview2.classList.remove('hidden');
                }
            }


        });


        let transaksis = {{ Illuminate\Support\Js::from(session('paginator')) }};
        console.log(transaksis);
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
