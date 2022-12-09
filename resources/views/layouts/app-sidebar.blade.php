<div id="sidebar-menu" class="slimscroll-menu">
    <ul class="metismenu" id="menu-bar">
        <li class="menu-title">Navigation</li>

        <li>
            <a href="{{ route('dashboard') }}">
                <i data-feather="home"></i>
                <span class="badge badge-success float-right">1</span>
                <span> Dashboard </span>
            </a>
        </li>
        <li class="menu-title">Checkup</li>
        <li>
            <a href="{{route("patient.browse")}}">
                <i data-feather="calendar"></i>
                <span> New </span>
            </a>
        </li>
        <li>
            <a href="">
                <i data-feather="calendar"></i>
                <span> Search </span>
            </a>
        </li>
    </ul>
</div>
