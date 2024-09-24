@extends('layouts.layout_main')
@section('title', 'Data Detail Aset Tetap')
@section('content')
@php
use App\Models\User;

$fixasetuser = User::where('role_id', 14)->first();
$unitkaryauser = User::where('role_id', 16)->first();
$ketuayayasanuser = User::where('role_id', 15)->first();
$dirmanagerasetuser = User::where('role_id', 18)->first();
$dirkeuanganuser = User::where('role_id', 17)->first();
$managerasetuser = User::where('role_id', 19)->first();
@endphp

    <!-- Content Wrapper. Contatipe page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Detail Aset Tetap</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('manageaset.index') }}">Aset Tetap</a></li>
                            <li class="breadcrumb-item active">Detail Aset Tetap</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    
        <section class="content">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block">{{ $permintaan->status_permohonan }} FIX ASSET ({{ ucfirst($permintaan->id_permintaan_fa) }})</h3>
                            <div class="col-12">
                               
                                @if($permintaan->file_pdf)
                                <!-- Use a placeholder PDF image -->
                                <img src="http://www.newdesignfile.com/postpic/2014/04/adobe-pdf-icon-transparent-background_247974.png" class="product-image" alt="Foto Barang Aset">
                                
                                <p class="float-right">Diajukan Oleh: {{ ucfirst($permintaan->user->username) }} <b></b></p>
                                
                                <!-- Buttons to view/download the PDF -->
                                <div class="mt-2">
                                    @if($pdf)
                                        <a href="{{ asset('storage/' . $pdf) }}" class="btn btn-primary" target="_blank">View PDF</a>
                                        <a href="{{ asset('storage/' . $pdf) }}" class="btn btn-success" download>Download PDF</a>
                                    @else
                                        <p class="text-danger">PDF file is not available.</p>
                                    @endif
                                </div>
                            @else
                                <p>No PDF file available.</p>
                            @endif
                            
                                
                                
                                
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                             
                            <h4 class="my-3">Status :
                                
                                @if($permintaan->status == 'menunggu')
                                <span class="badge bg-secondary"> {{ ucfirst($permintaan->status) }}</span>
                                @elseif($permintaan->status == 'disetujui')
                                <span class="badge bg-info"> Selesai </span>
                                @elseif($permintaan->status == 'delayed')
                                <span class="badge bg-secondary"> Delayed </span>
                                @else
                                <span class="badge bg-danger"> {{ ucfirst($permintaan->status) }}</span>
                            @endif
                            </h4>
                            <hr>
                            <h5>Kategori Barang</h5>
                            <dl class="row">
                               
                                <dt class="col-sm-4">Tipe</dt>
                                <dd class="col-sm-8">: {{ $permintaan->id_tipe }} - {{ $permintaan->Tipe->nama_tipe }} </dd>
                                <dt class="col-sm-4">Kelompok</dt>
                                <dd class="col-sm-8">
                                    : {{ $permintaan->id_kelompok }} - {{ $permintaan->Kelompok->nama_kelompok }}
                                </dd>
                                <dt class="col-sm-4">Jenis</dt>
                                <dd class="col-sm-8">: {{ $permintaan->id_jenis }} - {{ $permintaan->jenis->nama_jenis }}</dd>
                                <dt class="col-sm-4">Lokasi</dt>
                                <dd class="col-sm-8">: {{ $permintaan->id_lokasi }} - {{ $permintaan->Lokasi->nama_lokasi }}</dd>
                                <dt class="col-sm-4">Ruang</dt>
                                <dd class="col-sm-8">: {{ $permintaan->id_ruang }} - {{ $permintaan->ruang->nama_ruang }}</dd>
                               
                            </dl>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item text-dark nav-link active" id="product-desc-tab" data-toggle="tab"
                                    href="#product-desc" role="tab" aria-controls="product-desc"
                                    aria-selected="true">Deskripsi FA</a>
                                <a class="nav-item text-dark nav-link" id="product-history-tab" data-toggle="tab"
                                    href="#product-history" role="tab" aria-controls="product-history"
                                    aria-selected="false">Detail Deskripsi</a>
                            @if($permintaan->perkiraan_harga != null || $permintaan->unit_asal != null)

                                <a class="nav-item text-dark nav-link" id="additional-info-tab" data-toggle="tab"
                                    href="#additional-info" role="tab" aria-controls="additional-info"
                                    aria-selected="false">Informasi Tambahan</a>
                            @endif
                                <a class="nav-item text-dark nav-link" id="progress-timeline-tab" data-toggle="tab"
                                    href="#progress-timeline" role="tab" aria-controls="progress-timeline"
                                    aria-selected="false">Progress Timeline</a>
                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <!-- Konten yang sudah ada -->
                            <div class="tab-pane fade show active tab-background" id="product-desc" role="tabpanel"
                                aria-labelledby="product-desc-tab">
                                <p>{{ $permintaan->deskripsi_permintaan }}</p>
                            </div>
                            <div class="tab-pane fade tab-background" id="product-history" role="tabpanel"
                                aria-labelledby="product-history-tab">
                                {{ $permintaan->descripsi_permintaan }}
                                <p>
                                    <dl class="row">
                                        <dt class="col-sm-4">Unit Pemohon</dt>
                                        <dd class="col-sm-8">: {{ ucfirst($permintaan->unit_pemohon) }}</dd>
                                        <dt class="col-sm-4">Unit Tujuan</dt>
                                        <dd class="col-sm-8">: {{ ucfirst($permintaan->unit_tujuan) }}</dd>
                                        <dt class="col-sm-4">Status Permohonan</dt>
                                        <dd class="col-sm-8">: {{ $permintaan->status_permohonan }}</dd>
                                        <dt class="col-sm-4">Tanggal Permohonan</dt>
                                                @php
                                                    \Carbon\Carbon::setLocale('id');
                                                    $formattedDate = \Carbon\Carbon::parse($permintaan->tgl_permintaan)->translatedFormat('l, d F Y');
                                                @endphp
                                                <dd class="col-sm-8">: {{ $formattedDate }}</dd>

                                        <dt class="col-sm-4">Alasan Permohonan</dt>
                                        <dd class="col-sm-8">: {{ $permintaan->alasan_permintaan }}</dd>
                                    </dl>
                                </p>
                            </div>
                            <div class="tab-pane fade tab-background" id="additional-info" role="tabpanel"
                                aria-labelledby="additional-info-tab">
                                <dl class="row">

                                    @if($permintaan->perkiraan_harga != null)
                                    <dt class="col-sm-4">Perkiraan Harga</dt>
                                    <dd class="col-sm-8">: Rp {{ number_format($permintaan->perkiraan_harga, 0, ',', '.') }}</dd>                                    
                                    <dt class="col-sm-4">Tindak Lanjut</dt>
                                    <dd class="col-sm-8">: {{ ucfirst($permintaan->tindak_lanjut) }}</dd>
                                    <dt class="col-sm-4">Perolehan Harga</dt>
                                      @if($permintaan->perolehan_harga)
                                      <dd class="col-sm-8">: Rp {{ number_format($permintaan->perolehan_harga, 0, ',', '.') }}</dd>
                                      @else
                                       ''
                                      @endif
                                    @endif
                                    @if($permintaan->unit_asal != null)
                                    <dt class="col-sm-4">Unit Asal Aset</dt>
                                    <dd class="col-sm-8">: {{ ucfirst($permintaan->unit_tujuan) }}</dd>
                                    <dt class="col-sm-4">Tindak Lanjut</dt>
                                    <dd class="col-sm-8">: {{ ucfirst($permintaan->tindak_lanjut) }}</dd>
                                    <dt class="col-sm-4">Serah Terima BAST</dt>
                                    <dd class="col-sm-8">: TTD disini</dd>
                                    @endif
                                   
                                    
                                
                                </dl>
                            </div>
                            <!-- Konten untuk tab baru Progress Timeline -->
                            <div class="tab-pane fade tab-background" id="progress-timeline" role="tabpanel"
                                aria-labelledby="progress-timeline-tab">
                                <div class="progress-timeline">
                                    <!-- Validator 1 -->
                                    <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_fixaset_timestamp ? \Carbon\Carbon::parse($permintaan->valid_fixaset_timestamp)->diffForHumans() : '' }}
                                            </div>
                                             <!-- Validation Time -->
                                            <div class="profile-status">
                                                @if($fixasetuser->userdetail !== null && $fixasetuser->userdetail->foto !== null && $fixasetuser->userdetail->foto !== 'default.png')

                                                    <img id="profile-img" src="{{ asset('/storage/photos/' . $fixasetuser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                                @else
                                                    <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img"  style="width: 95px; height: 95px;">
                                                @endif
                                                @switch($permintaan->valid_fixaset)
                                                    @case('setuju')
                                                    <div class="status-indicator approved">
                                                        <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                    </div>
                                                        @break
                                                    @case('menunggu')
                                                    <div class="status-indicator default">
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </div>
                                                        @break

                                                        @case('tolak')
                                                        <div class="status-indicator rejected">
                                                            <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                        </div>
                                                        @break
                                                    @default
                                                    
                                                @endswitch
                                            

                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px;">Official Fix Asset</p>
                                            <div class="status-note">
                                                
                                                <div class="status ">
                                                    <p> 
                                                        @if($permintaan->delay_id != 14)
                                                        <center>Status:
                                                        <span class="
                                                        inline-flex items-center px-2 py-1 text-sm font-medium 
                                                        @if($permintaan->valid_fixaset === 'setuju')
                                                            text-white bg-green-500
                                                        @elseif($permintaan->valid_fixaset === 'tolak')
                                                            text-white bg-red-500
                                                        @else
                                                            text-gray-800 bg-gray-200
                                                        @endif
                                                        rounded-full
                                                    ">
                                                        @if($permintaan->valid_fixaset === 'setuju')
                                                            Disetujui
                                                        @elseif($permintaan->valid_fixaset === 'tolak')
                                                            Ditolak
                                                        @else
                                                           Menunggu
                                                        @endif
                                                        </center>
                                                    </span>
                                                    @else
                                                    <center>
                                                        <span class="inline-flex items-center px-2 py-1 text-sm font-medium rounded-full">
                                                         Menunggu Waktu Ditunda
                                                        </span>
                                                    </center>
                                                    @endif
                                                      
                                                
                                                    </p>                                                      </div>
                                                    @if($permintaan->delay_id == 14)
                                                    <span style="display: block; width: 100%; padding: 0.5rem; text-align: center; color: white; background-color: #333;">
                                                        Delayed &nbsp;
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </span>
                                                    <span style="display: block; width: 100%; padding: 0.5rem; text-align: center; color: white; background-color: #6a6a6a;" id="countdown" class="countdown">
                                                        <span id="timer"></span>
                                                    </span>
                                                   
                                                @endif
                                                
                                                <div class="note">
                                                    @if($permintaan->perkiraan_harga != null)
                                                    <p>Harga Perkiraan :<br> Rp. <strong>{{ number_format($permintaan->perkiraan_harga, 0, ',', '.') }}</strong></p>
                                                    @endif
                                                    @if($permintaan->unit_asal != null)
                                                    <p>Unit asal aset : <strong>{{ $permintaan->unit_asal }}</strong></p>
                                                    @endif
                                                    @if($permintaan->valid_fixaset === 'tolak' || $permintaan->delay_id === 14)
                                                    <p>Catatan : <strong>{{ ucfirst($permintaan->catatan) }}</strong></p>
                                                    @endif
                                                </div>
                                                @if($permintaan->pdf_bukti_1 != null && auth()->user()->role_id != 5 )

                                                <center>
                                                    <a href="{{ asset('storage/' . $pdfbukti1) }}" class="btn btn-primary" target="_blank">View PDF</a>
                                                </center>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
        @if($permintaan->perkiraan_harga != null && $permintaan->perkiraan_harga >= 1000000000 )

                                    <!-- Validator 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_ketuayayasan_timestamp ? \Carbon\Carbon::parse($permintaan->valid_ketuayayasan_timestamp)->diffForHumans() : '' }}
                                            </div>                                            
                                            <div class="profile-status">
                                            @if($ketuayayasanuser->userdetail !== null && $ketuayayasanuser->userdetail->foto !== null && $ketuayayasanuser->userdetail->foto !== 'default.png')

                                                <img id="profile-img" src="{{ asset('/storage/photos/' . $ketuayayasanuser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @else
                                                <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @endif                                                <div class="status-indicator default">
                                                    @switch($permintaan->valid_ketuayayasan)
                                                    @case('setuju')
                                                    <div class="status-indicator approved">
                                                        <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                    </div>
                                                        @break
                                                    @case('menunggu')
                                                    <div class="status-indicator default">
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </div>
                                                        @break

                                                        @case('tolak')
                                                        <div class="status-indicator rejected">
                                                            <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                        </div>
                                                        @break
                                                    @default
                                                        
                                                @endswitch                                                </div>
                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px;">Ketua Yayasan</p>
                                            <div class="status-note">
                                                <div class="status">
                                                    <p><center>Status: 
                                                        <span class="
                                                        inline-flex items-center px-2 py-1 text-sm font-medium 
                                                        @if($permintaan->valid_ketuayayasan === 'setuju')
                                                            text-white bg-green-500
                                                        @elseif($permintaan->valid_ketuayayasan === 'tolak')
                                                            text-white bg-red-500
                                                        @else
                                                            text-gray-800 bg-gray-200
                                                        @endif
                                                        rounded-full
                                                    ">
                                                        @if($permintaan->valid_ketuayayasan === 'setuju')
                                                            Disetujui
                                                        @elseif($permintaan->valid_ketuayayasan === 'tolak')
                                                            Ditolak
                                                        @else
                                                            Menunggu
                                                        @endif
                                                    </span>
                                                    </p>              </center>                                        </div>
                                                <div class="note">
                                                    @if($permintaan->valid_ketuayayasan === 'tolak')
                                                    <p>Catatan : <em>Note content here</em></p>
                                                    @endif
                                                    @if($permintaan->tindak_lanjut != null)
                                                    <p>Tindak Lanjut : <em>{{$permintaan->tindak_lanjut}}</em></p>
                                                    @endif

                                                </div>
                                        </div>
                                    </div>
                                     </div>

         @else
                                    
                                     <!-- Validator 2 -->
                                     <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_karyausaha_timestamp ? \Carbon\Carbon::parse($permintaan->valid_karyausaha_timestamp)->diffForHumans() : '' }}
                                            </div>                                                 
                                            <div class="profile-status">
                                            @if($unitkaryauser->userdetail !== null && $unitkaryauser->userdetail->foto !== null && $unitkaryauser->userdetail->foto !== 'default.png')

                                                <img id="profile-img" src="{{ asset('/storage/photos/' . $unitkaryauser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @else
                                                <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @endif                                                 <div class="status-indicator default">
                                                    @switch($permintaan->valid_karyausaha)
                                                    @case('setuju')
                                                    <div class="status-indicator approved">
                                                        <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                    </div>
                                                        @break
                                                    @case('menunggu')
                                                    <div class="status-indicator default">
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </div>
                                                        @break

                                                        @case('tolak')
                                                        <div class="status-indicator rejected">
                                                            <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                        </div>
                                                        @break
                                                    @default
                                                        
                                                @endswitch                                                </div>
                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px;">Pimpinan Unit Karya</p>
                                            <div class="status-note">
                                                <div class="status">
                                                    <p><center>Status: 
                                                        <span class="
                                                        inline-flex items-center px-2 py-1 text-sm font-medium 
                                                        @if($permintaan->valid_karyausaha === 'setuju')
                                                            text-white bg-green-500
                                                        @elseif($permintaan->valid_karyausaha === 'tolak')
                                                            text-white bg-red-500
                                                        @else
                                                            text-gray-800 bg-gray-200
                                                        @endif
                                                        rounded-full
                                                    ">
                                                        @if($permintaan->valid_karyausaha === 'setuju')
                                                            Disetujui
                                                        @elseif($permintaan->valid_karyausaha === 'tolak')
                                                            Ditolak
                                                        @else
                                                            Menunggu
                                                        @endif
                                                    </span>
                                                    </p>              </center>                                        </div>
                                              
                                                    @if($permintaan->valid_karyausaha === 'tolak')
                                                    <div class="note">
                                                    <p>Catatan : <em>Note content here</em></p>
                                                    </div>
                                                    @endif
                                                    @if($permintaan->tindak_lanjut != null)
                                                    <div class="note">
                                                    <p>Tindak Lanjut : <em>{{$permintaan->tindak_lanjut}}</em></p>
                                                    </div>
                                                    @endif

                                                
                                        </div>
                                    </div>
                                     </div>



                                    
            @endif
                          
            
            
            
            
            
            
            
            
            @if($permintaan->perkiraan_harga != null || $permintaan->status_permohonan != 'Pemindahan')

                                    <!-- Validator 3 -->
                                    <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_dirkeuangan_timestamp ? \Carbon\Carbon::parse($permintaan->valid_dirkeuangan_timestamp)->diffForHumans() : '' }}
                                            </div>                                                  
                                            <div class="profile-status">
                                            @if($dirkeuanganuser->userdetail !== null && $dirkeuanganuser->userdetail->foto !== null && $dirkeuanganuser->userdetail->foto !== 'default.png')

                                                <img id="profile-img" src="{{ asset('/storage/photos/' . $dirkeuanganuser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @else
                                                <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @endif                                                 {{-- <img src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Profile Picture" class="profile-pic"> --}}
                                                @switch($permintaan->valid_dirkeuangan)
                                                @case('setuju')
                                                <div class="status-indicator approved">
                                                    <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                </div>
                                                    @break
                                                @case('menunggu')
                                                <div class="status-indicator default">
                                                    <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                </div>
                                                    @break

                                                    @case('tolak')
                                                    <div class="status-indicator rejected">
                                                        <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                    </div>
                                                    @break
                                                @default
                                                    
                                            @endswitch   
                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px;">Direktur Keuangan</p>
                                            <div class="status-note">
                                                <div class="status">
                                                    <p><center>Status: 
                                                        <span class="
                                                        inline-flex items-center px-2 py-1 text-sm font-medium 
                                                        @if($permintaan->valid_dirkeuangan === 'setuju')
                                                            text-white bg-green-500
                                                        @elseif($permintaan->valid_dirkeuangan === 'tolak')
                                                            text-white bg-red-500
                                                        @else
                                                            text-gray-800 bg-gray-200
                                                        @endif
                                                        rounded-full
                                                    ">
                                                        @if($permintaan->valid_dirkeuangan === 'setuju')
                                                            Disetujui
                                                        @elseif($permintaan->valid_dirkeuangan === 'tolak')
                                                            Ditolak
                                                        @else
                                                            Menunggu
                                                        @endif
                                                    </span>
                                                    </p>     </center>                                            </div>
                                                    @if($permintaan->perolehan_harga != null)
                                                    <div class="note">
                                                    <p>Harga Perolehan:<br> Rp. <strong>{{ number_format($permintaan->perolehan_harga, 0, ',', '.') }}</strong></p>
                                                     </div>
                                                    @endif

                                                    @if($permintaan->valid_dirkeuangan === 'tolak')
                                                    <div class="note">
                                                    <p>Catatan : <strong>{{ ucfirst($permintaan->catatan) }}</strong></p>
                                                    </div>
                                                    @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                
                                    <!-- Validator 4 -->
                                    <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_dirmanageraset_timestamp ? \Carbon\Carbon::parse($permintaan->valid_dirmanageraset_timestamp)->diffForHumans() : '' }}
                                            </div>                                            
                                            <div class="profile-status">
                                            @if($dirmanagerasetuser->userdetail !== null && $dirmanagerasetuser->userdetail->foto !== null && $dirmanagerasetuser->userdetail->foto !== 'default.png')

                                                <img id="profile-img" src="{{ asset('/storage/photos/' . $dirmanagerasetuser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @else
                                                <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @endif                                                 {{-- <img src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Profile Picture" class="profile-pic"> --}}
                                                <div class="status-indicator default">
                                                    @switch($permintaan->valid_dirmanageraset)
                                                    @case('setuju')
                                                    <div class="status-indicator approved">
                                                        <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                    </div>
                                                        @break
                                                    @case('menunggu')
                                                    <div class="status-indicator default">
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </div>
                                                        @break

                                                        @case('tolak')
                                                        <div class="status-indicator rejected">
                                                            <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                        </div>
                                                        @break
                                                    @default
                                                        
                                                @endswitch     <!-- Ikon jam sebagai tanda belum ditindak -->
                                                </div>
                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px;">Direktur Manager Aset</p>
                                            <div class="status-note">
                                                <div class="status">
                                                    <p> @if($permintaan->delay_id != 18)
                                                        <center>Status:
                                                        <span class="
                                                        inline-flex items-center px-2 py-1 text-sm font-medium 
                                                        @if($permintaan->valid_dirmanageraset === 'setuju')
                                                            text-white bg-green-500
                                                        @elseif($permintaan->valid_dirmanageraset === 'tolak')
                                                            text-white bg-red-500
                                                        @else
                                                            text-gray-800 bg-gray-200
                                                        @endif
                                                        rounded-full
                                                    ">
                                                        @if($permintaan->valid_dirmanageraset === 'setuju')
                                                            Disetujui
                                                        @elseif($permintaan->valid_dirmanageraset === 'tolak')
                                                            Ditolak
                                                        @else
                                                           Menunggu
                                                        @endif
                                                        </center>
                                                    </span>
                                                    @else
                                                    <center>
                                                        <span class="inline-flex items-center px-2 py-1 text-sm font-medium rounded-full">
                                                         Menunggu Waktu Ditunda
                                                        </span>
                                                    </center>
                                                    @endif
                                                    </p>            
                                               </div>
                                               @if($permintaan->delay_id == 18)
                                               <span style="display: block; width: 100%; padding: 0.5rem; text-align: center; color: white; background-color: #333;">
                                                   Delayed &nbsp;
                                                   <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                               </span>
                                               <span style="display: block; width: 100%; padding: 0.5rem; text-align: center; color: white; background-color: #6a6a6a;" id="countdown" class="countdown">
                                                   <span id="timer"></span>
                                               </span>
                                              
                                              @endif
                                              @if($permintaan->valid_dirmanageraset === 'tolak' || $permintaan->delay_id === 18)
                                              <p>Catatan : <strong>{{ ucfirst($permintaan->catatan) }}</strong></p>
                                              @endif
                                                @if($permintaan->valid_dirmanageraset == 'setuju')
                                                  <center>
                                                    <a href="{{ route('bast.pdf', ['id' => $permintaan->id_permintaan_fa]) }}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded">View BAST</a>
                                                </center>
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!-- Validator 5 -->
                                    <div class="timeline-item">
                                        <div class="timeline-content">
                                            <div class="validation-time">
                                                {{ $permintaan->valid_manageraset_timestamp ? \Carbon\Carbon::parse($permintaan->valid_manageraset_timestamp)->diffForHumans() : '' }}
                                            </div>                                               <div class="profile-status">
                                            @if($managerasetuser->userdetail !== null && $managerasetuser->userdetail->foto !== null && $managerasetuser->userdetail->foto !== 'default.png')

                                                <img id="profile-img" src="{{ asset('/storage/photos/' . $managerasetuser->userdetail->foto) }}" alt="User Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @else
                                                <img id="profile-img" src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Default Image" class="profile-img" style="width: 95px; height: 95px;">
                                            @endif                                                                 {{-- <img src="https://as2.ftcdn.net/v2/jpg/00/64/67/27/1000_F_64672736_U5kpdGs9keUll8CRQ3p3YaEv2M6qkVY5.jpg" alt="Profile Picture" class="profile-pic"> --}}
                                                <div class="status-indicator default">
                                                    @switch($permintaan->valid_manageraset)
                                                    @case('setuju')
                                                    <div class="status-indicator approved">
                                                        <i class="fas fa-check"></i> <!-- Ikon centang -->
                                                    </div>
                                                        @break
                                                    @case('menunggu')
                                                    <div class="status-indicator default">
                                                        <i class="fas fa-clock"></i> <!-- Ikon jam sebagai tanda belum ditindak -->
                                                    </div>
                                                        @break

                                                        @case('tolak')
                                                        <div class="status-indicator rejected">
                                                            <i class="fas fa-times"></i> <!-- Ikon silang -->
                                                        </div>
                                                        @break
                                                    @default
                                                        
                                                @endswitch    <!-- Ikon jam sebagai tanda belum ditindak -->
                                                </div>
                                            </div>
                                            <p class="font-weight-bold" style="font-size: 16px; margin: 0;">Pencatatan Aset</p> <!-- Reduced size -->
                                            <div class="status-note">
                                                    @if($permintaan->valid_manageraset === 'setuju')
                                                    <div class="note">

                                                        <p>Note: <em>Telah Dicatat</em></p>

                                                    </div>

                                                    @else
                                                       
                                                    @endif

                                            </div>
                                          
                                            {{-- <button class="btn-download">Download PDF</button> <!-- Download PDF Button --> --}}
                                        </div>
                                        <br>
                                        @if($permintaan->valid_manageraset === 'setuju')
                                        {{-- {{ route('pengajuan.pdf', ['id' => $permintaan->id_permintaan_fa]) }} --}}
                                        <a href="{{ route('pengajuan.pdf', ['id' => $permintaan->id_permintaan_fa]) }}" target="_blank" class="px-4 py-2 bg-blue-500 text-white rounded">View Pengajuan</a>
                                        @endif
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .tab-background {
                            background-color: #f8f9fa; /* Light gray background for each tab content */
                            border-radius: 8px; /* Optional: round corners */
                            padding: 15px; /* Padding inside the tab content */
                        }
                    
                        /* Other styles remain the same */
                        .validation-time {
                            position: absolute; /* Position the time in the corner */
                            top: 10px; /* Adjust top position */
                            right: 10px; /* Adjust right position */
                            font-size: 12px; /* Font size for the validation time */
                            color: #6c757d; /* Light gray color for better visibility */
                            font-weight: normal; /* Not bold */
                        }
                    
                        .progress-timeline {
                            display: flex;
                            justify-content: space-between;
                            flex-wrap: wrap;
                            margin-top: 20px;
                            padding: 10px;
                            border-radius: 8px;
                        }
                    
                        .btn-download {
                            background-color: #007bff; /* Blue background */
                            color: white; /* White text */
                            border: none; /* No border */
                            border-radius: 4px; /* Rounded corners */
                            padding: 8px 12px; /* Padding for the button */
                            font-size: 14px; /* Font size */
                            cursor: pointer; /* Pointer cursor on hover */
                            margin-top: 10px; /* Space above the button */
                        }
                    
                        .btn-download:hover {
                            background-color: #0056b3; /* Darker blue on hover */
                        }
                        .countdown {
                                display: block;
                                width: 100%;
                                padding: 0.5rem;
                                text-align: center;
                                color: white;
                                background-color: #6a6a6a;
                            }
                                            .timeline-item {
                            text-align: center;
                            flex: 1 1 18%; /* Adjust to allow for 5 items (100% / 5 = 20% minus margin) */
                            min-width: 150px; /* Optional: set a minimum width if needed */
                            position: relative;
                            padding: 15px;
                            background-color: white;
                            border-radius: 8px;
                            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                            margin-bottom: 15px;
                        }
                    
                        .timeline-item:hover {
                            transform: scale(1.02); /* Slightly scale up on hover */
                        }
                    
                        .status-indicator.default {
                            background-color: #ffc107; /* Color for the default state (yellow) */
                            border: 2px solid white; /* White border */
                        }
                    
                        .status-indicator.default i {
                            color: white; /* White color for the icon */
                        }
                    
                        .timeline-item:not(:last-child) {
                            margin-right: 15px;
                        }
                    
                        .profile-status {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin-bottom: 10px;
                        }
                    
                        .profile-pic {
                            width: 60px;
                            height: 60px;
                            border-radius: 50%;
                            object-fit: cover;
                            margin-right: 10px;
                        }
                    
                        .status-indicator {
                            width: 20px; /* Adjust width as needed */
                            height: 20px; /* Adjust height as needed */
                            border-radius: 50%; /* Makes it circular */
                            border: 2px solid white; /* White border */
                            background-color: transparent; /* Transparent background */
                            display: flex; /* Use flexbox for centering */
                            align-items: center; /* Center vertically */
                            justify-content: center; /* Center horizontally */
                            position: relative; /* Ensure positioning for child elements */
                        }
                    
                        .status-indicator i {
                            color: white; /* White color for the icons */
                            font-size: 10px; /* Size of the icons */
                            margin: 0; /* Remove any default margin */
                        }
                    
                        .status-indicator.approved {
                            background-color: #28a745;
                        }
                    
                        .status-indicator.rejected {
                            background-color: #dc3545;
                        }
                    
                        .timeline-content {
                            padding-top: 10px;
                            font-size: 14px;
                        }
                    
                        .status-note {
                            margin-top: 10px;
                            text-align: left;
                        }
                    
                        .status {
                            background-color: #f8f9fa;
                            padding: 5px;
                            border-radius: 5px;
                            margin-bottom: 5px;
                        }
                        .bg-dark-500 {
                            background-color: #333; /* Atau warna lain sesuai kebutuhan */
                        }
                        .note {
                            background-color: #e9ecef;
                            padding: 5px;
                            border-radius: 5px;
                        }
                    
                        @media (max-width: 768px) {
                            .timeline-item {
                                flex: 1 1 45%; /* Show 2 items in a row on smaller screens */
                            }
                        }
                    
                        @media (max-width: 480px) {
                            .timeline-item {
                                flex: 1 1 90%; /* Show 1 item in a row on mobile */
                            }
                        }
                    </style>
                    
                    

                    
                    
        </section>
    </div>
@endsection
@section('scripttambahan')
    <!-- InputMask -->
     <!-- Add Font Awesome CDN for the clock icon -->
     <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

     <script>
        function calculateCountdown(timestamp) {
            const countdownElement = document.getElementById('timer');
            const targetDate = new Date(timestamp);
            // Convert the target date to Indonesian time (WIB)
            const offset = 7 * 60 * 60 * 1000; // WIB is UTC+7
            targetDate.setTime(targetDate.getTime() + offset);

            const updateCountdown = () => {
                const now = new Date();
                now.setTime(now.getTime() + offset); // Apply WIB offset to current time

                const timeDifference = targetDate - now;
                
                if (timeDifference <= 0) {
                    countdownElement.textContent = 'Kedaluwarsa';
                    return;
                }

                const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                countdownElement.textContent = `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
            };

            updateCountdown();
            setInterval(updateCountdown, 1000);
        }

        // Replace '{{$permintaan->delay_timestamp}}' with your timestamp in ISO format
        const timestamp = '{{ $permintaan->delay_timestamp }}'; 
        calculateCountdown(timestamp);
    </script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- bs-custom-file-input -->
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Page specific script -->
  
@endsection
