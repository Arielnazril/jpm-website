@extends('layouts.main')

@section('title', 'Edit Profil | PT. Jasa Prima Makmur')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h3 class="text-center mb-4">Edit Profil</h3>

            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
                </div>

                <hr>

                <div class="mb-3">
                    <label class="form-label">Password Baru (opsional)</label>
                    <input type="password" name="password" class="form-control" placeholder="Isi jika ingin mengganti password">
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
                </div>

                <button type="submit" class="btn btn-warning w-100 mt-3">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>
@endsection
