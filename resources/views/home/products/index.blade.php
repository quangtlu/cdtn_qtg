@extends('layouts.home')
@section('title', 'Tác phẩm')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/user/create.css') }}">
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
    <style>
        .seach {
            width: 21%;
            padding: 0;
            display: inline-block;
        }

        .btn-seach {
            margin-top: -31px;
        }

        .filter-option-dafault {
            font-weight: bold;
        }

        .sort-product {
            margin: 0 0 13px 16px;

        }
    </style>
@endsection
@section('content')
    <div class="col my-auto" id="search" style="margin-top: 2px;">
        <a class="card btn btn-default my-auto" data-toggle="collapse" href="#collapseSearch" aria-expanded="false"
            aria-controls="collapseExample">
            <i class="fa fa-search"></i>
            <span>Tìm kiếm tác phẩm</span>
        </a>
    </div>
    <div class="panel panel-primary" id="toggle" style="margin-top: 10px; padding: 15px; display:none">
        <div class="sort-product">
            <form action="{{ route('products.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-10" style="width:78.333333%">
                        <select name="sort" id="" class="form-control">
                            <option value="sort-public-date">Xuất bản gần đây</option>
                            <option value="sort-regis-date">Đăng ký bản quyền gần đây</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary ">Sắp xếp</button>
                    </div>
                </div>
            </form>
        </div>
        <form action="{{ route('products.index') }}" method="get" style="margin-bottom: 70px !important">
            <div class="row col-md-12">
                <div class="col-md-2">
                    <select name="author_id" class="form-control">
                        <option value="{{ config('consts.author.all') }}" class="filter-option-dafault">Tác giả</option>
                        <option value="{{ config('consts.author.all') }}" class="filter-option-dafault">Tất cả</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}"
                                {{ request()->author_id == $author->id ? 'selected' : false }}>
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="category_id" class="form-control">
                        <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Danh mục
                        </option>
                        <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Tất cả</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->category_id == $category->id ? 'selected' : false }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="owner_id" class="form-control">
                        <option value="{{ config('consts.owner.all') }}" class="filter-option-dafault">Chủ sở hữu
                        </option>
                        <option value="{{ config('consts.owner.all') }}" class="filter-option-dafault">Tất cả</option>
                        <option value="{{ config('consts.owner.none') }}" class="filter-option-dafault">Chưa có chủ sở
                            hữu</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}"
                                {{ request()->owner_id == $owner->id ? 'selected' : false }}>
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
    @include('home.component.products.list', ['products' => $products])
@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script>
        $('#header-search-form').attr('action', '{{ route('products.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tác phẩm, tác giả, chủ sở hữu...');
    </script>
    <script>
        src = "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" >
    </script>
    <script>
        $(document).ready(function() {
            $('#search').click(function() {
                $('#toggle').fadeToggle();
            });
        });
    </script>
@endsection
