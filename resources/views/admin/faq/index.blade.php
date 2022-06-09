@extends('layouts.admin')
@section('title', 'Quản lý FAQ')
@section('css')
    <link rel="stylesheet" href="{{ asset('admin/faq/drop-menu.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('partials.admin.content_header', ['name' => 'FAQ', 'key' => 'Danh sách'])
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-success btn-sm m-2 col-md-1">Thêm</a>
                {{-- search --}}
                <div class="nav-item col-md-10">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline" action="{{ route('admin.faqs.search') }}" method="GET">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" name="keyword" required type="search"
                                    placeholder="Tìm kiếm câu trả lời, câu hỏi..." aria-label="Search">
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
                {{-- end search --}}
                <div class="col-12" id="accordion">
                @for($i = 0; $i < count($faqs); $i++)
                    <div class="card card-primary card-outline faq-card-wrap">
                        <i class="fas fa-ellipsis-v dropdown-toggle menu-icon text-secondary" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        ></i>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-info" href="{{ route('admin.faqs.edit', ['id' => $faqs[$i]->id]) }}">Sửa <i class="far fa-edit ml-1"></i></a>
                            <a class="dropdown-item text-danger btn-delete" data-url=" {{ route('admin.faqs.destroy', ['id' => $faqs[$i]->id]) }}">Xóa<i class="far fa-trash-alt ml-1"></i></a>
                        </div>
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse{{$i}}">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    {!! $faqs[$i]->question  !!}
                                </h4>
                            </div>
                        </a>
                        <div id="collapse{{$i}}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {!! $faqs[$i]['answer'] !!}
                            </div>
                        </div>
                    </div>
                @endfor
                </div>
            </div>
            {{ $faqs->withQueryString()->links() }}
        </section>
        <!-- /.content -->
    </div>
@endsection
