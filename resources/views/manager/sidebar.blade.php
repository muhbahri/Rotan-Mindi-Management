@if (Auth::user()->usertype == 'manager')
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand text-decoration-none" href="{{ url('beranda') }}">
            <img src="{{ asset('logo\logo-rotan-mindi.png') }}" alt="Logo" class="sidebar-logo" />
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item active" id="dashboard">
                <a class="sidebar-link text-decoration-none" href="{{ url('beranda') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Beranda</span>
                </a>
            </li>
            <li class="sidebar-item" id="pesanan">
                <a class="sidebar-link text-decoration-none" href="{{ url('view_order') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Pesanan</span>
                </a>
            </li>
            <li class="sidebar-item" id="daftar-barang">
                <a class="sidebar-link text-decoration-none" href="{{ url('view_product') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Daftar Barang</span>
                </a>
            </li>
            <li class="sidebar-item" id="daftar-subkontraktor">
                <a class="sidebar-link text-decoration-none" href="{{ url('view_kontraktor') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Subkontraktor</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
@endif
@if (Auth::user()->usertype == 'inventaris')
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('dashboard') }}">
            <img src="{{ asset('logo\logo-rotan-mindi.png') }}" alt="Logo" class="sidebar-logo" />
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-item active" id="dashboard">
                <a class="sidebar-link" href="{{ url('dashboard') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Beranda</span>
                </a>
            </li>
            <li class="sidebar-item" id="pesanan">
                <a class="sidebar-link" href="{{url('show_order')}}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Pesanan</span>
                </a>
            </li>
            <li class="sidebar-item" id="daftar-barang">
                <a class="sidebar-link" href="{{ url('show_kontraktor') }}" data-target="#content">
                    <i class="align-middle"></i> 
                    <span class="align-middle">Sub Kontraktor</span>
                </a>
            </li>
        </ul>
    </div>
 </nav>        
@endif

