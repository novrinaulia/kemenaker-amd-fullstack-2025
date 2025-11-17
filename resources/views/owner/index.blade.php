@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Pemilik</h1>

<a href="{{ route('owner.create') }}" class="btn btn-primary mb-3">Tambah Pemilik</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Telepon</th>
                        <th>Verifikasi</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($owner as $o)
                    <tr>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->phone }}</td>
                        <td>{{ $o->phone_verified ? 'Ya' : 'Tidak' }}</td>
                        <td>
                            <a href="{{ route('owner.edit',$o->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form method="POST" action="{{ route('owner.destroy',$o->id) }}" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $owner->links() }}

        </div>
    </div>
</div>

@endsection
