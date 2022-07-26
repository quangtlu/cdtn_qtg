@extends('layouts.admin')
@section('title', 'Thêm mới mục lục')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('admin.categories.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="label-required" for="category_name">Tên mục lục</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">mục lục cha</label>
                                <select id="category_parent" name="parent_id" class="form-control" >
                                    <option value="0">Chọn mục lục cha</option>
                                    @foreach ($categories as $index => $category)
                                        @if ($category->parent_id == 0)
                                                <option value="{{ $category->id }}">{{$index.'. '.$category->name }}</option>
                                                @if ($category->categories->count())
                                                    @foreach ($category->categories as $indexChild => $categoryChild)
                                                        <option value="{{ $categoryChild->id }}">{{$index . '.' . ($indexChild+1) . '. '.$categoryChild->name }}</option>
                                                    @endforeach
                                                @endif
                                        @endif
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <span class="mt-1 text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label-required" for="category_name">Loại mục lục</label>
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
