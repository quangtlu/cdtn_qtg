@extends('layouts.admin')
@section('title', 'Sửa thông tin mục lục')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="category_name">Tên mục lục</label>
                                <input type="text" value="{{ old('name') ?? $category->name }}" name="name" class="form-control">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Mục lục cha</label>
                                <select id="category_parent" name="parent_id" class="form-control">
                                    <option value="0">Chọn mục lục cha</option>
                                    @include('common.option-categories', ['categories' => $categoryReferences, 'selectedBy' => $category])
                                </select>
                                @error('parent_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Loại mục lục</label>
                                <select id="selectType" name="type" class="form-control">
                                    @foreach (config('consts.category.type') as $type)
                                        <option {{ $category->type == $type['value'] ? 'selected' : '' }}  value="{{$type['value']}}">{{ $type['name'] }}</option>
                                    @endforeach
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
