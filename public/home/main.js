import { alertMessage } from "../js/alert.js";

function renderNoNotication() {
    let noNotiImg = $(".notice-nav").data("noimg");
    $(".notification-icon").removeClass("bell active");
    $(".number-notification").remove();
    $("#has-notification").remove();
    $(".notice-nav").append(`
        <div class="notification-container animate__animated animate__fadeIn">
            <img class="no-notification-img" src="${noNotiImg}" alt="">
            <h4 style="padding: 10px 0" class="active">Bạn không có thông báo nào</h4>
        </div>
    `);
}

function actionDeletePost() {
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Xác nhận xóa bài viết",
        text: "Bạn sẽ không thể khôi phục bài viết này",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (res) {
                    that.closest(".post-container").fadeOut(
                        ("slow",
                        function () {
                            that.closest(".post-container").remove();
                            alertMessage(res.message, "success");
                        })
                    );
                },
            });
        }
    });
}

function actionDeleteComment() {
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Xác nhận xóa bình luận",
        text: "Bạn sẽ không thể khôi phục bình luận này",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (res) {
                    that.closest(".comments-grid").fadeOut();
                    let totalCommentBefore = Number(
                        $("#number-comment").text().replace(/\D/g, "")
                    );
                    $("#number-comment").text(
                        totalCommentBefore - 1 + " bình luận"
                    );
                    alertMessage(res.message, "success");
                },
            });
        }
    });
}

function headerScroll() {
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function (e) {
        var currentScrollPos = window.pageYOffset;
        const header = document.querySelector("header");
        if (prevScrollpos > currentScrollPos) {
            header.style.top = "0";
        } else if (currentScrollPos > 5) {
            header.style.top = "-150px";
        }
        prevScrollpos = currentScrollPos;
    };
}

function initPackage() {
    $('[data-toggle="tooltip"]').tooltip();
    // ckeditor
    window.editors = {};
    document.querySelectorAll(".editor").forEach((node, index) => {
        ClassicEditor.create(node, {}).then((newEditor) => {
            window.editors[index] = newEditor;
        });
    });

    // select2
    $(".select2_init").select2();

    // carousel
    $(".carousel").carousel({
        interval: false,
    });
}

function showAlertMessageInSession() {
    const messageSuccess = $("#container").attr("data-messageSuccess");
    const messageError = $("#container").attr("data-messageError");
    if (messageSuccess) {
        alertMessage(messageSuccess, "success");
    }
    if (messageError) {
        alertMessage(messageError, "error");
    }
}

function readMorePost() {
    $(".read-more-btn").on("click", function (e) {
        e.preventDefault();
        const postContent = $(this)
            .closest(".post-content")
            .find(".post-content-body");
        postContent.toggleClass("limit-line");
        $(this).text(function (i, text) {
            return text === "Xem thêm" ? "Ẩn bớt" : "Xem thêm";
        });
    });
}

function initMeasurerFor(textarea, measurer) {
    var maxWidth = textarea.css("max-width");
    measurer
        .text(textarea.text())
        .css(
            "max-width",
            maxWidth == "none" ? textarea.width() + "px" : maxWidth
        )
        .css("font", textarea.css("font"))
        .css("min-height", textarea.css("min-height"))
        .css("min-width", textarea.css("min-width"))
        .css("padding", textarea.css("padding"))
        .css("border", textarea.css("border"))
        .css("box-sizing", textarea.css("box-sizing"));
}
function updateTextAreaSize(textarea, measurer) {
    textarea.height(measurer.height());
    var w = measurer.width();
    textarea.width(w + 2);
}

