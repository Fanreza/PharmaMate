@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">

            @can('distributor-create')
                {{-- Button Create --}}
                <div class="button-create">
                    <a href="{{ route('distributors.create') }}" class="btn btn-primary">Tambah Distributor</a>
                </div>
            @endcan


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel Distributor</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xs">Nama</th>
                                    <th class="text-xs">Alamat</th>
                                    <th class="text-xs">Telepon</th>
                                    <th class="text-xs">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($distributors as $data)
                                    <tr>
                                        <td class="py-3 px-4 text-sm">{{ $data->name }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->address }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->phone }}</td>
                                        <td class="py-3 px-4">

                                            @can('distributor-edit')
                                                <a href="{{ route('distributors.edit', $data->id) }}"
                                                    class="btn btn-info text-white font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">Edit</a>
                                            @endcan

                                            @can('distributor-delete')
                                                {{-- delete --}}
                                                <form action="{{ route('distributors.destroy', $data->id) }}" method="POST"
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
