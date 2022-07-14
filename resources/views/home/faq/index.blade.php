@extends('layouts.home')
@section('title', 'FAQ')
@section('css')
    <link rel="stylesheet" href="{{ asset('home/faq/style.css') }}">
@endsection
@section('content')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @for($i = 0; $i < count($faqs); $i++)
        <div class="panel panel-primary {{ $i != 0 ? 'wow fadeInUp' : '' }}">
            <div class="panel-heading" role="tab" id="heading{{$i}}">
                <h4 class="panel-title">
                    <i class="fa fa-question-circle icon-question"></i>
                    <a class="question-link" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        {!! $faqs[$i]->question  !!}
                    </a>
                </h4>
            </div>
            <div id="collapse{{$i}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading{{$i}}">
                <div class="panel-body">
                    {!! $faqs[$i]['answer'] !!}
                </div>
            </div>
        </div>
        @endfor
    </div>
    {{ $faqs->withQueryString()->links() }}
@endsection
@section('js')
    <script>
       $('#header-search-form').attr('action', '{{ route('faq.index') }}');
       $('#search-input').attr('placeholder', 'Tìm kiếm theo câu hỏi, câu trả lời...');
    </script>
@endsection


