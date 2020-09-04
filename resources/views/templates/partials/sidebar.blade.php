<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{asset('assets/img/logo-pos.png')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag-->
    <div class="logo">
        <div class="simple-text logo-normal">
            Bag. Dukungan Umum
        </div>
        <div class="simple-text logo-normal">
            (Admin)
        </div>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="{{Request::is('home') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./user.html">
                    <i class="material-icons">mail_outline</i>
                    <p>Manajemen Surat</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./tables.html">
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
            <li class=" {{Request::is('petugas') ? 'active' : ''}}">
                <a class="nav-link" href="{{route('petugas')}}">
                    <i class="material-icons">assignment_ind</i>
                    <p>Manajemen Petugas</p>
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