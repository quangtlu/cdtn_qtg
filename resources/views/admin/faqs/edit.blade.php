@extends('layouts.admin')
@section('title', 'Sửa FAQ')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.faqs.update', ['id' => $faq->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-required">Câu hỏi</label>
                                <input class="form-control" name="question" value="{{ $faq->question ?? old('question') }}">
                                @error('question')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required">Câu trả lời</label>
                                <textarea class="form-control" name="answer" id="answer" cols="30" rows="5">{!! $faq->answer !!}</textarea>
                                @error('answer')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#answer'))
        .catch(error => {
            console.error(error);
        });
    </script>
@endsection

