<?php
/*
language : VietNam
*/
return [
    'title' => [
        'index' => 'Danh mục',
        'create' => 'Thêm danh mục',
        'edit' => 'Sửa danh mục',
        'detail' => 'Xem danh mục',
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Danh mục không tồn tại!",
            'search' => "Danh mục :keyword không tìm thấy",
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
        'delete'        =>  'Xóa'
    ],

    'form_control' => [
        'input' => [
            'title' => [
                'label' => 'Tiêu đề',
                'placeholder' => 'Thêm tiêu đề',
                'attribute' => 'Tiêu đề'
            ],
            'slug' => [
                'label' => 'Đường dẫn tỉnh',
                'placeholder' => 'Khởi tạo tự động theo tiêu đề',
                'attribute' => 'Đường dẫn tĩnh'
            ],
            'thumbnail' => [
                'label' => 'Ảnh đại diện',
                'placeholder' => 'Chọn ảnh đại diện',
                'attribute' => 'Hình ảnh'
            ],
            'search' => [
                'label' => 'Tìm kiếm',
                'placeholder' => 'Tìm kiếm danh mục',
                'attribute' => 'Tìm kiếm'
            ]
        ],
        'select' => [
            'parent_category' => [
                'label' => 'Danh mục cha',
                'placeholder' => 'Chọn danh mục cha',
                'attribute' => 'Danh mục cha'
            ]
        ],
        'textarea' => [
            'description' => [
                'label' => 'Mô tả',
                'placeholder' => 'Thêm mô tả',
                'attribute' => 'Mô tả'
            ],
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Thêm mới'
        ],
        'save' => [
            'value' => 'Lưu'
        ],
        'edit' => [
            'value' => 'Cập nhật'
        ],
        'delete' => [
            'value' => 'Xóa'
        ],
        'cancel' => [
            'value' => 'Thoát'
        ],
        'browse' => [
            'value' => 'Chọn'
        ],
        'back' => [
            'value' => 'Quay lại'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => 'Thêm danh mục',
            'message' => [
                'success' => "Đã thêm danh mục thành công!",
                'error' => "Lỗi, thêm danh mục không thành công. :error"
            ]
        ],
        'update' => [
            'title' => 'Sửa danh mục',
            'message' => [
                'success' => "Cập nhật danh mục thành công!",
                'error' => "Lỗi, cập nhật danh mục không thành công. :error"
            ]
        ],
        'delete' => [
            'title' => 'Xóa danh mục',
            'message' => [
                'confirm' => "Bạn có chắc muốn xóa danh mục :title? Sẽ không phục hồi lại được!",
                'success' => "Đã xóa danh mục thành công.",
                'error' => "Lỗi, xóa danh mục không thành công. :error"
            ]
        ],
    ]
];
