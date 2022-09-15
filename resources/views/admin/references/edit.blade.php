@extends('layouts.admin')
@section('title', 'Cập nhật tài liệu tham khảo')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container">
                <div class="col-md-12 col-xs-12">
                    <form action="{{ route('admin.references.update', ['id' => $reference->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="label-required">Tiêu đề</label>
                            <input type="text" value="{{ $reference->title }}" name="title" class="form-control"
                                value="{{ old('title') }}">
                            @error('title')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label-required">Đường dẫn</label>
                            <input type="text" value="{{ $reference->url }}" name="url" class="form-control"
                                value="{{ old('url') }}">
                            @error('url')
                                <span class="mt-1 text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{ old('description') ?? $reference->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
