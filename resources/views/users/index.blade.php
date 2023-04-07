@extends('layouts.dashboard')

@section('dashboard-content')
    <div class="row">
        <div class="col-12">
            {{-- Button Create --}}
            <div class="button-create">
                <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
            </div>


            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tabel User</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xs">Nama</th>
                                    <th class="text-xs">Email</th>
                                    <th class="text-xs">Role</th>
                                    <th class="text-xs">Status</th>
                                    <th class="text-xs">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $data)
                                    <tr>
                                        <td class="py-3 px-4 text-sm">{{ $data->name }}</td>
                                        <td class="py-3 px-4 text-sm">{{ $data->email }}</td>
                                        <td class="py-3 px-4 text-sm"> {{ $data->roles()->first()->name }}</td>
                                        <td class="py-3 px-4 text-sm">
                                            @if ($data->status == 1)
                                                <span class="badge badge-sm bg-gradient-success">Online</span>
                                            @endif

                                            @if ($data->status == 0)
                                                <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                            @endif
                                        </td>
                                        <td class="py-3 px-4">
                                            <a href="{{ route('users.edit', $data->id) }}"
                                                class="btn btn-info text-white font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Edit user">Edit</a>

                                            {{-- delete --}}
                                            <form action="{{ route('users.destroy', $data->id) }}" method="POST"
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
