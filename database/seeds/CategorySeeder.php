<?php

use App\Models\Category;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $cate1 = Category::create(['name' => 'Về quyền SH công nghiệp (SHCN)']);
            $cate2 = Category::create(['name' => 'Về quyền tác giả']);
            $cate3 = Category::create(['name' => 'Về quyền liên quan']);
            $cate4 = Category::create(['name' => 'Sử dụng các tác phẩm được bảo hộ về QTG trong giảng dạy']);
            $cate5 = Category::create(['name' => 'Tác phẩm của Giảng viên và việc xuất bản']);
            $cate6 = Category::create(['name' => 'Hệ thống thực hành quyền tác giả']);

            Category::insert([
                [
                    'name' => 'Quyền SHCN là gì',
                    'parent_id' => $cate1->id
                ],
                [
                    'name' => 'Đăng ký SHCN',
                    'parent_id' => $cate1->id
                ],
                [
                    'name' => 'Sử dụng SHCN',
                    'parent_id' => $cate1->id
                ],
            ]);
            Category::insert([
                [
                    'name' => 'Quyền tác giả là gì',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Tác giả và Chủ sở hữu quyền',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Về đăng ký QTG',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Các quyền độc quyền',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Khu vực công cộng',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Ngoại lệ và Giới hạn quyền',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Xin phép và Cấp phép',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Giấy phép CC',
                    'parent_id' => $cate2->id
                ],
                [
                    'name' => 'Quản lý tập thể quyền tác giả',
                    'parent_id' => $cate2->id
                ],
            ]);
            Category::insert([
                [
                    'name' => 'Quyền liên quan là gì',
                    'parent_id' => $cate3->id
                ],
                [
                    'name' => 'Chủ sở hữu quyền liên quan',
                    'parent_id' => $cate3->id
                ],
                [
                    'name' => 'Ngoại lệ và giới hạn quyền',
                    'parent_id' => $cate3->id
                ],
                [
                    'name' => 'Xin phép và Cấp phép',
                    'parent_id' => $cate3->id
                ],
                [
                    'name' => 'Quản lý tập thể quyền liên quan',
                    'parent_id' => $cate3->id
                ],
            ]);
            Category::insert([
                [
                    'name' => 'Sử dụng tác phẩm trong kho tài sản của Trường',
                    'parent_id' => $cate4->id
                ],
                [
                    'name' => 'Sử dụng tác phẩm của bên thứ ba trong các bài giảng',
                    'parent_id' => $cate4->id
                ],
                [
                    'name' => 'Sử dụng hình ảnh, video, audio',
                    'parent_id' => $cate4->id
                ],
                [
                    'name' => 'Sử dụng “không trực tiếp” (transformative)',
                    'parent_id' => $cate4->id
                ],
                [
                    'name' => 'Các khóa MOOC và các website tác giả',
                    'parent_id' => $cate4->id
                ],
                [
                    'name' => 'Sử dụng Giấy phép CC',
                    'parent_id' => $cate4->id
                ],
            ]);
            Category::insert([
                [
                    'name' => 'Hợp đồng xuất bản',
                    'parent_id' => $cate5->id
                ],
                [
                    'name' => 'Bài báo công bố trên tạp chí',
                    'parent_id' => $cate5->id
                ],
                [
                    'name' => 'Giáo trình',
                    'parent_id' => $cate5->id
                ],
                [
                    'name' => 'Bài giảng, các học liệu dùng trong giảng day.',
                    'parent_id' => $cate5->id
                ],
                [
                    'name' => 'Bài giảng online',
                    'parent_id' => $cate5->id
                ],
                [
                    'name' => 'Sao chép cho sinh viên',
                    'parent_id' => $cate5->id
                ],
            ]);
            Category::insert([
                [
                    'name' => '“Ba chân kiềng” của một hệ thống bảo hộ quyền tác giả',
                    'parent_id' => $cate6->id
                ],
                [
                    'name' => 'Các CMO tại Việt Nam',
                    'parent_id' => $cate6->id
                ],
            ]);
    }
}
