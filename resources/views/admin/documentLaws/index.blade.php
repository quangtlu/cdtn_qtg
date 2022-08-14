@extends('layouts.admin')
@section('title', 'Quản lý văn bản pháp luật')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
    <style>
        .document-thumb-img {
            height: 32px;
            width: 32px;
        }
    </style>
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card w-100 mt-2">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div>
                                    <a class="btn btn-success btn-sm" href="{{ route('admin.documentLaws.create') }}">Thêm
                                        mới</a>
                                </div>
                                <div id="search">
                                    <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseSearch"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Tìm kiếm <i class="fas fa-search pl-4 pr-4"></i>
                                    </a>
                                </div>
                            </div>
                            <div id="toggle" class="pt-3" style="display: none">
                                <form action="{{ route('admin.documentLaws.index') }}" method="get">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <select name="name" id="sort" class="form-control">
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tên văn bản pháp luật</option>
                                                <option value="{{ config('consts.user.all') }}"
                                                    class="filter-option-dafault">Tất cả</option>
                                                @foreach ($documentLaws as $documentLaw)
                                                    <option value="{{ $documentLaw->title }}"
                                                        {{ request()->title == $documentLaw->title ? 'selected' : false }}>
                                                        {{ $documentLaw->title }}</option>
                                                @endforeach
                                                @foreach ($documentLawAll as $documentLaw)
                                                    <option value="{{ $documentLaw->title }}">{{ $documentLaw->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="keyword"
                                                placeholder="Tìm kiếm tên văn bản pháp luật" class="form-control"
                                                value="{{ request()->keyword }}">
                                        </div>
                                        <div class="col-md-1">
                                            <button type="submit" class="btn btn-info btn-block"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 card">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thumbnail</th>
                                    <th>Tên văn bản</th>
                                    <th>Tệp đính kèm</th>
                                    <th>Mô tả</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documentLaws as $documentLaw)
                                    <tr>
                                        <td>{{ $documentLaw->id }}</td>
                                        <td>
                                            @if ($documentLaw->thumbnail)
                                                <img class="document-thumb-img"
                                                    src="{{ asset('image/documentLaws') . '/' . $documentLaw->thumbnail }}">
                                            @else
                                                <img class="document-thumb-img"
                                                    src="{{ asset('image/documentLaws/default.png') }}">
                                            @endif
                                        </td>
                                        <td class="limit-line-2">{{ $documentLaw->title }}</td>
                                        <td><a href="{{ asset('document/' . $documentLaw->url) }}"
                                                target="_blank">{{ $documentLaw->url }}</a></td>
                                        <td class="limit-line-2">{!! $documentLaw->description !!}</td>
                                        <td>
                                            <a href="{{ route('admin.documentLaws.edit', ['id' => $documentLaw->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.documentLaws.destroy', ['id' => $documentLaw->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $documentLaws->withQueryString()->links() }}
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
        $('#header-search-form').attr('action', '{{ route('admin.documentLaws.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm tên văn bản pháp luật');

        $(document).ready(function() {
            $('#search').click(function() {
                $('#toggle').slideToggle();
            });
        });
    </script>
@endsection
