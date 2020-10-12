<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{asset('assets/img/pos.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag-->
    <div class="logo">
        <div class="simple-text logo-normal">
            Arsip Surat
        </div>
        <div class="simple-text logo-normal">
            ({{auth()->user()->level}})
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{Request::is('ArsipSurat') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-columns"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::is('surat','surat-masuk','surat-keluar',
                                        'tambah-surat-masuk','tambah-surat-keluar',
                                        'disposisi','tambah-disposisi','periode-surat-masuk',
                                        'periode-surat-keluar'
                                        ) ? 'active' : ''}}">
                <a class="nav-link" href="{{route('surat')}}">
                    <i class="fas fa-mail-bulk"></i>
                    <p>Manajemen Surat</p>
                </a>
            </li>
            <li class="{{Request::is('instansi','tambah-instansi') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('instansi')}}">
                    <i class="far fa-building"></i>
                    <p>Manajemen Instansi</p>
                </a>
            </li>
            @if (auth()->user()->level=='admin')
            <li
                class=" {{Request::is('pegawai','bagian','jabatan','data-pegawai','tambah-pegawai','tambah-bagian','tambah-jabatan') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pegawai')}}">
                    <i class="fa fa-users"></i>
                    <p>Manajemen Pegawai</p>
                </a>
            </li>
            <li class=" {{Request::is('users','tambah-user') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="fas fa-user-check"></i>
                    <p>Manajemen Users</p>
                </a>
            </li>
            @endif
            <li class="{{Request::is('edit-profil','ganti-password') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('profil.edit')}}">
                    <i class="fas fa-user-cog"></i>
                    <p>Pengaturan Akun</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout')}}">
                    <i class="fas fa-sign-out-alt"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>