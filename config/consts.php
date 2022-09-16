<?php

$BASE_PATH_IMAGE = 'image';

return [
    'message' => [
        'error' => [
            'common' => 'Có lỗi xảy ra',
            'getData' => 'Có lỗi xảy ra trong quá trình lấy dữ liệu',
            'connect' => 'Có lỗi xảy ra trong quá trình kết nối',
        ],
        'success' => [
            'create' => 'Thêm mới thành công',
            'update' => 'Cập nhật thành công',
            'delete' => 'Xóa thành công',
            'connect' => 'Kết nối thành công',
        ]
    ],
    'post' => [
        'status' => [
            'request' => [
                'value' => 1,
                'name' => 'Chưa được phê duyệt',
                'classIcon' => 'fa-rotate-right text-info',
                'className' => 'text-warning',
            ],
            'refuse' => [
                'value' => 2,
                'name' => 'Đã bị từ chối',
                'classIcon' => 'fa-times-circle',
                'className' => 'text-danger',
            ],
            'unsolved' => [
                'value' => 3,
                'name' => 'Chưa được giải đáp',
                'classIcon' => 'fa-question-circle',
                'className' => 'text-primary',
            ],
            'solved' => [
                'value' => 4,
                'name' => 'Đã được giải đáp',
                'classIcon' => 'fa-check-circle',
                'className' => 'text-success',
            ],
        ],
        'action' => [
            'accept' =>  'Chấp nhận',
            'refuse' => 'Từ chối',
        ]
    ],
    'image' => [
        'profile' => $BASE_PATH_IMAGE . '/profile/',
        'posts' => $BASE_PATH_IMAGE . '/posts/',
        'products' => $BASE_PATH_IMAGE . '/products/',
    ],
    'owner' => [
        'all' => 0,
        'none' => -1,
    ],

    'category' => [
        'all' => 0,
        'type' => [
            'post' => [
                'value' => 1,
                'name' => 'Bài viết'
            ],
            'post_reference' => [
                'value' => 2,
                'name' => 'Tài liệu tham khảo'
            ],
            'product' => [
                'value' => 3,
                'name' => 'Tác phẩm'
            ],
        ],
    ],

    'author' => [
        'all' => 0,
    ],

    'tag' => [
        'all' => 0,
    ],

    'user' => [
        'all' => 0,
        'gender' => [
            'male' => [
                'value' => 1,
                'name' => 'Nam',
                'image' => 'avatar-nam.jpg'
            ],
            'female' => [
                'value' => 2,
                'name' => 'Nữ',
                'image' => 'avatar-nu.jpg'
            ]
        ]
    ],
];
