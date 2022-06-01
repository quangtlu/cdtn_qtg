<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home.index')}}" class="brand-link">
        <img src={{asset("AdminLTE/dist/img/AdminLTELogo.png")}}  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Trang chủ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{asset("AdminLTE/dist/img/user2-160x160.jpg")}} class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.index') }}" class="d-block"> {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('list user')
                <li class="nav-item">
                    <a href="{{route('admin.users.index')}}" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Quản lý người dùng
                        </p>
                    </a>
                </li>
                @endcan
                @can('list author')
                <li class="nav-item">
                    <a href="{{route('admin.authors.index')}}" class="nav-link">
                        <i class="fas fa-user-edit"></i>
                    <p>
                        Quản lý tác giả
                    </p>
                    </a>
                </li>
                @endcan
                @can('list product')
                <li class="nav-item">
                    <a href="{{route('admin.products.index')}}" class="nav-link">
                        <i class="fas fa-book"></i>
                        <p>
                            Quản lý tác phẩm
                        </p>
                    </a>
                </li>
                @endcan
                @can('list owner')
                <li class="nav-item">
                    <a href="{{route('admin.owners.index')}}" class="nav-link">
                        <i class="fas fa-user-tie"></i>
                        <p>
                            Quản lý chủ sở hữu
                        </p>
                    </a>
                </li>
                @endcan
                @can('list post')
                <li class="nav-item">
                    <a href="{{route('admin.posts.index')}}" class="nav-link">
                        <i class="fas fa-book"></i>
                        <p>
                            Quản lý bài viết
                        </p>
                    </a>
                </li>
                @endcan
                @can('list role')
                <li class="nav-item">
                    <a href="{{route('admin.roles.index')}}" class="nav-link">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Quản lý vai trò
                        </p>
                    </a>
                </li>
                @endcan
                @can('list permission')
                <li class="nav-item">
                    <a href="{{route('admin.permissions.index')}}" class="nav-link">
                        <i class="fas fa-user-shield"></i>
                        <p>
                            Quản lý quyền truy cập
                        </p>
                    </a>
                </li>
                @endcan
                @can('list conservation')
                <li class="nav-item">
                    <a href="{{route('admin.conversations.index')}}" class="nav-link">
                        <i class="fas fa-comments"></i>
                        <p>
                            Quản lý hội thoại
                        </p>
                    </a>
                </li>
                @endcan
                @can('list faq')
                <li class="nav-item">
                    <a href="{{route('admin.faqs.index')}}" class="nav-link">
                        <i class="fas fa-question-circle"></i>
                        <p>
                            Quản lý FAQ
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
