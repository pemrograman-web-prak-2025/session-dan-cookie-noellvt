@extends('layouts.app')

@section('title', 'Daftar Perkenalan')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2>Daftar Perkenalan Saya</h2>
    <a href="{{ route('perkenalan.create') }}" class="btn btn-success">+ Tambah Data Baru</a>
</div>

@if($perkenalan->count() > 0)
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($perkenalan as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->npm }}</td>
            <td>{{ Str::limit($p->deskripsi_singkat, 50) }}</td>
            <td>
                <a href="{{ route('perkenalan.edit', $p->id) }}" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
                <form action="{{ route('perkenalan.destroy', $p->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<div style="text-align: center; padding: 50px; color: #718096;">
    <p style="font-size: 18px;">Belum ada data perkenalan.</p>
    <p>Klik tombol "Tambah Data Baru" untuk memulai!</p>
</div>
@endif
@endsection