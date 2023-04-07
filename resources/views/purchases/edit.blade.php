@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- Form Create --}}
    <form class="w-lg-50" method="POST" action="{{ route('purchases.update', $purchase->id) }}">
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
            <label for="exampleInputEmail1" class="form-label">No Nota</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="receipt_number"
                value="{{ $purchase->receipt_number }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="date_buy"
                value="{{ date('Y-m-d', strtotime($purchase->date_buy)) }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="quantity_buy"
                value="{{ $purchase->quantity_buy }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Distributor</label>

            <div class="items">
                <select class="form-select" aria-label="Default select example" name="distributor_id">
                    <option selected hidden>Pilih Distributor</option>
                    @foreach ($distributors as $item)
                        <option value="{{ $item->id }}"
                            {{ $purchase->distributor()->first()->id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" value="{{ $purchase->user_id }}">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
