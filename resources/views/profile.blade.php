@extends('layout.template')

@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade">
        <div class="container position-relative">
            <h1>Profil</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Profil</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <section class="container section profile">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="pt-4 card-body profile-card d-flex flex-column align-items-center">
                        <!-- <img src="assets/img/trainer-1-2.jpg" alt="Profile" class="rounded-circle"> -->
                        <img src="https://via.placeholder.com" class="rounded-circle" alt="Profile"
                            style="width: 150px; height: 150px;">
                        <h2>{{ $user->username }}</h2>
                        <h3>{{ $user->role_id->name }}</h3>
                        <div class="mt-2 social-links">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="pt-3 card-body">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Overview</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                    Profile</button>
                            </li>

                            @auth
                                @if (auth()->user()->role_id == 2)
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#prof-store">Store
                                            Overview</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit-store">Edit
                                            Store</button>
                                    </li>
                                @endif
                            @endauth


                        </ul>
                        {{-- <div class="pt-2 tab-content">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif

                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->username }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nomor Hp</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->phone }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                                </div>

                            </div>

                            <div class="pt-3 tab-pane fade profile-edit" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('login.update', $user->id) }}" method="POST" class="mx-3 my-3">
                                    @csrf
                                    @method('PUT')
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="{{ old('username', $user->username) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Nomor Hp</label>
                                        <input type="number" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone', $user->phone) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" id="alamat" class="form-control"
                                            value="{{ old('alamat', $user->alamat) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div> --}}

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
