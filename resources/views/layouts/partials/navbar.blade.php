@php
use App\Models\PermintaanNonFixedAsset;
use App\Models\Userdetail;

use Illuminate\Support\Facades\Auth;

$role = Auth::user()->getRoleNames()->first(); // Assuming the user has only one role

$userdetail = Userdetail::where('id_user', Auth::id())->first();

@endphp
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item icon-button">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item icon-button">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit"><i class="fas fa-search"></i></button>
                            <li class="nav-item">
                                <a id="bell" class="nav-link" data-widget="notif" href="#" role="button">
                                    <i class="fas fa-bell"></i>
                                </a>
                            </li>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li class="nav-item icon-button">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item icon-button">
            <a class="nav-link material-icons {{ $menu == 'notifprofile' ? 'active' : '' }}" onclick="removeSpan()" data-widget="notif" href="{{ route('notifprofile') }}" role="button">
                <i class="fas fa-bell"></i>
            </a>
        </li>
        <li class="nav-item icon-button">
            <a class="nav-link" href="{{ route('logout') }}" role="button">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-light-lightblue elevation-4">
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('boxed.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Fixed<b>Asset</b></span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img id="profile-img" src="{{ $userdetail && $userdetail->foto && $userdetail->foto !== 'default.png' ? asset('/storage/photos/' . $userdetail->foto) : 'https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg' }}" alt="User Image" class="profile-img" style="width: 70px; height: 70px;">
            </div>
            <div class="info">
                <p>{{ strtoupper(Auth::user()->username) }}</p>
            </div>
        </div>

        <div id="profile-view" style="display: none;">
            <div class="profile-header">
                <button id="back-to-navbar" class="btn-icon btn-icon-primary" title="Back">
                    <i class="fas fa-arrow-left"></i>
                </button>
            </div>
            <div class="profile-info">
                <img src="{{ $userdetail && $userdetail->foto && $userdetail->foto !== 'default.png' ? asset('/storage/photos/' . $userdetail->foto) : 'https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg' }}" alt="User Image" class="profile-img">
                <div class="profile-details">
                    <h3>{{ strtoupper(Auth::user()->username) }}</h3>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <button class="btn-icon btn-icon-edit" data-id="{{ Auth::user()->id }}" data-name="{{ Auth::user()->username }}" title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ $menu == 'Dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">FIXED ASSET</li>

                <li class="nav-item has-treeview {{ $menu == 'Aset' || $menu == 'Tambah Aset' ? 'menu-open' : '' }}">
                    @if(auth()->user()->role_id == 19 || auth()->user()->role_id == 1)
                    <a href="#" class="nav-link {{ $menu == 'Aset' || $menu == 'Tambah Aset' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Pencatatan Fix Aset
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('manageaset.index') }}" class="nav-link {{ $menu == 'Aset' ? 'active' : '' }}">
                                <i class="fas fa-cubes nav-icon"></i>
                                <p>Aset</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manageaset.create') }}" class="nav-link {{ $menu == 'Tambah Aset' ? 'active' : '' }}">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Tambah Aset</p>
                            </a>
                        </li>
                    </ul>
                    @endif
                </li>

                <li class="nav-item has-treeview {{ $menu == 'PermintaanFA' || $menu == 'ApprovalAset' ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $menu == 'PermintaanFA' || $menu == 'ApprovalAset' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Permintaan Fixaset
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managepermintaanfa.index') }}" class="nav-link {{ $menu == 'PermintaanFA' ? 'active' : '' }}">
                                <i class="far fa-life-ring nav-icon"></i>
                                <p>Permintaan Aset</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if(auth()->user()->role_id == 19 || auth()->user()->role_id == 1)
                <li class="nav-header">KATEGORI</li>
                <li class="nav-item">
                    <a href="{{ route('manageinstitusi.index') }}" class="nav-link {{ $menu == 'Institusi' ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Institusi</p>
                    </a>
                </li>

                <li class="nav-item menu-is-opening {{ $menu == 'Tipe' ? 'menu-open' : '' }}">
                    <a id="daftar" href="#" class="nav-link {{ in_array($menu, ['Tipe', 'Kelompok', 'Jenis', 'Lokasi', 'Ruang']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Daftar Kode Aset Tetap
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('managetipe.index') }}" class="nav-link {{ $menu == 'Tipe' ? 'active' : '' }}">
                                <i class="fas fa-th-large nav-icon"></i>
                                <p>Tipe</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managekelompok.index') }}" class="nav-link {{ $menu == 'Kelompok' ? 'active' : '' }}">
                                <i class="fas fa-layer-group nav-icon"></i>
                                <p>Kelompok</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managejenis.index') }}" class="nav-link {{ $menu == 'Jenis' ? 'active' : '' }}">
                                <i class="fas fa-tags nav-icon"></i>
                                <p>Jenis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('managelokasi.index') }}" class="nav-link {{ $menu == 'Lokasi' ? 'active' : '' }}">
                                <i class="fas fa-map-marker-alt nav-icon"></i>
                                <p>Lokasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manageruangan.index') }}" class="nav-link {{ $menu == 'Ruang' ? 'active' : '' }}">
                                <i class="fas fa-door-open nav-icon"></i>
                                <p>Ruang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>





