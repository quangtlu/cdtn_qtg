@extends('layouts.admin')
@section('title', 'Sửa thông tin danh mục')
@section('content')
    <div class="content-wrapper">
        @include('partials.admin.content_header', ['name' => 'Danh mục', 'key' => 'Sửa thông tin'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" value="{{ $category->name }}" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Danh mục cha</label>
                                <select id="category_parent" name="parent_id" class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('parent_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Loại danh mục</label>
                                <select id="selectType" name="type" class="form-control">
                                    <option value="{{ $category->type }}">{{ $category->type }}</option>
                                </select>
                                @error('type')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    <script>
        $('#category_parent').on('change', function() {
            var category_id = $(this).val();
            $.ajax({
                type: "get",
                url: '{{ route('admin.categories.getType')}}',
                data: {
                    'category_id': category_id
                },
                dataType: 'html',
                success: function (response) {
                    $('#selectType').html(response);
                }
            });
        })
    </script>
@endsection
