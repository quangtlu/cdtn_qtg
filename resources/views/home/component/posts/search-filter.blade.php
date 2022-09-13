<div class="col my-auto" id="search" style="margin: 10px 0;">
    <button class="card btn btn-default my-auto" data-toggle="collapse" href="#collapseSearch" aria-expanded="false"
        aria-controls="collapseExample">
        <i class="fa fa-search"></i>
        <span>Tìm kiếm bài viết</span>
    </button>
</div>
<div class="panel panel-primary search-and-filter" id="toggle" style="margin-top: 10px; display:none; padding: 15px">
    <div>
        <div class="sort-product">
            <form action="{{ route('posts.index') }}" method="GET">
                <div class="row">
                    <div style="padding-left: 0" class="col-md-10 col-xs-8">
                        <select name="sort" id="" class="form-control">
                            <option value="sort-new-post">Mới nhất</option>
                            <option value="sort-new-comment">Hoạt động gần đây</option>
                            <option value="sort-old-post">Cũ nhất</option>
                        </select>
                    </div>
                    <div class="col-md-2 col-xs-4">
                        <button type="submit" class="btn btn-primary ">Sắp xếp</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="form-filters">
            <form action="{{ route('posts.index') }}" method="GET">
                <div class="row">
                    <div class="col-md-2 col-xs-12 filter-input">
                        <select name="tag_id" class="form-control">
                            <option value="" class="filter-option-dafault">Tag</option>
                            <option value="" class="filter-option-dafault">Tất cả</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ request()->tag_id == $tag->id ? 'selected' : false }}>
                                    {{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-xs-12 filter-input">
                        <select name="category_id" id="sort" class="form-control">
                            <option value="" class="filter-option-dafault">Mục lục</option>
                            <option value="" class="filter-option-dafault">Tất cả</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request()->category_id == $category->id ? 'selected' : false }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 col-xs-12 filter-input">
                        <select name="status" id="sort" class="form-control">
                            <option value="" class="filter-option-dafault">Trạng thái</option>
                            @foreach (config('consts.post.status') as $status)
                                @if ($status['value'] != config('consts.post.status.request.value') &&
                                    $status['value'] != config('consts.post.status.refuse.value'))
                                    <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 col-xs-12 filter-input">
                        <input type="text" name="keyword" placeholder="Tìm kiếm bài viết" class="form-control">
                    </div>
                    <div class="col-md-3 col-xs-12 filter-input">
                        <button type="submit" class="btn btn-primary" style="width:100%">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
