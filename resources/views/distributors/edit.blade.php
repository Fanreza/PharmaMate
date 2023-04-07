@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- Form Create --}}
    <form class="w-50" method="POST" action="{{ route('distributors.update', $distributor->id) }}">
        @csrf
        @method('PUT')


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
            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{ $distributor->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                value="{{ $distributor->address }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telepon</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="phone"
                value="{{ $distributor->phone }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
