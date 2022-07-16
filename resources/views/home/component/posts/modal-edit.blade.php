<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="post-modalLabel">Sửa bài viết</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('posts.update', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" name="title" class="form-control" id="title"
                            value="{{ old('title') ?? $post->title}}">
                        @error('title')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Thẻ tag</label>
                        <select name="tag_id[]" class="form-control select2_init" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    @if (old('tag_id'))
                                        {{ collect(old('tag_id'))->contains($tag->id) ? 'selected' : '' }}>
                                    @else
                                        {{ $post->tags->contains($tag->id) ? 'selected' : '' }}>
                                    @endif
                                        {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('tag_id')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Danh mục</label>
                        <select name="category_id[]" class="form-control select2_init" multiple>
                            @foreach ($categories as $category)
                                @if ($category->name == config('consts.category_reference.name'))
                                    @role('super-admin|editor')
                                        <option value="{{ $category->id }}"
                                            @if (old('category_id'))
                                                {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                            @else
                                                {{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                                            @endif
                                            {{ $category->name }}
                                        </option>
                                    @endrole
                                @else
                                    <option value="{{ $category->id }}"
                                        @if (old('category_id'))
                                            {{ collect(old('category_id'))->contains($category->id) ? 'selected' : '' }}>
                                        @else
                                            {{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                                        @endif
                                        {{ $category->name }}
                                    </option>>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="summernote" value="{{ old('content') ?? $post->content }}" name="content" cols="30" rows="5">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" multiple class="form-control-file" name="image[]" id="image">
                    </div>
                    <button type="submit" id="submit-btn" class="btn-modal-post btn btn-success mb-2">Cập nhật</button>
                    <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

