<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo.svg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-dark.png')}}" alt="" height="17">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('assets/images/logo-light.svg')}}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets/images/users/avatar-1.jpg')}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ml-1">User</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <!-- <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle mr-1"></i>
                        Profile</a>
                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle mr-1"></i> My
                        Wallet</a> -->
                    <a class="dropdown-item d-block" href="/change-password"><i class="bx bx-wrench font-size-16 align-middle mr-1"></i> Change Password</a>
                    <!-- <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle mr-1"></i>
                        Lock screen</a> -->
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item text-danger" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i
                            class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a> -->
                    <form action="{{route('logout')}}" method="post">
                      @csrf
                      <a class="dropdown-item text-danger" href="" data-toggle="modal" data-target="#logoutModal"><i
                          class="bx bx-power-off font-size-16 align-middle mr-1"></i>Logout</a>
                    </form>
                    <!-- <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: none">
                        @csrf
                    </form> -->
                </div>
            </div>

        </div>
    </div>
</header>
<!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          Select "Logout" below if you are ready to end your current session.
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>