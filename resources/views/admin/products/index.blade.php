@extends('layouts.admin')
@section('title', 'Quản lý tác phẩm')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'Tác phẩm', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2"
                        href="{{ route('admin.products.create') }}">Thêm</a>
                    {{-- search --}}
                    <div class="nav-item col-md-10">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline" action="{{ route('admin.products.search') }}" method="GET">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" name="keyword" required type="search"
                                        placeholder="Tìm kiếm theo ID, tên tác phẩm, tác giả, chủ sở hữu..." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
<<<<<<< HEAD
                    {{-- end search --}}
=======
>>>>>>> 0a0af2497473f1d62ba361d522c2c99db52d03b7
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ảnh</th>
                                    <th>Tên tác phẩm</th>
                                    <th>Tác giả</th>
                                    <th>Chủ sở hữu</th>
                                    <th>Danh mục</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if ($product->image)
                                                <img class="avt-product index-avt"
                                                    src=" {{ asset('image/products/' . explode('|', $product->image)[0]) }}"
                                                    alt="">
                                            @else
                                                <img class="avt-product index-avt"
                                                    src="{{ asset('image/products/no_image.jpg') }}" alt="">
                                            @endif
                                        </td>

                                        <td>{{ Str::ucfirst($product->name) }}</td>
                                        <td>
                                            {{ $product->author->count() > 1 ? $product->author->first()->name . ',...' : $product->author->first()->name }}
                                        </td>
                                        <td>{{ $product->owner->name }}</td>
                                        <td>{{ $product->categories->count() > 1 ? $product->categories->first()->name . ',...' : $product->categories->first()->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.products.destroy', ['id' => $product->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xoá</i></button>
                                            <a href="{{ route('admin.products.show', ['id' => $product->id]) }}"><button
                                                    class="btn btn-info btn-sm">Chi tiết</button></a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
