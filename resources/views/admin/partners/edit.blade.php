@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Partner</h2>
    <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 10px;">
            <label>Nama Partner:</label><br>
            <input type="text" name="name" value="{{ $partner->name }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label>Logo Saat Ini:</label><br>
            @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo_url) }}" width="100"><br>
            @endif
            <label>Ganti Logo (opsional):</label><br>
            <input type="file" name="logo" accept="image/*">
        </div>
        <button type="submit" style="padding: 10px 15px; background: green; color: white; border: none;">Update</button>
        <a href="{{ route('admin.partners.index') }}">Batal</a>
    </form>
</div>
@endsection