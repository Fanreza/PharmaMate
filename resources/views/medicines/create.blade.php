@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- Form Create --}}
    <form class="w-50" method="POST" action="{{ route('medicines.store') }}">
        @csrf
        @method('POST')


        {{-- check if there error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- check if there success --}}

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kode</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="code">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Merk</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="brand">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipe</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="type">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="unit">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Golongan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="group">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Kemasan</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="packaging">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="price">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah Stok</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="quantity">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
