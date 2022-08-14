@extends('layouts.two-column')
@section('title', 'Văn bản pháp luật')
@section('content')
    @if ($documentLaws->count())
        @foreach ($documentLaws as $index => $documentLaw)
            <div class="row document-wrap">
                <div class="col-md-3 document-left">
                    <div class="document-thumb">
                        @if ($documentLaw->thumbnail)
                            <img class="document-thumb-img" src="{{ asset('image/documentLaws') . '/' . $documentLaw->thumbnail}}">
                        @else
                            <img class="document-thumb-img" src="{{ asset('image/documentLaws/default.png')}}">
                        @endif
                    </div>
                    <a href="{{ asset('document/' . $documentLaw->url) }}">
                        {{ $documentLaw->url }}
                    </a>
                </div>
                <div class="col-md-7">
                    <a class="title-document" href="{{ asset('document/' . $documentLaw->url) }}">
                        <h4 class="limit-line-2">{{ $documentLaw->title }}</h4>
                    </a>
                    <div class="limit-line-2">
                        {!! $documentLaw->description !!}
                    </div>
                </div>
            </div>
            {{-- <embed src="{{asset('document/' . $documentLaw->url)}}" width="100%" height="800px" /> --}}
        @endforeach
        {{ $documentLaws->withQueryString()->links() }}
    @else
        <div class="alert alert-warning alert-no-post" style="margin-top: 10px" role="alert">Không có văn bản pháp luật
            nào</div>
    @endif
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('documentLaws.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm theo tên văn bản pháp luật, mô tả...');
    </script>
@endsection
