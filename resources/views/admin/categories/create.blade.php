@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Kategori Baru</h2>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name">Nama Kategori:</label><br>
            <input type="text" id="name" name="name" required style="width: 100%; padding: 8px;">
        </div>
        
        <button type="submit" style="padding: 10px 15px; background-color: blue; color: white; border: none;">Simpan</button>
        <a href="{{ route('admin.categories.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
</div>
@endsection