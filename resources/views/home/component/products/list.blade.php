@if (isset($products))
@foreach ($products as $index => $product)
    <div class="wthree-top-1 {{ $index != 0 ? 'wow fadeInUp' : '' }} ">
        <div class="w3agile-top">
            <div class="col-md-3 w3agile-left">
                <ul class="post-info">
                    <li>
                        <a class="post-info__link" href="{{ route('products.show', ['id' => $product->id]) }}">
                            <i class="fa  fa-user" aria-hidden="true"></i>
                            @if ($product->authors->count())
                                @foreach ($product->authors as $index => $author)
                                    {{ $index != $product->authors->count() - 1 ? $author->name . ' ,' : $author->name }}
                                @endforeach
                            @else
                                Chưa xác định
                            @endif
                        </a>
                    </li>
                    <li><a class="post-info__link" href="{{ route('products.show', ['id' => $product->id]) }}"><i
                                class="fa fa-calendar" aria-hidden="true"></i>{{ $product->created_at }}</a>
                    </li>
                </ul>
            </div>
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-md-9 w3agile-right">
                        <h3><a
                                href="{{ route('products.show', ['id' => $product->id]) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="post-content-limit-line">{!! $product->description !!}</div>
                        <a class="agileits w3layouts"
                            href="{{ route('products.show', ['id' => $product->id]) }}">Xem
                            thêm<span class="glyphicon agileits w3layouts glyphicon-arrow-right"
                                aria-hidden="true"></span></a>
                    </div>
                </div>
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
@endforeach
{{ $products->withQueryString()->links() }}
@endif