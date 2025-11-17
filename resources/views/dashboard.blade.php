@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pemilik</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOwners }}</div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Hewan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPets }}</div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pemeriksaan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCheckups }}</div>
            </div>
        </div>
    </div>

</div>

@endsection
