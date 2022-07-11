@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/product/index.css') }}" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <a class="col-md-1 btn btn-success btn-sm float-right m-2"
                        href="{{ route('admin.chatrooms.create') }}">Thêm</a>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên phòng</th>
                                    <th>Thành viên</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chatrooms as $chatroom)
                                    <tr>
                                        <td>{{ $chatroom->id }}</td>
                                        <td>{{ Str::ucfirst($chatroom->name) }}</td>
                                        <td>
                                            @foreach ($chatroom->users as $index => $user)
                                                {{ $index != count($chatroom->users) - 1 ? $user->name . ' - ' : $user->name }}
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.chatrooms.edit', ['id' => $chatroom->id]) }}"><button
                                                    class="btn btn-info btn-sm">Sửa</button></a>
                                            <button type="button"
                                                data-url="{{ route('admin.chatrooms.destroy', ['id' => $chatroom->id]) }}"
                                                class="btn btn-danger btn-sm btn-delete">Xoá</i></button>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                data-target="#bd-example-modal-lg-{{ $chatroom->id }}">Chi tiết</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="bd-example-modal-lg-{{ $chatroom->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <ul class="list-group">
                                                    <a href="{{ route('messenger.show', ['id' => $chatroom->id]) }}" class="list-group-item list-group-item-action active">
                                                        {{ Str::ucfirst($chatroom->name) }}
                                                    </a>
                                                    <li class="list-group-item list-group-item-action"><b>Bài viết: </b>
                                                        <a href="{{ route('posts.show', ['id' => $chatroom->post->id]) }}">{{ $chatroom->post->title }}</a>
                                                    </li>
                                                    <li class="list-group-item list-group-item-success"><b>Người được tư vấn:
                                                        </b>{{ $chatroom->post->user->name }}</li>
                                                    <li class="list-group-item"><b>Đánh giá:</b>
                                                        @foreach ($chatroom->feedbacks as $feedback)
                                                            @if ($feedback->user_id == $chatroom->post->user->id)
                                                                @for ($i = 0; $i <= $feedback->score; $i++)
                                                                    <i style="color: rgb(255, 238, 0)"
                                                                        class="fas fa-star"></i>
                                                                @endfor
                                                                <p>{{ $feedback->note }}</p>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    <li class="list-group-item list-group-item-info"><b>Chuyên gia tư vấn:
                                                        </b>
                                                        @foreach ($chatroom->users as $user)
                                                            @if ($user->id != $chatroom->post->user->id)
                                                                {{ $user->name }}
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                    <li class="list-group-item"><b>Đánh giá:</b>
                                                        @foreach ($chatroom->feedbacks as $feedback)
                                                            @if ($feedback->user_id != $chatroom->post->user->id)
                                                                @for ($i = 0; $i <= $feedback->score; $i++)
                                                                    <i style="color: rgb(255, 238, 0)"
                                                                        class="fas fa-star"></i>
                                                                @endfor
                                                                <p>{{ $feedback->note }}</p>
                                                            @endif
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Large modal -->
                                @endforeach
                            </tbody>
                        </table>
                        {{ $chatrooms->withQueryString()->links() }}
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script>
        $('#header-search-form').attr('action', '{{ route('admin.chatrooms.index') }}');
        $('#search-input').attr('placeholder', 'Tìm kiếm phòng tư vấn');
    </script>
@endsection
