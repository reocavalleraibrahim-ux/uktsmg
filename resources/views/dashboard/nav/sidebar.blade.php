 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="../dashboard/index.html" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <h3 style="color:white; font-family:unageo; font-weight:500;">{{session('name')}}</h3>
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item pc-caption">
          <label data-i18n="Navigation">Navigation</label>
        </li>
        <li class="pc-item">
          <a href="{{ url('/dashboard')}}" class="pc-link">
            <span class="pc-micon">
              <i class="ph ph-house-line"></i>
            </span>
            <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
          </a>
        </li>

        @if(session('role') == 'admin')
        <li class="pc-item pc-caption">
          <label data-i18n="UI Components">Admin Sector</label>
          <i class="ph ph-pencil-ruler"></i>
        </li>  

        <li class="pc-item">
          <a href="{{ url('/users') }}" class="pc-link">
            <span class="pc-micon"><i class="ph ph-user"></i></span>
            <span class="pc-mtext">Akun</span>
          </a>
        </li>

        <li class="pc-item">
          <a href="{{ url('/ukt') }}" class="pc-link">
            <span class="pc-micon"><i class="ph ph-calendar"></i></span>
            <span class="pc-mtext">Ujian Kenaikan Tingkat</span>
          </a>
        </li>

        @endif    

        <li class="pc-item pc-caption">
          <label data-i18n="pages">Team</label>
          <i class="ph ph-shield-checkered"></i>
        </li>
        <li class="pc-item">
          <a href="{{url('/jeja')}}" class="pc-link">
            <span class="pc-micon"> <i class="ph ph-user"></i></span>
            <span class="pc-mtext">Data Jeja</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          
          <i class="ph ph-tree-structure"></i>
        </li>
        <li class="pc-item pc-hasmenu">
          <a href="#!" class="pc-link"
            ><span class="pc-micon"> <i class="ph ph-calendar"></i> </span><span class="pc-mtext" data-i18n="Menu levels">Event</span
            ><span class="pc-arrow"><i class="ti ti-chevron-right"></i></span
          ></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{url('/eventUKT')}}" data-i18n="Ujian Kenaikan Tingkat">Ujian Kenaikan Tingkat</a></li>
            
          </ul>
        </li>
        <li class="pc-item">
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" style="border:none; background-color:transparent;cursor: pointer; display: inline-flex;align-items: center; width:100%;" class="pc-link" >
                    <span class="pc-micon">
                        <i class="ph ph-power"></i>
                    </span>
                    <span class="pc-mtext" >Logout</span>
                </button>
            </form>
        </li>
      </ul>      
    </div>
  </div>
</nav>
<!-- [ Sidebar Menu ] end -->