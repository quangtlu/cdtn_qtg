@section('css')
    <link rel="stylesheet" href="{{ asset('admin/profile/index.css') }}">
@endsection
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home.index') }}" class="brand-link">
        <img src={{ asset('image/logo.gif') }} alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Trang chủ</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="avt-side">
                <input type="hidden" {{ $image = Auth::user()->image }}>
                <img class="avt-side" src="{{ asset("image/profile/$image") }}">
            </div>
            <div class="info">
                <a href="{{ route('admin.profile.index') }}" class="d-block mt-2"> {{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @can('list-user')
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}"
                            class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                            <i class="fas fa-users"></i>
                            <p>
                                Quản lý người dùng
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-role')
                    <li class="nav-item">
                        <a href="{{ route('admin.roles.index') }}"
                            class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Quản lý vai trò
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-permission')
                    <li class="nav-item">
                        <a href="{{ route('admin.permissions.index') }}"
                            class="nav-link {{ Request::is('admin/permissions*') ? 'active' : '' }}">
                            <i class="fas fa-user-shield"></i>
                            <p>
                                Quản lý quyền truy cập
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-author')
                    <li class="nav-item">
                        <a href="{{ route('admin.authors.index') }}"
                            class="nav-link {{ Request::is('admin/authors*') ? 'active' : '' }} ">
                            <i class="fas fa-user-edit"></i>
                            <p>
                                Quản lý tác giả
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-product')
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}"
                            class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                            <i class="fas fa-book"></i>
                            <p>
                                Quản lý tác phẩm
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-owner')
                    <li class="nav-item">
                        <a href="{{ route('admin.owners.index') }}"
                            class="nav-link {{ Request::is('admin/owners*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie"></i>
                            <p>
                                Quản lý chủ sở hữu
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-post')
                    <li class="nav-item">
                        <a href="{{ route('admin.posts.index') }}"
                            class="nav-link {{ Request::is('admin/posts*') ? 'active' : '' }}">
                            <i class="fas fa-book"></i>
                            <p>
                                Quản lý bài viết
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-faq')
                    <li class="nav-item">
                        <a href="{{ route('admin.faqs.index') }}"
                            class="nav-link {{ Request::is('admin/faqs*') ? 'active' : '' }}">
                            <i class="fas fa-question-circle"></i>
                            <p>
                                Quản lý FAQ
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-tag')
                    <li class="nav-item">
                        <a href="{{ route('admin.tags.index') }}"
                            class="nav-link {{ Request::is('admin/tags*') ? 'active' : '' }}">
                            <i class="fas fa-tags"></i>
                            <p>
                                Quản lý Tags
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-category')
                    <li class="nav-item">
                        <a href="{{ route('admin.categories.index') }}"
                            class="nav-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                            <i class="fas fa-list-alt"></i>
                            <p>
                                Quản lý mục lục
                            </p>
                        </a>
                    </li>
                @endcan
                @can('list-chatroom')
                    <li class="nav-item">
                        <a href="{{ route('admin.chatrooms.index') }}"
                            class="nav-link {{ Request::is('admin/chatrooms*') ? 'active' : '' }}">
                            <i class="fas fa-comments"></i>
                            <p>
                                Quản lý phòng tư vấn
                            </p>
                        </a>
                    </li>                    
                @endcan
                @can('list-documentLaw')
                    <li class="nav-item">
                        <a href="{{ route('admin.documentLaws.index') }}"
                            class="nav-link {{ Request::is('admin/documentLaws*') ? 'active' : '' }}">
                            <i class="fas fa-book"></i>
                            <p>
                                Quản lý văn bản pháp luật
                            </p>
                        </a>
                    </li>                    
                 @endcan
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Đăng xuất</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="url_redirect_name" value="admin.dashboard">
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
