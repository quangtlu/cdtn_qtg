@extends('layouts.admin')
@section('title', 'Thêm mới danh mục')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Danh mục cha</label>
                                <select id="category_parent" name="parent_id" class="form-control" >
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlOption !!}
                                </select>
                                @error('parent_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_name">Loại danh mục</label>
                                <select id="selectType" name="type" class="form-control" >
                                    @foreach (config('consts.category.type') as $type)
                                        <option value="{{ $type['value'] }}">{{ $type['name'] }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
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
