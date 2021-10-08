<?php
/*
language : VietNam
*/
return [
    'title' => [
        'index' => 'Bài viết',
        'create' => 'Viết bài mới',
        'edit' => 'Chỉnh sửa bài',
        'detail' => 'Xem bài viết',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Chưa có bài viết nào. Hãy thêm bài viết mới!",
            'search' => "Bài viết :keyword không tìm thấy",
        ]
    ],
    'table_list' => [
        'title'         =>  'Tiêu đề',
        'status'        => 'Trạng thái',
        'created_at'    =>  'Ngày tạo',
        'action'        =>  'Hành động',
        'publish'       =>  'Xuất bản',
        'draft'         =>  'Bản nháp',
        'view'          =>  'Xem',
        'edit'          =>  'Sửa',
        'delete'        =>  'Xóa',
        'created_at'    =>  'Ngày đăng',
        'updated_at'    =>  'Cập nhật'
    ],
    'form_control' => [
        'input' => [
            'title' => [
                'label' => 'Tiêu đề',
                'placeholder' => 'Thêm tiêu đề bài viết',
                'attribute' => 'Tiêu đề'
            ],
            'slug' => [
                'label' => 'Đường dẫn tĩnh',
                'placeholder' => 'Khởi tạo tự động theo tiêu đề bài viết',
                'attribute' => 'Đường dẫn tĩnh'
            ],
            'thumbnail' => [
                'label' => 'Ảnh đại diện',
                'placeholder' => 'Chọn ảnh đại diện',
                'attribute' => 'Ảnh đại diện'
            ],
            'category' => [
                'label' => 'Danh mục',
                'placeholder' => 'Chọn danh mục',
                'attribute' => 'Danh mục'
            ],
            'search' => [
                'label' => 'Tìm kiếm',
                'placeholder' => 'Tìm kiếm bài viết',
                'attribute' => 'Tìm kiếm'
            ]
        ],
        'select' => [
            'tag' => [
                'label' => 'Thẻ',
                'placeholder' => 'Thêm thẻ',
                'attribute' => 'Thẻ',
                'option' => [
                    'publish' => 'Công khai',
                    'draft' => 'Bản nháp'
                ],
            ],
            'status' => [
                'label' => 'Trạng thái',
                'placeholder' => 'Chọn trạng thái',
                'attribute' => 'Trạng thái',
                'option' => [
                    'draft' => 'Bản nháp',
                    'publish' => 'Công khai',
                ]
            ],
        ],
        'textarea' => [
            'description' => [
                'label' => 'Mô tả',
                'placeholder' => 'Thêm mô tả',
                'attribute' => 'Mô tả'
            ],
            'content' => [
                'label' => 'Nội dung bài viết',
                'placeholder' => 'Soạn nội dung bài',
                'attribute' => 'Nội dung bài viết'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Thêm mới'
        ],
        'save' => [
            'value' => 'Đăng bài'
        ],
        'update' => [
            'value' => 'Cập nhật'
        ],
        'edit' => [
            'value' => 'Chỉnh sửa'
        ],
        'delete' => [
            'value' => 'Xóa bài'
        ],
        'cancel' => [
            'value' => 'Thoát'
        ],
        'browse' => [
            'value' => 'Chọn ảnh'
        ],
        'back' => [
            'value' => 'Quay lại'
        ],
        'apply' => [
            'value' => 'Đồng ý'
        ],
        'search' => [
            'value' => 'Tìm kiếm'
        ]
    ],
    'alert' => [
        'create' => [
            'title' => 'Thêm bài mới',
            'message' => [
                'success' => "Đăng bài viết mới thành công!",
                'error' => "Lỗi, thêm bài viết thất bại. Lý do :error"
            ]
        ],
        'update' => [
            'title' => 'Sửa bài viết',
            'message' => [
                'success' => "Cập nhật bài viết thành công!",
                'error' => "Lỗi, cập nhật thất bại. Lý do :error"
            ]
        ],
        'delete' => [
            'title' => 'Xóa bài viết',
            'message' => [
                'confirm' => "Bạn có chắc rằng muốn xóa bài viết :title?",
                'success' => "Xóa bài viết thành công!",
                'error' => "Lỗi, xóa bài viết thất bại. Lý do :error"
            ]
        ],
    ]
];
