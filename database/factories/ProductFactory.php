<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $products = [
        'Tâm trạng của người mới về hưu',
        'Nghiên cứu tâm trạng của người mới về hưu',
        'Nguy cơ và thách thức trước sự biến đổi của các mối quan hê trong gia đình đương đại',
        ' Nguyễn Thạc, Hoàng Anh, Luyện giao tiếp sư phạm',
        'Ngô Công Hoàn, Hoàng Anh. Giao tiếp sư phạm (Giáo trình đào tạo giảng viên THCS hệ Cao đẳng Sư phạm)',
        'Lê Thị Bừng, Hải Vang Tâm lý học ứng xử',
        'Ngô Công Hoàn Giao tiếp và ứng xử Sư phạm (Dùng cho giảng viên mầm non)',
        'Nguyễn Văn Hộ, Trịnh Trúc Lâm Ứng xử Sư phạm',
        'Nguyễn Văn Lê Giao tiếp sư phạm',
        'A.X. Macarenco Mục đích giáo dục',
        'Trần Hoàng Thị Diễm Ngọc',
        'N.D Levitov Tâm lý học trẻ em và Tâm lý học Sư phạm',
        'PA. E.D. Dzecginski Người lãnh đạo và tập thể',
        'Ph. N. Gonobolin Những phẩm chất tâm lí của người giảng viên',
        'Công văn số 1276/BGD ĐT-NG (20/02/2008) Hướng dẫn tổ chức lấy ý kiến phản hồi từ người học về hoạt động giảng dạy của giảng viên',
        'Nguyễn Bằng Sinh viên đánh giá giảng viên: Đừng hiểu sai!,
        Báo Hà Nội mới Sinh viên đánh giá giảng viên: Mỗi nơi một kiểu Báo cáo kết quả thực hiện lấy ý kiến phản hồi từ
        người học về hoạt động giảng dạy của giảng viên gửi Cục Nhà giáo và Cán bộ quản lý CSGD – Bộ GDĐT (30/09/2011)',
        'Shahida Sajjad Phương pháp giảng dạy hiệu quả ở bậc đại học',
        'Thomas A. Angelo và K. Patricia Cross Classroom assessment techniques: A handbook for college teachers ',
        'MarillaD. Svinicki và Wibert J. McKeachie How to make lectures more effective',
        ' Phạm Tất Dong (2002) Sự lựa chọn tương lai',
        'Nguyễn Văn Hộ, Nguyễn Thị Thanh Huyền (2006) Hoạt động giáo dục hướng nghiệp và giảng dạy kĩ thuật trong trường THPT',
        'Hồ Phụng Hoàng Phoenix, Trần Thị Thu, Nguyễn Ngọc Tài (2013) Tài liệu bổ sung sách giáo viên Hoạt động giáo dục hướng nghiệp lớp 10, 11 và 12',
        'Hồ Phụng Hoàng Phoenix, Trần Thị Thu (2013) Giáo dục hướng nghiệp qua hoạt động giáo dục nghề phổ thông',
        'Nguyễn Ngọc Tài, Hồ Phụng Hoàng Hoàng Phoenix (2013) Tổ chức tư vấn hướng nghiệp và tư vấn tuyển sinh cho nhóm học lớn học sinh cấp Trung học Phổ thông',
        'Nguyễn Đình Chỉnh (1999) Tâm lý học xã hội Trúc Dân',
        'Trần Đạo Website Đối thoại trẻ - Trang thông tin chính thức của Đài Truyền hình Việt Nam',
        'Thạch Hà Báo Thế giới và Việt Nam, cơ quan trực thuộc Bộ Ngoại giao đăng ngày 23/09/2011',
        'Nguyễn Quang Uẩn (chủ biên) (2005) Giáo trình tâm lí học đại cương Uỷ ban bảo vệ và chăm sóc trẻ em Việt Nam, tổ chức cứu trợ trẻ em Thụy Điển (1996)',
        'Nguyễn Quang Uẩn (chủ biên) (2005) Giáo trình tâm lí học đại cương',
        'David P. Farrington (1996) Understanding and preventing youth crime.',
        'Joseph Bowntree Foundation. 11. Jessor R., Donovan J (1985) Time for First Intercourse: A Pospective Study, Journal of Personal Study and Social Psychology',
        'Trần Thị Tú Anh (2010) Cách ứng phó với khó khăn tâm lý của sinh viên thiệt thòi.',
        'Abdulghani, H.M (2008) Stress and depression among medical students: a cross sectional study at a medical college in Saudi Abrabia',
        'Lưu Song Hà Cách thức cha mẹ quan hệ với con và hành vi lệch chuẩn của trẻ',
        ' Nguyễn Duy Hiệp (2016) Hành vi lệch chuẩn trong học tập của sinh viên hiện nay - Nghiên cứu trường hợp tại trường Đại học
        Khoa học Xã hội và Nhân văn và trường Đại học Khoa học tự nhiên Hà Nội',

    ];
    return [
        'name' => $faker->randomElement($products),
        'description' => $faker->text,
        'image' => '1.jpg|2.jpg|3.jpg',
        'pub_date' => $faker->dateTime(),
        'regis_date' => $faker->dateTime(),
        'owner_id' => rand(1, 20)
    ];
});
