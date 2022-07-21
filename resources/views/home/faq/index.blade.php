@extends('layouts.home')
@section('title', 'FAQ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/faq/style.css') }}">
@endsection
@section('content')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach ($faqs as $faq)
            <div class="panel panel-primary">
                <div class="panel-heading" role="tab" id="heading{{ $faq->id }}">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $faq->id }}"
                            aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                            {!! $faq->question !!}
                        </a>
                    </h4>
                </div>
                <div id="collapse{{ $faq->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $faq->id }}">
                    <div class="panel-body">
                        {!! $faq->answer !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $faqs->withQueryString()->links() }}

@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('faq.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm theo câu hỏi, câu trả lời...');
    </script>
@endsection
