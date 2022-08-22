@extends('layouts.one-column')
@section('title', 'Bài viết của tôi')
@section('css')
    <link href="{{ asset('AdminLTE/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="{{ asset('home/post/style.css') }}">
@endsection
@section('content')
    @include('home.component.posts.list-post', ['posts' => $posts])
@endsection
@section('js')
    <script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        // ckeditor
        window.editors = {};
        document.querySelectorAll(".editor").forEach((node, index) => {
            ClassicEditor.create(node, {}).then((newEditor) => {
                window.editors[index] = newEditor;
            });
        });

        // select2
        $(".select2_init").select2();
    </script>
@endsection
