<div class="list-counselor-sidebar">
    <h4 class="side-bar-heading" style="padding-bottom: 10px">Chuyên gia tư vấn</h4>
    <div class="side-bar-wrap">
        @foreach ($counselors as $counselor)
            <div class="thumbnail counselor-item animate__animated animate__fadeIn">
                <img src="{{ asset('image/profile') . '/' . $counselor->image }}" alt="...">
                <div class="caption">
                    <h4 class="primary-color text-center">{{ $counselor->name }}</h4>
                    <div class="btn-group">
                        <a data-toggle="modal" data-target="#myModal-{{ $counselor->id }}" class="btn button-primary button-sm">Thông tin</a>
                        <a href="" class="btn button-active button-sm">Hẹn tư vấn</a>
                    </div>
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
</div>
