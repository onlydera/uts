@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Tambah Partner</h2>
    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Nama Partner:</label><br>
            <input type="text" name="name" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Logo Partner:</label><br>
            <input type="file" name="logo" accept="image/*" required>
        </div>
        <button type="submit" style="padding: 10px 15px; background: blue; color: white; border: none;">Simpan</button>
        <a href="{{ route('admin.partners.index') }}">Batal</a>
    </form>
</div>
@endsection