<div class="modal fade" id="edit-modal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="post-modalLabel">
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
                        <select name="tag_id[]" class="form-control select-tag-edit" multiple>
                            @foreach ($tags as $tag)
                                <option {{ $post->tags->contains($tag) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Mục lục</label>
                        <select name="category_id[]" class="form-control select-category-edit" multiple>
                            @foreach ($categories as $category)
                                @if ($category->type == config('consts.category.type.post_reference.value'))
                                    @role('admin|editor')
                                        <option {{ $post->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endrole
                                @else
                                    <option {{ $post->categories->contains($category) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="mt-1 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="summernote-edit" value="{{ old('content') ?? $post->content }}" name="content" cols="30" rows="5">{{ $post->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" multiple class="form-control-file" name="image[]" id="image">
                    </div>
                    <button type="submit" id="submit-btn-edit" class="btn-modal-post btn btn-success mb-2">Cập nhật</button>
                    <button type="button" class="btn-modal-post btn btn-danger" data-dismiss="modal">Hủy</button>
                </form>
            </div>
        </div>
    </div>
</div>

