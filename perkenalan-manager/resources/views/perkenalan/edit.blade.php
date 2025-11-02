@extends('layouts.app')

@section('title', 'Edit Data Perkenalan')

@section('content')
<h2 style="margin-bottom: 30px;">Edit Data Perkenalan</h2>

<form action="{{ route('perkenalan.update', $perkenalan->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="{{ old('nama', $perkenalan->nama) }}" required>
    </div>

    <div class="form-group">
        <label>NPM</label>
        <input type="text" name="npm" value="{{ old('npm', $perkenalan->npm) }}" required>
    </div>

    <div class="form-group">
        <label>Deskripsi Singkat</label>
        <textarea name="deskripsi_singkat" rows="5" required>{{ old('deskripsi_singkat', $perkenalan->deskripsi_singkat) }}</textarea>
    </div>

    <div style="display: flex; gap: 10px;">
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('perkenalan.index') }}" class="btn" style="background: #e2e8f0;">Batal</a>
    </div>
</form>
@endsection