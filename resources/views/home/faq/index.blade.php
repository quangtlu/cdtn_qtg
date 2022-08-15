@extends('layouts.two-column')
@section('title', 'FAQ')
@section('content')
    @if ($faqs->count())
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            @foreach ($faqs as $index => $faq)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading{{ $faq->id }}">
                        <h4 class="panel-title">
                            <a class="collapsed" role="button" style="text-decoration: none" data-toggle="collapse"
                                data-parent="#accordion" href="#collapse{{ $faq->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $faq->id }}">
                                {{ $index + 1 . ' .' .$faq->question }}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{ $faq->id }}" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="heading{{ $faq->id }}">
                        <div class="panel-body">
                            {!! $faq->answer !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $faqs->withQueryString()->links() }}
    @else
        <div class="alert alert-info" style="margin-top: 10px" role="alert">FAQ đang được cập nhật...</div>
    @endif
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('faq.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm theo câu hỏi, câu trả lời...');
    </script>
@endsection
