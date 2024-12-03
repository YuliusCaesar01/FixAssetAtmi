<!-- Modules/ManageJenis/Resources/views/import.blade.php -->
@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Import Data Jenis</h3>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('managejenis.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="excel_file">Pilih File Excel</label>
                            <input type="file" 
                                   class="form-control" 
                                   id="excel_file" 
                                   name="excel_file" 
                                   accept=".xlsx,.xls,.csv" 
                                   required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import Data</button>
                    </form>

                    <div class="mt-4">
                        <h4>Format Excel yang Diharapkan:</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id_kelompok</th>
                                    <th>nama_jenis_yayasan</th>
                                    <th>nama_jenis_mikael (opsional)</th>
                                    <th>nama_jenis_politeknik (opsional)</th>
                                    <th>foto_jenis (opsional)</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection