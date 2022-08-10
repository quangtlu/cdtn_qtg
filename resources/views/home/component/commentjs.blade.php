<script>
    function alertMessage(message, type, time)
        {
            Swal.fire({
                toast: true,
                icon: type == 'success' ? 'success' : 'error',
                title: message,
                position: 'top',
                timer: 2000,
                showConfirmButton: false,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                background: type == 'success' ? '#21ba45' : '#fff',
                color: type == 'success' ? '#fff' : '#000',
            });
        }
        // function
        function repComment() {
            let userName = $(this).attr('data-userName')
            $('#leave-coment').text(userName)
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#leave-coment").offset().top
            }, 1000);
        }
        function toogleEditCommentWrap() {
            $(this).closest('.comments-grid-right').children('.edit-comment-wrap').fadeToggle()
            $(this).closest('.comments-grid-right').children('.comment-content').fadeToggle()
        }
        function updateComment(e) {
            e.preventDefault();
            const action = $(this).attr('action')
            const that = $(this)
            $.ajax({
                type: "POST",
                url: action,
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    const newComment = response.comment.comment
                    const message = response.message
                    that.closest('.comments-grid-right').children('.comment-content').text(newComment)
                    that.closest('.edit-comment-wrap').fadeOut()
                    that.closest('.comments-grid-right').children('.comment-content').fadeToggle()
                    alertMessage(message, 'success')
                },
                error: function(errors) {
                    let message = errors.responseJSON.errors.comment
                    alertMessage(message, 'error')
                }
            });
        }

        $('.rep-comment').on('click', repComment)

        // call update comment
        $('.btn-edit-comment').on('click', toogleEditCommentWrap)
        $('.edit-comment-form').submit(updateComment);

        // call create comment
        $('.form-create-comment').submit(function (e) {
            e.preventDefault();
            that = $(this)
            $.ajax({
                type: "POST",
                url: "{{ route('comments.store') }}",
                data: $(this).serialize(),
                dataType: "json",
                success: function (res) {
                    const comment = res.comment
                    const orther = res.ortherData
                    const userAuthId = @auth {{ Auth::user()->id }} @endauth

                    $('.form-create-comment').trigger("reset");

                    var html = `
                        <div class="comments-grid animate__animated animate__fadeInUp" style="margin-top: 25px; margin-bottom:5px">
                            <div class="comments-grid-left">
                                <img src="${orther.userImage}" alt=" " class="img-responsive" />
                            </div>
                            <div class="comments-grid-right panel">
                                <h4><a
                                        href="${orther.GetPostByUser}">${comment.user.name}</a>
                                </h4>`

                                if (comment.user_id == comment.post.user_id) {
                                    html += ` <h6 style="color:#4599ff; background-color:#c5defd; padding: 5px 10px; width:fit-content; border-radius:6px">
                                        Tác giả <i class="fa fa-pencil-square-o" aria-hidden="true"></i></h6>`
                                }

                                html += `
                                <ul>
                                    <li><a href="#${comment.id}">${orther.time}</a><i>|</i>
                                    </li>
                                    <li>
                                        <a class="rep-comment comment-action-link"
                                            data-userName="${comment.user.name}">Trả
                                            lời <i class="fa fa-mail-reply"></i></a>
                                            |
                                    </li>
                                    <li><a class="comment-action-link btn-delete-comment"
                                            data-url="${orther.destroyComment}">Xóa
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>|</li>
                                    </li>
                                    <li><a class="comment-action-link btn-edit-comment btn-edit-comment-ajax">Chỉnh sửa
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a></li>
                                    </li>
                                </ul>
                                <p class="comment-content">${comment.comment}</p>
                                    <div class="leave-coment-form edit-comment-wrap">
                                        <form class="edit-comment-form" action="${orther.updateComment}" method="post">
                                            @csrf
                                            <textarea name="comment" placeholder="Nhập bình luận...">${comment.comment}</textarea>
                                            @error('comment')
                                                <span class="mt-1 text-danger">{{ $message }}</span>
                                            @enderror
                                            <input type="hidden" name="post_id" value="${comment.post.id}">
                                            <div class="w3_single_submit">
                                                <input type="submit" value="Cập nhật">
                                            </div>
                                        </form>
                                    </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>`


                    that.closest('.comment-container').find('.comment-wrap').append(html)
                    let totalCommentBefore = Number($('#number-comment').text().replace(/\D/g, ""))
                    $('#number-comment').text(totalCommentBefore + 1 + ' bình luận')
                    $('.btn-edit-comment-ajax').on('click', toogleEditCommentWrap)
                    $('.edit-comment-form').submit(updateComment)
                    $('.rep-comment').on('click', repComment)
                },
                error: function(errors) {
                    let message = errors.responseJSON.errors.comment
                    alertMessage(message, 'error')
                }
            });
        });
</script>
