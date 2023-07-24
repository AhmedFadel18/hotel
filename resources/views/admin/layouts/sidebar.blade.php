<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <span class="brand-text font-weight-light">AdminL Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview @if (request()->is('admin/room-types*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/room-types*')) active @endif">
              <i class="nav-icon fas fa fa-city"></i>
              <p>
                Room Types
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.room_types.index') }}" class="nav-link @if (request()->is('admin/room-types')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Room Types</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('admin.room_types.create') }}" class="nav-link @if (request()->is('admin/room-types/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Room Type</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/rooms*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/rooms*')) active @endif">
              <i class="nav-icon fas fa fa-building"></i>
              <p>
                Rooms
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.rooms.index') }}" class="nav-link @if (request()->is('admin/rooms')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Rooms</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.rooms.create') }}" class="nav-link @if (request()->is('admin/rooms/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Room</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/departments*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/departments*')) active @endif">
              <i class="nav-icon fas fa fa-hotel"></i>
              <p>
                Departments
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.departments.index') }}" class="nav-link @if (request()->is('admin/departments')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Departments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.departments.create') }}" class="nav-link @if (request()->is('admin/departments/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Department</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/staff*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/staff*')) active @endif">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Staff
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.staff.index') }}" class="nav-link @if (request()->is('admin/staff')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.staff.create') }}" class="nav-link @if (request()->is('admin/staff/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Staff</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/customers*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/customers*')) active @endif">
              <i class="nav-icon fas fa fa-users"></i>
              <p>
                Customers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.customers.index') }}" class="nav-link @if (request()->is('admin/customers')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.customers.create') }}" class="nav-link @if (request()->is('admin/customers/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Customer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/booking*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/booking*')) active @endif">
              <i class="nav-icon fas fa fa-credit-card"></i>
              <p>
                Booking
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.booking.index') }}" class="nav-link @if (request()->is('admin/booking')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Bookings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.booking.create') }}" class="nav-link @if (request()->is('admin/booking/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Booking</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (request()->is('admin/services*')) menu-open @endif">
            <a href="#" class="nav-link @if (request()->is('admin/services*')) active @endif">
              <i class="nav-icon fas fa fa-sitemap"></i>
              <p>
                Services
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.services.index') }}" class="nav-link @if (request()->is('admin/services')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Services</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.services.create') }}" class="nav-link @if (request()->is('admin/services/create')) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Service</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.testimonials') }}" class="nav-link @if (request()->is('admin/testimonials')) active @endif">
              <i class="fa fa-comment"></i>
              <p>Testimonials</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link @if (request()->is('admin/logout')) active @endif">
              <i class="far fa-circle nav-icon"></i>
              <p>Log Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
