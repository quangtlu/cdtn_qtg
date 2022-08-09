@extends('layouts.home')
@section('title', 'Văn bản pháp luật')
@section('css')
<style>
    .img{
        border-radius: 5px;
        width: 60px;
        height: 60px;
    }
    .document-law-description{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
    .panel{
        background-color: var(--primary-color)
    }
    .title-document{
        color: white;
        text-decoration: none !important;
    }
    .title-document:hover{
        color: var(--red-color);
    }
</style>
@endsection
@section('content')
@if ($documentLaws->count())
<div class="row">
            @foreach ($documentLaws as $index => $documentLaw)

            <div class="panel panel-default" style="height: 100px">
                <div class="panel-body">
                    <div class="col-md-3">
                        <img src="{{ asset('image/documentLaws/'.$documentLaw->thumbnail) }}" class="img" alt="">
                    </div>
                    <div class="col-md-7 document-law-description">
                        <a class="title-document" href="{{ asset('document/'.$documentLaw->url) }}" target="_blank"><h4 >{{ $documentLaw->title }}</h4></a>
                        {!! $documentLaw->description !!}
                    </div>
                    
                    
                </div>
              </div>
            @endforeach
        </div>
    {{ $documentLaws->withQueryString()->links() }}
@else
<div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có văn bản pháp luật nào nào</div>
@endif
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('documentLaws.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm theo tên văn bản pháp luật, mô tả...');
    </script>
@endsection