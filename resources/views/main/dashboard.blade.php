@extends('layouts.layout_main')
@section('title', 'Dashboard')
@section('content')

@php
     use App\Models\PermintaanFixedAsset;
     use App\Models\FixedAsset;
    // Fetch the count of records with status 'menunggu'
    $fixedAssetCount = PermintaanFixedAsset::where('status', 'menunggu')->count();
    $fixedAsset = FixedAsset::all()->count();

@endphp


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $fixedAsset }}</h3>
                                <p>FIXED ASSET TOTAL(FA)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cube"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $fixedAssetCount }}</h3>

                                <p>PERMINTAAN FIXED ASET</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cube"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>NON FIXED ASET(NFA)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cube"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $fixedAssetCount }}</h3>

                                <p>PERMINTAAN NON FIXED ASET (NFA)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cube"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    
@endsection
