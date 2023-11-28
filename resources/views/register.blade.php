@extends('mainLayout.login')

@section('login')

<div class="d-flex flex-row justify-content-center align-items-center h-100 w-100">
    <section class="h-50 w-50 shadow p-3 mb-5 bg-body-tertiary rounded p-3">
        <div class="text-center">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite
            </a>
        </div>
        <form class="" action={{ url('/regist') }} method="post">
            @csrf
            @if (session()->has('regist_msg'))
                <div class="alert alert-warning" role="alert">
                    {{ session('regist_msg') }}
                </div>
                @php
                    session()->forget('regist_msg');
                @endphp
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" value="@if(session()->has('regist_msg')){{session('regist')['name']}}@endif" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@domai.co" value="@if(session()->has('regist_msg')){{session('regist')['email']}}@endif" required>
            </div>
            <div class="mb-3">
                <label for="nowa" class="form-label">WhatsApp No.</label>
                <input type="number" name="nowa" class="form-control" id="nowa" aria-describedby="emailHelp" placeholder="628..." value="@if(session()->has('regist_msg')){{session('regist')['nowa']}}@endif" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" placeholder="3403078..." value="@if (session()->has('regist_msg')) {{session('regist')['nik']}}@endif" required>
            </div>
            <div class="mb-3">
                <label for="passw" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="passw" placeholder="**..." value="@if (session()->has('regist_msg')) {{session('regist')['password']}}  @endif" required>
            </div>
            <div class="mb-3">
                <label for="rpass" class="form-label">Repeat Password</label>
                <input type="password" name="confirm_password" class="form-control" id="rpass">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sign Up</button><br>
                Sudah memiliki akun? <a href="/register" class="">Sign In</a>
            </div>
        </form>

    </section>
</div>

@endsection
