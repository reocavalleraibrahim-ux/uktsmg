@include('dashboard.nav.header')

@include('dashboard.nav.sidebar')

@include('dashboard.nav.topbar')



    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <h3 class="mb-0">@yield('title') </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ Main Content ] end -->
        
        @yield('content')

      </div>
    </div>
    <!-- [ Main Content ] end -->
    
@include('dashboard.nav.footer')