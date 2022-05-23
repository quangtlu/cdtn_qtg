@extends('layouts.admin')
@section('title', 'Quản lý tác phẩm')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.content_header', ['name' => 'Tác phẩm', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tác phẩm</th>
                                <th>Ngày xuất bản</th>
                                <th>Ngày đăng kí tác phẩm</th>
                                <th>Chủ sở hữu tác phẩm</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->pub_date }}</td>
                                        <td>{{ $product->regis_date }}</td>
                                        <td>{{ $product->owner_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.products.edit', ["id" => $product->id]) }}"><button class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button" data-url="{{ route('admin.products.destroy', ["id" => $product->id]) }}" class="btn btn-danger btn-sm btn-delete">Xóa</button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                    <div class="col-md-12">
                        <a href="{{ route('admin.products.create') }}"><button class="btn btn-success float-right m-2">Thêm mới</button></a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
