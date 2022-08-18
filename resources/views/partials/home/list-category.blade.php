<div class="w3l_categories">
    <h4 class="side-bar-heading">Chuyên mục bài viết</h4>
    <div class="side-bar-wrap">
        <ul>
            @foreach ($refrenceCategories as $index => $category)
                @if ($index != 0)
                    <li>
                        <a style="font-size: 16px; font-weight:bold">
                            {{ $index }}.{{ $category->name }}
                        </a>
                        @if ($category->categories->count())
                            <ul style="padding-left: 15px">
                                @foreach ($category->categories as $indexChild => $categoryChild)
                                    <li>
                                        <a class="{{ request()->route('id') == $categoryChild->id ? 'active' : ''}}" href="{{ route('posts.getPostByCategory', ['id' => $categoryChild->id]) }}">
                                            <b>{{ $index . '.' . ($indexChild + 1)}}</b>. {{$categoryChild->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div class="side-bar-footer"></div>
</div>
