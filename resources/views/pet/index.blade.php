@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Hewan</h1>

<a class="btn btn-primary mb-3" href="{{ route('pet.create') }}">Tambah Hewan</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Pemilik</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($pet as $p)
                    <tr>
                        <td>{{ $p->code }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->species }}</td>
                        <td>{{ $p->owner->name }}</td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="{{ route('pet.edit',$p->id) }}">Edit</a>

                            <form class="d-inline" method="POST" action="{{ route('pet.destroy',$p->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $pet->links() }}

        </div>
    </div>
</div>

@endsection