<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ensure jQuery is loaded before using it
        if (typeof $ === 'undefined') {
            console.error('jQuery is not loaded');
            return;
        }
    
        // Open the edit modal when the edit button is clicked
        document.querySelectorAll('.btn-icon-edit').forEach(button => {
            button.addEventListener('click', function () {
                const itemId = this.dataset.id;
                const itemName = this.dataset.name;
                const editIdElement = document.getElementById('editId');
                const editNameElement = document.getElementById('editName');
    
                if (editIdElement) editIdElement.value = itemId;
                if (editNameElement) editNameElement.value = itemName;
    
                $('#editModal').modal('show');
            });
        });
    
        // Toggle forms for editing user details and changing password
        document.getElementById('showChangePasswordForm').addEventListener('click', function () {
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('changePasswordForm').style.display = 'block';
        });
    
        document.getElementById('showEditForm').addEventListener('click', function () {
            document.getElementById('editForm').style.display = 'block';
            document.getElementById('changePasswordForm').style.display = 'none';
        });
    
        // Notification on bell icon click
        const bellIcon = document.getElementById('bell');
        bellIcon.addEventListener('click', function (event) {
            const notificationMessage = 'You have a new notification!';
            const notificationDiv = document.createElement('div');
            notificationDiv.className = 'notification-popup';
            notificationDiv.textContent = notificationMessage;
    
            const rect = event.target.getBoundingClientRect();
            notificationDiv.style.position = 'fixed';
            notificationDiv.style.top = rect.bottom + 'px';
            notificationDiv.style.left = rect.left + 'px';
            document.body.appendChild(notificationDiv);
    
            setTimeout(() => document.body.removeChild(notificationDiv), 3000);
        });
    
        // Handle dropdown menu items
        document.querySelectorAll('.nav-item').forEach(item => {
            const dropdown = item.querySelector('.nav-treeview');
            const arrowIcon = item.querySelector('.nav-link .right');
    
            if (dropdown) {
                dropdown.style.display = item.classList.contains('menu-open') ? 'block' : 'none';
                item.addEventListener('click', () => {
                    const isOpen = dropdown.style.display === 'block';
                    dropdown.style.display = isOpen ? 'none' : 'block';
                    if (arrowIcon) {
                        arrowIcon.classList.toggle('active', !isOpen);
                    }
                });
            }
        });
    
        // Profile image click handling
        const profileImg = document.getElementById('profile-img');
        const profileView = document.getElementById('profile-view');
        const sidebar = document.querySelector('.main-sidebar');
        const backToNavbarButton = document.getElementById('back-to-navbar');
    
        profileImg.addEventListener('click', function () {
            profileView.style.display = 'block';
            sidebar.classList.add('hidden-sidebar');
        });
    
        backToNavbarButton.addEventListener('click', function () {
            profileView.style.display = 'none';
            sidebar.classList.remove('hidden-sidebar');
        });
    
        // Shake badge animation
        const badge = document.querySelector('.nav-item .badge');
    
        function shakeBadge() {
            badge.classList.add('shake');
            setTimeout(() => badge.classList.remove('shake'), 500);
        }
    
        let shakeCount = 5;
        const shakeInterval = setInterval(() => {
            if (shakeCount > 0) {
                shakeBadge();
                shakeCount--;
            } else {
                clearInterval(shakeInterval);
            }
        }, 1000);
    });
    </script>
    