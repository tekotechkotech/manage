
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
              <img src="../assets/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Home</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link @yield('dashboard')" href="{{ route('dashboard') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">MASTER DATA</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('instansi') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Instansi</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('cabang') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Data Cabang</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('kelas') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-alert-circle"></i>
                  </span>
                  <span class="hide-menu">Data Kelas</span>
                </a>
              </li>
              
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">DATA USER</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('user') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Data Pengguna</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pengurus') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-cards"></i>
                  </span>
                  <span class="hide-menu">Data Pengurus</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pesertadidik') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-file-description"></i>
                  </span>
                  <span class="hide-menu">Data Peserta Didik</span>
                </a>
              </li>
              {{-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">PEMBAYARAN</span>
              </li> --}}
              {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('layanan') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-typography"></i>
                  </span>
                  <span class="hide-menu">Data Layanan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('pembayaran') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-login"></i>
                  </span>
                  <span class="hide-menu">Data Pembayaran</span>
                </a>
              </li> --}}
              {{-- <li class="sidebar-item active">
                <a class="sidebar-link active" href="{{ route('input-pembayaran') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-user-plus"></i>
                  </span>
                  <span class="hide-menu">Input Pembayaran</span>
                </a>
              </li> --}}
              {{-- <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">TEST</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('banksoal') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-mood-happy"></i>
                  </span>
                  <span class="hide-menu">Bank Soal</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('ulangan') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-mood-happy"></i>
                  </span>
                  <span class="hide-menu">Rekap Ulangan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('tryout') }}" aria-expanded="false">
                  <span>
                    <i class="ti ti-aperture"></i>
                  </span>
                  <span class="hide-menu">Rekap Try Out</span>
                </a>
              </li>
            </ul> --}}
            {{-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
              <div class="d-flex">
                <div class="unlimited-access-title me-3">
                  <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                  <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
                </div>
                <div class="unlimited-access-img">
                  <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
                </div>
              </div>
            </div> --}}
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->