@extends('layouts.layout_main')
@section('title', 'Dashboard')
@section('content')

@php
    use App\Models\PermintaanFixedAsset;
    use App\Models\FixedAsset;
    
    $fixedAssetCount = PermintaanFixedAsset::where('status', 'menunggu')->count();
    $fixedAsset = FixedAsset::all()->count();
@endphp

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 display-4">Dashboard</h1> <!-- Bigger and bolder title -->
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info shadow rounded">
                        <div class="inner">
                            <h3>{{ $fixedAsset }}</h3>
                            <p class="lead">FIXED ASSET TOTAL (FA)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <a href="{{ route('manageaset.index') }}" class="small-box-footer btn btn-outline-light btn-lg">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success shadow rounded">
                        <div class="inner">
                            <h3>{{ $fixedAssetCount }}</h3>
                            <p class="lead">PERMINTAAN FIXED ASET</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <a href="{{ route('managepermintaanfa.index') }}" class="small-box-footer btn btn-outline-light btn-lg">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning shadow rounded">
                        <div class="inner">
                            <h3>0</h3>
                            <p class="lead">NON FIXED ASET (NFA)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <a href="#" class="small-box-footer btn btn-outline-light btn-lg">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger shadow rounded">
                        <div class="inner">
                            <h3>{{ $fixedAssetCount }}</h3>
                            <p class="lead">PERMINTAAN NON FIXED ASET (NFA)</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-cube"></i>
                        </div>
                        <a href="#" class="small-box-footer btn btn-outline-light btn-lg">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
