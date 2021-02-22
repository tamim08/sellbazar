<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Seller Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/')}}admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <!-- menu-open -->
          <li class="nav-item has-treeview
            @if(in_array(explode('/',request()->path())[0],["products"]))
              menu-open
            @endif
          ">
            <a href="#" class="nav-link
            @if(in_array(explode('/',request()->path())[0],["products"]))
              active
            @endif
            ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class=" nav-item ">
                <a href="{{URL::to('/')}}/products" class="nav-link
                @if(explode('/',request()->path())[0]=="products")
                    active
                @endif
                ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My Products</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview
          @if(in_array(explode('/',request()->path())[0],["profile"]))
            menu-open
          @endif
        ">
          <a href="#" class="nav-link
          @if(in_array(explode('/',request()->path())[0],["profile"]))
            active
          @endif
          ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Profile
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class=" nav-item ">
              <a href="{{route('update_profile')}}" class="nav-link
              @if(explode('/',request()->path())[0]=="profile")
                  active
              @endif
              ">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile Update</p>
              </a>
            </li>

            <li class=" nav-item ">
              <a href="{{route('update_info')}}" class="nav-link
              @if(explode('/',request()->path())[0]=="profile")
                  active
              @endif
              ">
                <i class="far fa-circle nav-icon"></i>
                <p>Update info</p>
              </a>
            </li>

          </ul>
        </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
