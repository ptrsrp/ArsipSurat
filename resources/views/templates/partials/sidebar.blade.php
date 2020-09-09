<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{asset('assets/img/pos.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag-->
    <div class="logo">
        <div class="simple-text logo-normal">
            Bag. Dukungan Umum
        </div>
        <div class="simple-text logo-normal">
            ({{auth()->user()->level}})
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="{{Request::is('dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{Request::is('surat') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('surat')}}">
                    <i class="material-icons">mail_outline</i>
                    <p>Manajemen Surat</p>
                </a>
            </li>
            @if (auth()->user()->level=='admin')
            <li class="{{Request::is('instansi') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('instansi')}}">
                    <i class="material-icons">business</i>
                    <p>Manajemen Instansi</p>
                </a>
            </li>
            <li class=" {{Request::is('pegawai') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('pegawai')}}">
                    <i class="fa fa-users"></i>
                    <p>Manajemen Pegawai</p>
                </a>
            </li>
            <li class=" {{Request::is('users') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('users')}}">
                    <i class="material-icons">assignment_ind</i>
                    <p>Manajemen Users</p>
                </a>
            </li>
            @endif
            <li class="{{Request::is('setting') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('setting')}}">
                    <i class="material-icons">settings</i>
                    <p>Pengaturan Akun</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('logout')}}">
                    <i class="material-icons">exit_to_app</i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>