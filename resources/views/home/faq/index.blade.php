@extends('layouts.home')
@section('title', 'FAQ')
@section('content')
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @for($i = 0; $i < count($faqs); $i++)
        <div class="panel panel-primary">
            <div class="panel-heading" role="tab" id="heading{{$i}}">
                <h4 class="panel-title">
                    <a class="question-link" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}" aria-expanded="true" aria-controls="collapse{{$i}}">
                        C{!! $faqs[$i]->question  !!}
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
    {{ $faqs->links() }}
@endsection


