@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- Form Create --}}
    <form class="w-lg-50 " method="POST" action="{{ route('users.store') }}">
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
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            <div id="emailHelp" class="form-text">Panjang 8 Karakter dengan angka</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="confirm-password">
            <div id="emailHelp" class="form-text">Panjang 8 Karakter dengan angka</div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Role</label>

            <div class="items">
                <select class="form-select" aria-label="Default select example" name="role_id">
                    <option selected hidden>Pilih Role</option>
                    @foreach ($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>

            <div class="items d-flex gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1" value="1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Aktif
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="0">
                    <label class="form-check-label" for="flexRadioDefault2">
                        Nonaktif
                    </label>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
