@extends('layouts.dashboard')

@section('dashboard-content')
    {{-- Form Create --}}
    <form class="w-50" method="POST" action="{{ route('sales.update', $sale->id) }}">
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
                value="{{ $sale->receipt_number }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="exampleInputEmail1" name="date_sale"
                value="{{ date('Y-m-d', strtotime($sale->date_sale)) }}">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="quantity_sale"
                value="{{ $sale->quantity_sale }}">
        </div>

        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
