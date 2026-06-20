@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark fw-bold">
                    Edit Kategori
                </div>

                <div class="card-body">

                    <form action="{{ route('categories.update',$category->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Kategori
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ $category->name }}"
                                class="form-control">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="form-control">{{ $category->description }}</textarea>

                        </div>
                        

                        <button
                            type="submit"
                            class="btn btn-success">

                            Update

                        </button>

                        <a href="{{ route('categories.index') }}"
                           class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection