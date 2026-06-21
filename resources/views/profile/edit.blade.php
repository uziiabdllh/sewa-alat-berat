@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0 rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center"
                             style="width:100px;height:100px;font-size:40px;">

                            👤

                        </div>

                        <h2 class="fw-bold mt-3">
                            {{ auth()->user()->name }}
                        </h2>

                        <span class="badge bg-dark">
                            {{ ucfirst(auth()->user()->role) }}
                        </span>

                    </div>

                    <hr>

                    <div class="row gy-4">

                        <div class="col-md-6">

                            <label class="text-muted">
                                Nama
                            </label>

                            <h5>{{ auth()->user()->name }}</h5>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Email
                            </label>

                            <h5>{{ auth()->user()->email }}</h5>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Role
                            </label>

                            <h5>{{ ucfirst(auth()->user()->role) }}</h5>

                        </div>

                        <div class="col-md-6">

                            <label class="text-muted">
                                Bergabung
                            </label>

                            <h5>
                                {{ auth()->user()->created_at->format('d M Y') }}
                            </h5>

                        </div>

                    </div>

                    <div class="mt-5 text-center">

                        <a href="{{ route('profile.edit') }}"
                           class="btn btn-warning rounded-pill px-5">

                            Edit Profil

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection