@extends('layouts.admin') @section('content')
<div class="container">
    <h2>Daftar Kategori</h2>
    
    <a href="{{ route('admin.categories.create') }}" style="margin-bottom: 15px; display: inline-block;">+ Tambah Kategori</a>

    @if(session('success'))
        <div style="color: green; margin-bottom: 10px;">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.categories.index') }}" method="GET" style="margin-bottom: 15px;">
        <input type="text" name="search" placeholder="Cari kategori..." value="{{ request('search') }}" style="padding: 5px;">
        <button type="submit" style="padding: 5px 10px;">Cari</button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Dibuat Pada</th>
                <th>Diupdate Pada</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a> | 
                    
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection