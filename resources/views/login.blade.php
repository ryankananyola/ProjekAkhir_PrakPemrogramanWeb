@extends('mainLayout.login')

@section('login')
    {{-- @if (session()->has('login_msg'))
        <div class="text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            {{ session('login_msg') }}
        </div>
    @endif --}}

    <div class="d-flex flex-row justify-content-center align-items-center h-100 w-100">
        <section class="h-50 w-50 shadow p-3 mb-5 bg-transparent rounded p-3" style="backdrop-filter: blur(10px)" >
            <div class="text-center">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                    Flowbite
                </a>
            </div>
            <form class="" action={{ url('/login') }} method="post">
                @csrf
                @if (session()->has('login_msg'))
                    <div class="text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                        {{ session('login_msg') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" >
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="passw" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="passw">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Log in</button><br>
                    Belum memiliki akun? <a href="/register" class="">Sign up</a>
                </div>
            </form>

        </section>
    </div>

    @if (isset($pesan))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
        </div>
    @endif
@endsection
