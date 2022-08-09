import { alertMessage } from "../js/alert.js";

$(".notification-icon").on("click", function () {
    $(".notification-container").slideToggle();
    $(this).toggleClass("active");
});

$(".user-info__name").on("click", function () {
    $(".dropdown-menu__user-info").slideToggle();
});

$('[data-toggle="tooltip"]').tooltip();

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

function actionDeletePost() {
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Bạn có chắc muốn xóa bài viết này?",
        text: "Bạn sẽ không thể khôi phục bài viết này",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (res) {
                    that.closest(".wthree-top-1").remove();
                    alertMessage(res.message, "success");
                },
            });
        }
    });
}

function actionDeleteComment() {
    let urlRequest = $(this).data("url");
    let that = $(this);
    Swal.fire({
        title: "Bạn có chắc muốn xóa bình luận này?",
        text: "Bạn sẽ không thể khôi phục bình luận này",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xóa",
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
$(function () {
    const messageSuccess = $("#container").attr("data-messageSuccess");
    const messageError = $("#container").attr("data-messageError");
    if (messageSuccess) {
        alertMessage(messageSuccess, "success");
    }
    if (messageError) {
        alertMessage(messageError, "error");
    }
    $(document).on("click", ".btn-delete", actionDeletePost);
    $(document).on("click", ".btn-delete-comment", actionDeleteComment);

    var prevScrollpos = window.pageYOffset;
    var pc = window.matchMedia("(min-width: 1024px)");
    if (pc.matches) {
        window.onscroll = function (e) {
            //hide header when scroll down
            //and show when scroll up
            var currentScrollPos = window.pageYOffset;
            const header = document.querySelector("header");
            //scroll up
            if (prevScrollpos > currentScrollPos) {
                header.style.top = "0";
                // scroll down
            } else if (currentScrollPos != 1) {
                header.style.top = "-150px";
            }
            prevScrollpos = currentScrollPos;
        };
    }
});



