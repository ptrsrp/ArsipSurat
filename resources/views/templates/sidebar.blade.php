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
        <li class="nav-item active  ">
            <a class="nav-link" href="./dashboard.html">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./user.html">
                <i class="material-icons">person</i>
                <p>User Profile</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./tables.html">
                <i class="material-icons">content_paste</i>
                <p>Table List</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
                <i class="material-icons">library_books</i>
                <p>Typography</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="./icons.html">
                <i class="material-icons">bubble_chart</i>
                <p>Icons</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('logout')}}">
                <i class="material-icons">exit_to_app</i>
                <p>Sign Out</p>
            </a>
        </li>
    </ul>
</div>