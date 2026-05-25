@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Partner</h2>
    <a href="{{ route('admin.partners.create') }}" style="margin-bottom: 15px; display: inline-block;">+ Tambah Partner</a>
    <form action="{{ route('admin.partners.index') }}" method="GET" style="margin-bottom: 15px;">
        <input type="text" name="search" placeholder="Cari partner..." value="{{ request('search') }}" style="padding: 5px;">
        <button type="submit" style="padding: 5px 10px;">Cari</button>
    </form>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Partner</th>
                <th>Logo</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partners as $partner)
            <tr>
                <td>{{ $partner->id }}</td>
                <td>{{ $partner->name }}</td>
                <td>
                    <img src="{{ asset('storage/' . $partner->logo_url) }}" width="100">
                </td>
                <td>
                    <a href="{{ route('admin.partners.edit', $partner->id) }}">Edit</a> | 
                    <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection