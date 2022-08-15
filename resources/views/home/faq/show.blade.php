@extends('layouts.two-column')
@section('title', $faq->question)
@section('content')
    <div class="post-container">
        <div class="post-wrap">
            <div class="post-content ">
                <span class="post-content-title">{{ $faq->question }}</span>
                <div class="post-content-body limit-line">
                    {!! $faq->answer !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('faq.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm theo câu hỏi, câu trả lời...');
    </script>
@endsection
