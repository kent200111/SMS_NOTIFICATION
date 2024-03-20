<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">
                <i class="fas fa-user"></i>
                {{ Auth::user()->name }}
            </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        {{ __('Dashboard') }}
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="manage_account" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Manage Accounts
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="getevent" class="nav-link" target="_blank">
                    <i class="nav-icon fas fa-bell"></i>
                    <p>
                        Events
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="send_sms" class="nav-link">
                    <i class="nav-icon fas fa-envelope mr-2"></i>
                    <p>
                        Send Notification
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="manage_admin_account" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Admin Accounts
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="chatbot" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>
                    <p>
                        ChatBot Queries
                    </p>
                </a>
            </li>



            <!-- <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        {{ __('Users') }}
                    </p>
                </a>
            </li> -->

            <!-- <li class="nav-item">
                <a href="{{ route('about') }}" class="nav-link">
                    <i class="nav-icon far fa-address-card"></i>
                    <p>
                        {{ __('About us') }}
                    </p>
                </a>
            </li> -->

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->