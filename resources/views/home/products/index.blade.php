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
    </style>
@endsection
@section('content')
    <form action="{{ route('products.index') }}" method="get">
        <div class="row col-md-12">
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
                    <option value="{{ config('consts.category.all') }}" class="filter-option-dafault">Danh mục</option>
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
    @if (isset($products))
        @foreach ($products as $product)
            <div class="wthree-top-1">
                <div class="w3agile-top">
                    <div class="col-md-3 w3agile-left">
                        <ul class="post-info">
                            <li>
                                <a class="post-info__link" href="{{ route('products.show', ['id' => $product->id]) }}">
                                    <i class="fa  fa-user"
                                        aria-hidden="true"></i>{{ $product->author->count() > 1 ? $product->author->first()->name . ',...' : $product->author->first()->name }}
                                </a>
                            </li>
                            <li><a class="post-info__link" href="{{ route('products.show', ['id' => $product->id]) }}"><i
                                        class="fa fa-calendar" aria-hidden="true"></i>{{ $product->created_at }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <div class="col-md-9 w3agile-right">
                                <h3><a
                                        href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="post-content-limit-line">{!! $product->description !!}</div>
                                <a class="agileits w3layouts"
                                    href="{{ route('products.show', ['id' => $product->id]) }}">Xem
                                    thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                        aria-hidden="true"></span></a>
                            </div>
                        </div>
                        <div class="panel-footer"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        @endforeach
        {{ $products->withQueryString()->links() }}
    @endif

@endsection
@section('js')
    <script defer src="{{ asset('template_blog/js/jquery.flexslider.js') }}"></script>
    <script>
        $('#header-search-form').attr('action', '{{ route('products.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tác phẩm, tác giả, chủ sở hữu...');
    </script>
@endsection
