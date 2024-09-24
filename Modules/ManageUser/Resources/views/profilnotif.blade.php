@extends('layouts.layout_main')
@section('title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Notification Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Notification</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile text-center">
                                <img class="profile-user-img img-fluid img-circle" 
                                     src="{{ auth()->user()->userDetail && auth()->user()->userDetail->foto && auth()->user()->userDetail->foto !== 'default.png' 
                                            ? asset('/storage/photos/' . auth()->user()->userDetail->foto) 
                                            : 'https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg' }}" 
                                     alt="User profile picture" 
                                     loading="lazy" 
                                     style="width: 70px; height: 70px; object-fit: cover; object-position: top; border: none;">

                                <h3 class="profile-username">{{ ucfirst(auth()->user()->username) }}</h3>
                                <p class="text-muted">Divisi: {{ auth()->user()->Divisi->nama_divisi }}</p>
                            </div>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i>Nama Lengkap</strong>
                                <p class="text-muted">{{ ucfirst(auth()->user()->userDetail->nama_lengkap ?? 'userdetail belum terinput') }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Email</strong><br>
                                <p class="text-muted">{{ ucfirst(auth()->user()->email) }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>User Role</strong><br>
                                <p class="text-muted">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>No Induk Karyawan</strong>
                                <p class="text-muted">{{ ucfirst(auth()->user()->userDetail->no_induk_karyawan ?? 'userdetail belum terinput') }}</p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#in" data-toggle="tab">Notification Message</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="in">
                                        <div class="timeline timeline-inverse">
                                            <div class="time-label">
                                                <span class="bg-danger">10 Feb. 2014</span>
                                            </div>
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                                                    <div class="timeline-body">Etsy doostang zoodles...</div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Add more timeline items here -->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings">
                                        <!-- Settings form -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


