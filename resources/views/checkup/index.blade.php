@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Data Pemeriksaan</h1>

<a href="{{ route('checkup.create') }}" class="btn btn-primary mb-3">Tambah Pemeriksaan</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Hewan</th>
                        <th>Perawatan</th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($checkup as $c)
                    <tr>
                        <td>{{ $c->pet->name }}</td>
                        <td>{{ $c->treatment->name }}</td>
                        <td>{{ $c->notes }}</td>
                        <td>{{ $c->created_at->format("d/m/Y H:i") }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

            {{ $checkup->links() }}

        </div>
    </div>
</div>

@endsection
