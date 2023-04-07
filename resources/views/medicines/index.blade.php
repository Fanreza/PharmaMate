@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            {{-- Button Create --}}
            <div class="button-create">
                <a href="{{ route('medicines.create') }}" class="btn btn-primary">Tambah Obat</a>
            </div>


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Obat</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xs">Nama</th>
                                    <th class="text-xs">Kode</th>
                                    <th class="text-xs">Merk</th>
                                    <th class="text-xs">Stok</th>
                                    <th class="text-xs">Harga</th>
                                    <th class="text-xs">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($medicines as $data)
                                    <tr>
                                        <td class="py-3 px-4 text-sm">{{ $data->name }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->code }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->brand }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->quantity }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->price }}</td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('medicines.edit', $data->id) }}"
                                                class="btn btn-info text-white font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">Edit</a>

                                            {{-- delete --}}
                                            <form action="{{ route('medicines.destroy', $data->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-danger text-white font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Delete user">Delete</button>
                                            </form>
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
