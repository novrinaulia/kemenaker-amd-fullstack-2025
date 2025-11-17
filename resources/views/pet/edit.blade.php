@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Edit Hewan</h1>

<div class="card shadow">
    <div class="card-body">

        <form action="{{ route('pet.update',$pet->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group">
                <label>Pemilik</label>
                <select class="form-control" name="owner_id">
                    @foreach($owner as $o)
                    <option value="{{ $o->id }}" {{ $o->id == $pet->owner_id ? 'selected':'' }}>
                        {{ $o->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <p class="text-muted">Format nama, species, usia, dll hanya bisa diupdate lewat input baru.</p>

            <button class="btn btn-primary">Update</button>

        </form>

    </div>
</div>

@endsection
