<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#">Scrap Online</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="{{Request::segment(1) == '' ? 'active' : '' }}">
              <a class="nav-link" href="{{url('/')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
              </li>
              <li class="menu-header">Data Option</li>
              <li class="nav-item dropdown {{Request::segment(1) == 'workcenter' || Request::segment(1) == 'plant' || Request::segment(1) == 'deptiot'  || Request::segment(1) == 'deptsrs' || Request::segment(1) == 'jenishasiliot' || Request::segment(1) == 'jenishasilsrs'  || Request::segment(1) == 'tujuaniot' || Request::segment(1) == 'tujuansrs' ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Data Option</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ Request::segment(1) == 'workcenter' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('workcenter.index') }}"><i class="fas fa-building"></i> Workcenter</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'plant' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('plant.index')}}"><i class="fas fa-warehouse"></i> Plant</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'deptiot' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('deptiot.index')}}"><i class="far fa-building"></i> Dept </a>
                  </li>
                
                  <li class="{{ Request::segment(1) == 'jenishasiliot' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('jenishasiliot.index')}}"><i class="fas fa-boxes"></i> Jenis Hasil </a>
                  </li>
                  
                  <li class="{{ Request::segment(1) == 'tujuaniot' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('tujuaniot.index')}}"><i class="fas fa-map-marker-alt"></i> Tujuan </a>
                  </li>
                  
                </ul>
              </li>
              <li class="menu-header">Iot</li>
              <li class="nav-item dropdown {{Request::segment(1) == 'iotmasuk' || Request::segment(1) == 'iotkeluar' || Request::segment(1) == 'iotselesai' ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>IOT</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ Request::segment(1) == 'iotmasuk' ? 'active' : '' }} ">
                    <a class="nav-link " href="{{route('iotmasuk.index') }}"><i class="fas fa-sign-in-alt"></i> Iot Masuk</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'iotselesai' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('iotselesai.index') }}"><i class="fas fa-check"></i> Iot Selesai</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'iotkeluar' ? 'active' : '' }}">
                    <a class="nav-link " href="{{route('iotkeluar.index') }}"><i class="fas fa-sign-out-alt"></i> Iot Keluar</a>
                  </li>
                </ul>
              </li>
              <li class="menu-header">Srs</li>
              <li class="nav-item dropdown {{Request::segment(1) == 'srsmasuk' || Request::segment(1) == 'srskeluar' || Request::segment(1) == 'srsselesai' ? 'active' : ''}}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>SRS</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ Request::segment(1) == 'srsmasuk' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{ route('srsmasuk.index') }}"><i class="fas fa-sign-in-alt"></i> Srs Masuk</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'srsselesai' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('srsselesai.index')}}"><i class="fas fa-check"></i> Srs Selesai</a>
                  </li>
                  <li class="{{ Request::segment(1) == 'srskeluar' ? 'active' : '' }} ">
                    <a class="nav-link" href="{{route('srskeluar.index')}}"><i class="fas fa-sign-out-alt"></i> Srs Keluar</a>
                  </li>
                </ul>
              </li>
              <li class="menu-header">Transaksi</li>
              <li class="{{Request::segment(1) == 'transaksi' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fas fa-cart-plus"></i> <span>Transaksi</span></a>
              </li>
            </ul>

            
        </aside>
      </div>