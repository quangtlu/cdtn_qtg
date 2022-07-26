@extends('layouts.admin')
@section('title', 'Thêm mới FAQ')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.faqs.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="category_name">Câu hỏi</label>
                                <textarea class="form-control" id="question" name="question" cols="30" rows="5">{{ old('question') }}</textarea>
                                @error('question')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Câu trả lời</label>
                                <textarea class="form-control" id="answer" name="answer" cols="30" rows="5">{{ old('answer') }}</textarea>
                                @error('answer')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
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
            .create(document.querySelector('#question'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
        .create(document.querySelector('#answer'))
        .catch(error => {
            console.error(error);
        });
    </script>
@endsection
