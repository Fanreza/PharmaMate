@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            @can('sale-create')
                {{-- Button Create --}}
                <div class="button-create">
                    <a href="{{ route('sales.create') }}" class="btn btn-primary">Tambah Penjualan</a>
                </div>
            @endcan


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Penjualan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xs">No Nota</th>
                                    <th class="text-xs">Tanggal Penjualan</th>
                                    <th class="text-xs">Jumlah</th>
                                    <th class="text-xs">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $data)
                                    <tr>
                                        <td class="py-3 px-4 text-sm">{{ $data->receipt_number }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->date_sale }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->quantity_sale }}</td>
                                        <td class="py-3 px-4">
                                            @can('sale-edit')
                                                <a href="{{ route('sales.edit', $data->id) }}"
                                                    class="btn btn-info text-white font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">Edit</a>
                                            @endcan


                                            @can('sale-delete')
                                                {{-- delete --}}
                                                <form action="{{ route('sales.destroy', $data->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger text-white font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete user">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
