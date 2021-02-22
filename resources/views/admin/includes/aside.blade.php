<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('/')}}admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
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
            @if(in_array(explode('/',request()->path())[0],[" categories","subcategories","parentcategories"]))
          menu-open @endif ">
            <a href=" #" class="nav-link 
            @if(in_array(explode('/',request()->path())[0],[" categories","subcategories","parentcategories"])) active
          @endif ">
              <i class=" nav-icon fas fa-tachometer-alt"></i>
          <p>
            Category
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{URL::to('/')}}/parentcategories" class="nav-link 
                @if(explode('/',request()->path())[0]==" parentcategories") active @endif ">
                  <i class=" far fa-circle nav-icon"></i>
                <p>Parent Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/categories" class="nav-link 
                @if(explode('/',request()->path())[0]==" categories") active @endif ">
                  <i class=" far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/subcategories" class="nav-link
                 @if(explode('/',request()->path())[0]==" subcategories") active @endif ">
                  <i class=" far fa-circle nav-icon"></i>
                <p>Subcategory</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview  
          @if(in_array(explode('/',request()->path())[0],[" areas","divisions","districts","subdistricts"])) menu-open
          @endif ">
          <a href=" #" class="nav-link 
          @if(in_array(explode('/',request()->path())[0],[" areas","divisions","districts","subdistricts"])) active
          @endif ">
            <i class=" nav-icon fas fa-tachometer-alt"></i>
          <p>
            Area
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{URL::to('/')}}/divisions" class="nav-link 
              @if(explode('/',request()->path())[0]==" divisions") active @endif ">
                <i class=" far fa-circle nav-icon"></i>
                <p>Division</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/districts" class="nav-link 
              @if(explode('/',request()->path())[0]==" districts") active @endif ">
                <i class=" far fa-circle nav-icon"></i>
                <p>District</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/subdistricts" class="nav-link
               @if(explode('/',request()->path())[0]==" subdistricts") active @endif ">
                <i class=" far fa-circle nav-icon"></i>
                <p>Subdistrict</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/areas" class="nav-link
               @if(explode('/',request()->path())[0]==" areas") active @endif ">
                <i class=" far fa-circle nav-icon"></i>
                <p>Area</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview  
        @if(in_array(explode('/',request()->path())[0],[" colors","sizes","tags","brands"])) menu-open @endif ">
        <a href=" #" class="nav-link 
        @if(in_array(explode('/',request()->path())[0],[" colors","sizes","tags","brands"])) active @endif ">
          <i class=" nav-icon fas fa-tachometer-alt"></i>
          <p>
            Product Variant
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{URL::to('/')}}/colors" class="nav-link 
            @if(explode('/',request()->path())[0]==" colors") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                <p>Color</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/sizes" class="nav-link 
            @if(explode('/',request()->path())[0]==" sizes") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                <p>Size</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/brands" class="nav-link
             @if(explode('/',request()->path())[0]==" brands") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                <p>Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/tags" class="nav-link
             @if(explode('/',request()->path())[0]==" tags") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                <p>Tag</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item has-treeview  
      @if(in_array(explode('/',request()->path())[0],[" ads","sliders"])) menu-open @endif ">
      <a href=" #" class="nav-link 
      @if(in_array(explode('/',request()->path())[0],[" ads","sliders"])) active @endif ">
        <i class=" nav-icon fas fa-tachometer-alt"></i>
          <p>
            Theme
            <i class="right fas fa-angle-left"></i>
          </p>
          </a>
          <ul class="nav nav-treeview">
            <li class=" nav-item ">
              <a href="{{URL::to('/')}}/ads" class="nav-link 
          @if(explode('/',request()->path())[0]==" ads") active @endif ">
            <i class=" far fa-circle nav-icon"></i>
                <p>Ad</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{URL::to('/')}}/sliders" class="nav-link 
          @if(explode('/',request()->path())[0]==" sliders") active @endif ">
            <i class=" far fa-circle nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item has-treeview  
        @if(in_array(explode('/',request()->path())[0],["returnpolicies","paymentmethods"])) menu-open @endif ">
        <a href=" #" class="nav-link 
        @if(in_array(explode('/',request()->path())[0],["returnpolicies","paymentmethods"])) active @endif ">
          <i class=" nav-icon fas fa-tachometer-alt"></i>
            <p>
              Payment
              <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
              <li class=" nav-item ">
                <a href="{{URL::to('/')}}/returnpolicies" class="nav-link 
            @if(explode('/',request()->path())[0]=="returnpolicies") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                  <p>Return policy</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('/')}}/paymentmethods" class="nav-link 
            @if(explode('/',request()->path())[0]=="paymentmethods") active @endif ">
              <i class=" far fa-circle nav-icon"></i>
                  <p>Payment Method</p>
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