function autofitCommentInput() {
    var measurer = $("<span>", {
        style: "display:inline-block;word-break:break-word;visibility:hidden;white-space:pre-wrap;",
    }).appendTo("body");

    $("textarea.autofit").on({
        input: function () {
            var text = $(this).val();
            measurer.html(text);
            updateTextAreaSize($(this), measurer);
        },
        focus: function () {
            initMeasurerFor($(this), measurer);
        },
        keypress: function (e) {
            var text = $(this).val();
            if (e.which == 13) {
                e.preventDefault();
                if (text.length) {
                    // Ajax create Comment
                    const form = $(this).closest(".create-comment-form");
                    const data = form.serialize();
                    const action = form.attr("action");
                    const that = $(this);
                    $.ajax({
                        type: "POST",
                        url: action,
                        data: data,
                        dataType: "json",
                        success: function (response) {
                            that.val("");
                            const comment = response.comment;
                            const others = response.others;
                            let htmlComment = `
                                <li class="comment-item animate__animated  animate__fadeIn">
                                    <div class="comment-item-content">
                                        <a class="comment-item-content-left"
                                            href="${others.GetPostByUser}">
                                            <img src="${others.userImage}" alt=""
                                                class="user-post-avt">
                                        </a>
                                        <div class="comment-item-content-right">
                                            <ul class="comment-item-content-right-list">`;
                            if (comment.user_id == comment.post.user_id) {
                                htmlComment += `
                                                        <li class="comment-item-content-right-list__item comment-item-author">
                                                            <i class="fa fa-pencil"></i>
                                                            <span>Tác giả</span>
                                                        </li>`;
                            }
                            htmlComment += `
                                                <li class="comment-item-content-right-list__item">
                                                    <a class="comment-item-content-left"
                                                        href="${others.GetPostByUser}">
                                                        <span class="comment-user-name">${comment.user.name}</span>
                                                    </a>
                                                </li>
                                                <li class="comment-item-content-right-list__item">
                                                    ${comment.comment}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                            <span class="glyphicon glyphicon-option-horizontal comment-item-control"
                                                aria-hidden="true">
                                            </span>
                                </li>
                                `;

                            that.closest(".post-comment")
                                .find(".list-comment")
                                .prepend(htmlComment);
                        },
                        error: function (errors) {
                            alertMessage("Có lỗi xảy ra", "error");
                        },
                    });
                }
            }
            if (e.ctrlKey && (e.which == 13 || e.which == 10)) {
                $(this).val(text + "\r\n");
                measurer.html(text);
                updateTextAreaSize($(this), measurer);
            }
        },
    });
}

// Ready
$(function () {
    initPackage();
    headerScroll();
    // buttonToTop
    $().UItoTop({ easingType: "easeOutQuart" });
    showAlertMessageInSession();
    readMorePost();
    autofitCommentInput();
    // Delete post
    $(document).on("click", ".btn-delete", actionDeletePost);
    $(document).on("click", ".btn-delete-comment", actionDeleteComment);
    // Notification toggle
    $(".notification-icon").on("click", function () {
        $(".notification-container").slideToggle();
        $(this).toggleClass("active");
    });
    // mark as read all notification
    $(".read-all-noti-link").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr("href"),
            dataType: "json",
            success: function (response) {
                alertMessage(response.message, "success");
                $(".notice-list li").removeClass("unread");
                $(".notification-icon").removeClass("bell");
                $(".number-notification").hide();
            },
        });
    });
    // delete all notification
    $(".remove-all-noti-link").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "GET",
            url: $(this).attr("href"),
            dataType: "json",
            success: function (response) {
                alertMessage(response.message, "success");
                renderNoNotication();
            },
        });
    });
    // User profile
    $(".user-info__name").on("click", function () {
        $(".dropdown-menu__user-info").slideToggle();
    });

    // Handle post request
    $(".action-btn").click(function (e) {
        e.preventDefault();
        var url = $(this).closest(".hanle-request-form").attr("action");
        var data = $(this)
            .closest(".hanle-request-form")
            .serializeArray()
            .reduce(function (obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
        data.action = $(this).data("action");
        const screen = $(this).data("screen");
        const that = $(this);
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            dataType: "json",
            success: function (response) {
                if (screen == "header") {
                    let totalNoti = $(".notice-item").length;
                    totalNoti--;
                    $(that).closest(".notice-item").remove();
                    $(".number-notification").text(totalNoti);
                    if (totalNoti < 1) {
                        renderNoNotication();
                    }
                } else {
                    that.closest(".wthree-top-1").remove();
                }
                alertMessage(response.message, "success");
            },
            error: function (errors) {
                let totalNoti = $(".notice-item").length;
                totalNoti--;
                $(that).closest(".notice-item").remove();
                $(".number-notification").text(totalNoti);
                if (totalNoti < 1) {
                    renderNoNotication();
                }
                if (errors.status == 404) {
                    alertMessage("Bài viết không tồn tại", "error");
                } else {
                    alertMessage("Có lỗi xảy ra", "error");
                }
            },
        });
    });
});
