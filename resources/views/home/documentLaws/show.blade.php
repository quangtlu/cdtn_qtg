@extends('layouts.two-column')
@section('title', $documentLaw->title)
@section('content')
    <div class="post-container">
        <div class="post-wrap">
            <div class="post-content ">
                <span class="post-content-title">{{ $documentLaw->title }}</span>
                <div class="post-content-body limit-line">
                    {!! $documentLaw->description !!}
                </div>
            </div>
            <iframe src="{{ asset('document/'.$documentLaw->url) }}" width="100%" height="800px">
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('documentLaws.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm văn pháp luật');
    </script>
@endsection
