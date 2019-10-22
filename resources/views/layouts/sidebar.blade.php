<style>
/*   .sidebar1{
    position: fixed;
     width: 100%;
  z-index: 1;
   }
*/ 
  </style>

<span class="sidebar1">
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">

    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../theme/dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../theme/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->firstname}} {{Auth::user()->lastname}} </a>
        </div>
      </div>
     <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
       
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-user" aria-hidden="true"></i>
               <p style="margin: 10px;">
                 User Management 
              </p>
            </a>
          </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="fa fa-cogs" aria-hidden="true"></i>
              <p style="margin: 10px;">
                Configuration Management
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-image"></i>
              <p style="margin: 10px;">
                Banner Management
              </p>
            </a>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-alt" aria-hidden="true"></i> 
              <p style="margin: 10px;">
                Category Management
              </p>
            </a>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <p style="margin: 10px;">
                Product Management
              </p>
            </a>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-tags"></i>
              <p style="margin: 10px;">
                Coupon Management
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</span>