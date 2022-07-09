@extends('layouts.admin')
@section('title', 'Sửa FAQ')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('admin.faqs.update', ['id' => $faq->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Câu hỏi</label>
                                <textarea class="form-control" name="question" id="summernote1" cols="30" rows="5">{!! $faq->question !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Câu trả lời</label>
                                <textarea class="form-control" name="answer" id="summernote2" cols="30" rows="5">{!! $faq->answer !!}</textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote1').summernote({
            height: 200
        });
        $('#summernote2').summernote({
            height: 400
        });
    </script>
@endsection
