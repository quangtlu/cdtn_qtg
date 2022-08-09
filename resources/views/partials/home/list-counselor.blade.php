<div class="row list-counselor-sidebar">
    <h3 class="primary-color" style="padding-bottom: 10px">Chuyên gia tư vấn</h3>
    @foreach ($counselors as $counselor)
        <div class="thumbnail animate__animated animate__fadeIn">
            <img src="{{ asset('image/profile') . '/' . $counselor->image }}" alt="...">
            <div class="caption">
                <h4 class="primary-color text-center">{{ $counselor->name }}</h4>
                <span class="text-center active">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fa fa-star"></i>
                    @endfor
                </span>
                <p style="display: flex; justify-content: space-around;">
                    <a data-toggle="modal" data-target="#myModal-{{ $counselor->id }}" class="agileits w3layouts counselor-button counselor-button-sidebar">Thông tin</a>
                    <a href="" class="agileits w3layouts counselor-button counselor-button-sidebar button-active">Hẹn tư vấn</a>
                </p>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal-{{ $counselor->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">Thông tin chuyên gia tư vấn</h3>
                    </div>
                    <div class="modal-body counselor-info-detail">
                        <ul class="counselor-info-detail__list">
                            <li><b>Họ tên: </b>{{ $counselor->name }}</li>
                            <li><b>Giới tính: </b>{{ $counselor->gender_text }}</li>
                            <li><b>Tuổi: </b>{{ $counselor->age }}</li>
                            <li><b>Chuyên môn: </b>
                                @if ($counselor->categories->count())
                                    @foreach ($counselor->categories as $index => $category)
                                        <a href="{{ route('posts.getPostByCategory', ['id' => $category->id]) }}">
                                            {{ $index + 1 != $counselor->categories->count() ? $category->name . ', ' : $category->name }}
                                        </a>
                                    @endforeach
                                @else
                                    Chưa rõ
                                @endif
                            </li>
                            <li><b>Email: </b>{{ $counselor->email }}</li>
                            <li><b>SDT: </b>{{ $counselor->phone }}</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a class="agileits w3layouts counselor-button" data-dismiss="modal">Đóng</a>
                        <a class="agileits w3layouts counselor-button button-active">Hẹn tư vấn</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
