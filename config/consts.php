<?php

$BASE_PATH_IMAGE = 'image';

return [
    'image' => [
        'profile' => $BASE_PATH_IMAGE . '/profile/',
        'posts' => $BASE_PATH_IMAGE . '/posts/',
        'products' => $BASE_PATH_IMAGE . '/products/',
    ],
    'type' => [
        'post',
        'product'
    ],
    'category_reference' => [
        'name' => 'Tài liệu tham khảo',
        'parent_id' => 0,
        'type' => 'post'
    ]
];