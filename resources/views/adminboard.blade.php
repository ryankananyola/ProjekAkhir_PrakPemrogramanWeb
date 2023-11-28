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
        let verif = [];
    </script>
    <nav class="fixed-top navbar navbar-expand-lg bg-dark-subtle">
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
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="btnCariAkun">Cari Akun</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" id="btnCariAdmin">Cari Admin</a>
                    </li> --}}
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
            <div class="col-md-2 sidebar bg-info h-500 min-vh-300 flex-col pt-4">
                <div id="btnProfile" class="profile p-2 bg-light rounded mb-2" style="cursor: default;">Profile</div>
                <div id="btnPenjualan" class="profile p-2 bg-light rounded mb-2"  style="cursor: default;">Transaksi</div>

            </div>
            <div id="1" class="col-md-10 bg-warning-subtle">
                {{-- konten profile --}}
                <div id="contentProfile" class=" m-3 rounded shadow w-80 p-3 bg-primary-subtle">
                    <h1>Admin : {{ $user->name }}</h1>
                    <div class="row">
                        <div class="col-4">
                            <p>Email</p>
                            <p>WhatsApp No.</p>
                            <p>NIK</p>
                        </div>
                        <div class="col-8">
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->nowa }}</p>
                            <p>{{ $user->nik }}</p>

                        </div>
                    </div>
                    <button class="btn btn-success">Edit</button>
                </div>
                {{-- akhir kontent profile --}}






                {{-- penjualan --}}
                <div id="contentPenjualan" class="p-3">

                    {{-- penjualan yang belum verified --}}
                    <div class="alert alert-info" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Transaksi yang anda akuisisi, <span class="badge text-bg-warning fw-medium">menunggu buyyer melakukan pembayaran.</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($transaksis as $tran)
                        @if ($tran->seller_id != $user->id && $tran->admin_id == $user->id  && $tran->buyyer_id != null && $tran->verified == 0)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-info">Info</span>
                    <p>Mungkin ada transaksi yang sudah dibayar, silakan cek secara berkala!..</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi baru yang anda akuisisi</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($transaksis as $key => $tran)
                        @if ($tran->seller_id != $user->id && $tran->admin_id == $user->id  && $tran->buyyer_id != null && $tran->verified == 0 )
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
                                    data-bs-target="#exampleModalXX{{$key}}">
                                    Detail
                                </button>
                                @if ($tran->payyed == 1)
                                <span class="badge text-bg-success">Akun sudah dibayar</span>
                                @endif
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModalXX{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-info-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-warning-subtle">
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
                                        <hr>
                                        <div class="mb-3 form-check">
                                            <input type="checkbox" class="form-check-input" id="veri" value="true" onchange="verif[{{$key}}](event)">
                                            <label class="form-check-label"  for="veri">Verifikasi bahwa transaksi telah dibayar oleh pembeli.</label>
                                        </div>
                                        <a href="/verified/{{$tran->id}}" class="veri{{$key}} d-none"> o</a>
                                        <script>
                                            verif[{{$key}}] = (e) => {
                                                console.log(e.target.value);
                                                if (e.target.checked == true){
                                                    if(window.confirm("Harap benar2 pastikan bahwa buyyer telah membayar sebelumnya...\nSetelah anda menekan 'Ok' akun akan terverifikasi")){
                                                        document.querySelector('.veri{{$key}}').click();
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
                    {{-- penjualan yang belum verified --}}



                    {{-- penjualan yang sudah verified --}}
                    <div class="alert alert-primary" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Transaksi yang sudah terverifikasi, masih <span class="badge text-bg-warning fw-medium">menunggu seller mengirimkan akunnya.</span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($transaksis as $tran)
                        @if ($tran->seller_id != $user->id && $tran->admin_id == $user->id  && $tran->buyyer_id != null && $tran->verified == 1 && $tran->send_buyyer == 0)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-info">Info</span>
                    <p>Setelah buyyer mengkonfirmasi kebenaran akun dan proses perubahan keamanan akun, anda dapat memberikan dana pembayaran ke penjual akun</p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi baru yang anda akuisisi</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($transaksis as $key => $tran)
                        @if ($tran->seller_id != $user->id && $tran->admin_id == $user->id  && $tran->buyyer_id != null && $tran->verified == 1  && $tran->send_buyyer == 0)
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
                                    data-bs-target="#exampleModalN{{$key}}">
                                    Detail
                                </button>
                                @if ($tran->akun != null)
                                <span class="badge text-bg-warning">Akun sudah dikirim</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalN{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun ({{$tran->id}}) <span class="text-primary">Verified</span></h1>
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

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- penjualan yang sudah vrified --}}





                    {{-- Penjualan yang sudah berhasil --}}
                    <div class="alert alert-info" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                        </svg>
                        Akun yang sudah diakhiri pembeli <span class="badge text-bg-warning fw-medium"></span>
                    </div>
                    @php
                        $jualadminbelum = 0;
                    @endphp
                    @foreach ($market as $tran)
                        @if ($tran->admin_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
                            @php
                                $jualadminbelum++;
                            @endphp
                        @endif
                    @endforeach
                    @if ($jualadminbelum != 0)
                    <span class="badge text-bg-warning">Info</span>
                    <p>Anda dapat menghapus transaksi setelah penjual mengkonfirmasi dananya. </p>
                    @else
                    <span class="badge text-bg-info">Belum ada transaksi pembelian baru yang dilakukan</span>
                    @endif
                    <div class="d-flex flex-sm-row p-3 justify-content-sm-start">
                        @foreach ($market as $key => $tran)
                        @if ($tran->admin_id == $user->id && $tran->verified == 1 && $tran->akun != null && $tran->send_buyyer == 1)
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

                                @if ($tran->send_seller == 1)
                                <span class="badge text-bg-success">Transaksi selesai</span>
                                @else
                                <span class="badge text-bg-warning">Belum selesai</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalC{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <label for="exampleFormControlTextarea1" class="form-label">Pesan Pembeli</label>
                                            <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" disabled placeholder="">{{$tran->buyyer_msg}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Pesan Penjual</label>
                                            <textarea class="form-control" name="akun" id="exampleFormControlTextarea1" rows="3" disabled placeholder="">{{$tran->admin_msg}}</textarea>
                                        </div>
                                        @if ($tran->send_seller == 1)
                                        <span class="badge text-bg-warning">Transaksi ini telah diselesaikan penjual</span>
                                        @endif

                                        <a href="/hapusTran/{{$tran->id}}" class="hapusTran{{$key}} d-none">ok</a>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            @if ($tran->send_seller == 1)
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" onclick="verif5(event)">Hapus Transaksi ini</button>
                                            @endif
                                        </div>
                                        <script>
                                            const verif5 = (e) => {
                                                // console.log(e.target.value);

                                                if(window.confirm("Apakah anda yakin ingin menghapus transaksi ini?")){
                                                    document.querySelector('.hapusTran'+{{$key}}).click();
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









            {{-- 2 market share --}}
            </div>
            <div id="2" class="col-md-10 bg-primary-subtle d-none">
                <div class="mt-2 alert alert-success" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm5.854 3.146a.5.5 0 1 0-.708.708L9.243 9.95H6.475a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.475a.5.5 0 1 0-1 0v2.768z"/>
                    </svg>
                    Sudah ada pembeli dan belum diakuisisi admin.
                </div>
                <div class="d-flex flex-sm-row p-3 justify-content-sm-evenly">
                    @foreach ($market as $key => $tran)
                    @if ($tran->admin_id != $user->id && $tran->buyyer_id != null)
                        <div class="bg-warning-subtle card me-3 mb-3" style="width: 320px">
                            <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top" style="object-fit: cover;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $tran->type_game }} ({{$tran->id}})</h5>
                                <p class="card-text mb-0">{{ $tran->akun_info }}.</p>
                                <h5 class="text-danger fw-bold my-2">{{ $tran->price }}</h5>
                                <button title="Lihat detail untuk melakukan pembelian akun" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalM{{$key}}">
                                    Detail
                                </button>
                                    @foreach ($allUser as $val)
                                    @if ($val->id == $tran->buyyer_id)
                                        {{-- <button class="btn btn-outline-success max-w">{{$val->name}} wa.me/{{$val->nowa}}8980980</button> --}}
                                        @break
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModalM{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-success-subtle">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Katalog Akun No.ID ({{$tran->id}})</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body bg-dark-subtle">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <img src="{{ asset($tran->img) }}" height="200px" class="card-img-top mb-3 rounded" alt="..." style="object-fit: cover;" >
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
                                                    @if($tran->admin_id == null)
                                                    <div class="alert alert-warning fw-bold" role="alert">
                                                        Belum ada Adminnya
                                                    </div>
                                                    @else
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->admin_id)
                                                            <h5 class="text-success">{{$val->name}}</h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="mb-3">
                                                    <h6>Nama Pembeli</h6>
                                                    @if($tran->buyyer_id == null)
                                                    <div class="alert alert-warning fw-bold" role="alert">
                                                        Belum ada Pembeli
                                                    </div>
                                                    @else
                                                    @foreach ($allUser as $val)
                                                        @if ($val->id == $tran->buyyer_id)
                                                            <h5 class="text-primary">{{$val->name}} <a href="http://wa.me/{{$val->nowa}}" class="text-decoration-none text-success">wa.me/{{$val->nowa}}</a></h5>
                                                            @break
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <a href="/handle/{{$user->id}}/{{$tran->id}}" class="btn btn-warning" title="ajukan pembelian akun ini untuk anda">Handle transaksi ini</a>
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
            <div id="3" class="col-md-10 bg-light d-none">
                <div class="mt-5 ms-3 p-3 bg-body-tertiary shadow-sm rounded-3 w-50">
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
                        <div  class=" m-3 rounded border w-50">
                            <div class="">
                                <h1 class="rounded-top p-3 bg-info text-light">{{ $user->name }}</h1>
                            </div>
                            <div class="p-3 ">
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
            // console.log(btnHome);
            // console.log(btnCariAkun);

            const contentPenjualan = document.getElementById('contentPenjualan');
            const contentProfile = document.getElementById('contentProfile');
            contentPenjualan.classList.add('d-none');
            contentProfile.classList.add('d-none');

            let paginator = {{ Illuminate\Support\Js::from(session('paginator')) }};
            if (paginator == 'profile') {
                contentPenjualan.classList.add('d-none');
                contentProfile.classList.remove('d-none');
            }else if (paginator == 'penjualan'){
                contentPenjualan.classList.remove('d-none');
                contentProfile.classList.add('d-none');

            }

            console.log(btnProfile);
            console.log(btnPenjualan);

            btnHome.addEventListener('click', (e) => {
                btnHome.classList.add('active');
                btnCariAkun.classList.remove('active');

                document.getElementById('1').classList.remove('d-none');
                document.getElementById('2').classList.add('d-none');
                document.getElementById('3').classList.add('d-none');
            });

            btnCariAkun.addEventListener('click', (e) => {
                btnHome.classList.remove('active');
                btnCariAkun.classList.add('active');

                document.getElementById('1').classList.add('d-none');
                document.getElementById('2').classList.remove('d-none');
                document.getElementById('3').classList.add('d-none');
            });

            // console.log('3');
            // btnCariAdmin.addEventListener('click', (e) => {
            //     btnHome.classList.remove('active');
            //     btnCariAkun.classList.remove('active');
            //     btnCariAdmin.classList.add('active');

            //     document.getElementById('1').classList.add('d-none');
            //     document.getElementById('2').classList.add('d-none');
            //     document.getElementById('3').classList.remove('d-none');
            // });


            btnProfile.addEventListener('click', (e) => {
                // console.log('okprofile clicked');
                btnProfile.classList.add('shadow');
                btnPenjualan.classList.remove('shadow');

                contentProfile.classList.remove('d-none');
                contentPenjualan.classList.add('d-none');
            });

            btnPenjualan.addEventListener('click', (e) => {
                btnProfile.classList.remove('shadow');
                btnPenjualan.classList.add('shadow');

                contentProfile.classList.add('d-none');
                contentPenjualan.classList.remove('d-none');
            });
            console.log('3');
            // const imgInp = document.getElementById('imgInp');
            // const preview = document.getElementById('preview');
            // console.log(imgInp);
            // console.log(preview);

            // imgInp.onchange = (e) => {
            //     const [file] = imgInp.files;
            //     if (file) {
            //         preview.src = URL.createObjectURL(file);
            //         preview.classList.remove('d-none');
            //     }
            // }

            // const imgInp2 = document.getElementById('imgInp2');
            // const preview2 = document.getElementById('preview2');

            // imgInp2.onchange = (e) => {
            //     const [file2] = imgInp2.files;
            //     if (file2) {
            //         preview2.src = URL.createObjectURL(file2);
            //         preview2.classList.remove('hidden');
            //     }
            // }


        });


        let transaksis = {{ Illuminate\Support\Js::from(session('paginator')) }};
        console.log(transaksis);
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
