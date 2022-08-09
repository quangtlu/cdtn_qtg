@extends('layouts.two-column')
@section('title', 'Văn bản pháp luật')
@section('css')
    <style>
        .document-law-list{
            list-style: none;
            padding: 5px;
        }
        .document-law-item{
            display: flex;
            align-items: center;
            min-height: 120px;
            padding: 10px;
        }
        .document-law{
            border: 1px solid #337ab7;
            border-radius: 10px;
        }
        .document-law-title{
            color: #212121;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')
@if ($documentLaws->count())
    <div>
        <ul class="document-law-list">
            @foreach ($documentLaws as $index => $documentLaw)
                <li
                    class="document-law panel">
                    <a
                        href="{{ asset('document/'.$documentLaw->url) }}" target="_blank" style="text-decoration-line: none">
                        <div class="document-law-item">
                            <img src="{{ asset('image/documentLaws/'.$documentLaw->thumbnail) }}"
                                alt="" class="notice-item__avatar" style="width: 70px; height:70px">
                            <div
                                class="notice-item-content-wrap post-content-limit-line" style="padding-left: 20px">
                                <h3 class="document-law-title">
                                    {{ $documentLaw->title }}
                                </h3>
                                <div class="notice-item-content__time" style="margin-top: 5px">
                                    {!! $documentLaw->description !!}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
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
