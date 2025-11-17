@extends('layouts.admin')

@section('content')
<h1 class="h3 mb-4 text-gray-800">Data Perawatan</h1>

<a href="{{ route('treatment.create') }}" class="btn btn-primary mb-3">Tambah Perawatan</a>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>Nama Perawatan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($treatment as $t)
                <tr>
                    <td>{{ $t->id }}</td>
                    <td>{{ $t->name }}</td>
                    <td>
                        <a href="{{ route('treatment.edit', $t->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('treatment.destroy', $t->id) }}" method="POST"
                            style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Hapus perawatan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
