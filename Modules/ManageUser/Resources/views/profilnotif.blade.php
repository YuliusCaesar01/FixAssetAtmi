@extends('layouts.layout_main')
@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header -->
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Profile Column -->
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile text-center">
                                <img class="profile-user-img img-fluid img-circle" 
                                     src="{{ auth()->user()->userDetail && auth()->user()->userDetail->foto && auth()->user()->userDetail->foto !== 'default.png' 
                                            ? asset(auth()->user()->userDetail->foto) 
                                            : 'https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg' }}" 
                                     alt="User profile picture" 
                                     loading="lazy" 
                                     style="width: 70px; height: 70px; object-fit: cover; object-position: top; border: none;">

                                <h3 class="profile-username">{{ ucfirst(auth()->user()->username) }}</h3>
                                <p class="text-muted">Divisi: {{ auth()->user()->Divisi->nama_divisi }}</p>
                            </div>
                        </div>

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-user mr-1"></i> Nama Lengkap</strong>
                                <p class="text-muted">{{ ucfirst(auth()->user()->userDetail->nama_lengkap ?? 'userdetail belum terinput') }}</p>
                                <hr>
                                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                <p class="text-muted">{{ auth()->user()->email }}</p>
                                <hr>
                                <strong><i class="fas fa-users mr-1"></i> User Role</strong>
                                <p class="text-muted">{{ ucfirst(auth()->user()->getRoleNames()->first()) }}</p>
                                <hr>
                                <strong><i class="fas fa-id-badge mr-1"></i> No Induk Karyawan</strong>
                                <p class="text-muted">{{ ucfirst(auth()->user()->userDetail->no_induk_karyawan ?? 'userdetail belum terinput') }}</p>
                                <hr>
                                <button class="btn-icon btn-icon-edit btn-primary btn-block" style="border-radius: 0%;" data-id="{{ Auth::user()->id }}" data-name="{{ Auth::user()->username }}" title="Edit">
                                    <span class="text-bold">Edit Profile</span> &nbsp;<i class="fas fa-edit"></i>
                                </button>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Notification Column -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#in" data-toggle="tab">Notification Message</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="in">
                                        <!-- Display Notification Information -->
                                        <div class="form-group">
                                            <p class="text-bold">Notification Today</p>
                                        </div>

                                        <!-- Notification Timeline -->
                                        <div class="timeline timeline-inverse" id="notificationTimeline">
                                            <div class="time-label" data-date="2024-09-24">
                                                <span class="bg-danger">24 Sep. 2024</span>
                                            </div>
                                            
                                            <!-- Notification with profile picture and text inline -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05 PM</span>
                                                    <div class="timeline-header d-flex align-items-center">
                                                        <!-- Sender Profile Picture -->
                                                        <img src="https://example.com/path-to-sender-profile.jpg" 
                                                             alt="Sender Profile" 
                                                             class="img-circle mr-2" 
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                        
                                                        <!-- Sender Message -->
                                                        <h3 class="timeline-header">
                                                            <a href="#">John Doe</a> sent you a message
                                                        </h3>
                                                    </div>
                                                    <div class="timeline-body">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                    </div>
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
                                        <!-- Settings form content -->
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

