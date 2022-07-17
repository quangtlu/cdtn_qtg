@extends('layouts.admin')
@section('title', 'Quản lý tác phẩm')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between" style="width:100%">
                                <div>
                                    <a class="btn btn-success btn-sm float-right m-2" href="{{ route('admin.products.create') }}">Thêm mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info my-auto float-left" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card" id="toggle" style="display: none">
                                <div class="p-2">
                                    <form action="{{ route('admin.products.index') }}" method="get">
                                        <div class="row col-md-12 mb-2">
                                            <div class="col-md-2">
                                                <select name="author_id" id="sort" class="form-control">
                                                    <option value="{{ config('consts.author.all') }}" class="filter-option-dafault">Tác giả</option>
                                                    <option value="{{ config('consts.author.all') }}" class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($authors as $author)
                                                        <option value="{{ $author->id }}" {{ request()->author_id == $author->id ? 'selected' : false }}>
                                                            {{ $author->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="category_id" id="sort" class="form-control">
                                                    <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">mục lục</option>
                                                    <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Tất cả</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ request()->category_id == $category->id ? 'selected' : false }}>{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="owner_id" id="sort" class="form-control">
                                                    <option value="{{ config('consts.owner.all') }}" class="filter-option-dafault">Chủ sở hữu</option>
                                                    <option value="{{ config('consts.owner.all') }}" class="filter-option-dafault">Tất cả</option>
                                                    <option value="{{ config('consts.owner.none') }}" class="filter-option-dafault">Chưa có chủ sở hữu</option>
                                                    @foreach ($owners as $owner)
                                                        <option value="{{ $owner->id }}" {{ request()->owner_id == $owner->id ? 'selected' : false }}>
                                                            {{ $owner->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="keyword" placeholder="Tìm kiếm tác phẩm" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ảnh</th>
                                    <th>Tên tác phẩm</th>
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
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.products.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tác phẩm, tác giả, chủ sở hữu...');

        $(document).ready( function() {
            $('#search').click(function(){
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection
