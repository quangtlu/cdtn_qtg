<div class="w3l_categories">
    <h4 class="side-bar-heading">Tài liệu tham khảo<i class="fa fa-times only-mobile close-list-category"></i></h4>
    <div class="side-bar-wrap">
        <ul>
            @foreach ($references as $index => $reference)
                <li>
                    <a class="limit-line" href="{{ $reference->url }}" style="font-size: 16px; font-weight:bold">
                        {{ $reference->title }}
                    </a>
                    <p class="limit-line">{{ $reference->description }}</p>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="side-bar-footer"></div>
</div>
