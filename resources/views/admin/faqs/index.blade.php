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
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary m-2">Thêm mới</a>
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
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.faqs.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm danh muc, ID...');
    </script>
@endsection