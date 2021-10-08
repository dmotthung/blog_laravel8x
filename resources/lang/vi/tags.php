<?php
/*
language : VietNam
*/
return [
    'title' => [
        'index' => 'Thẻ',
        'create' => 'Thêm thẻ',
        'edit' => 'Chỉnh sửa thẻ',
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
                'label' => 'Tiêu đề thẻ',
                'placeholder' => 'Thêm thẻ',
                'attribute' => 'Tiêu đề thẻ'
            ],
            'slug' => [
                'label' => 'Đường dẫn tĩnh',
                'placeholder' => 'Khởi tạo tự động theo tiêu đề thẻ',
                'attribute' => 'Đường dẫn tĩnh'
            ],
            'search' => [
                'label' => 'Tìm kiếm',
                'placeholder' => 'Tìm kiếm thẻ',
                'attribute' => 'Tìm kiếm'
            ]
        ]
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Thẻ không tồn tại!",
            'search' => "Thẻ :keyword không tìm thấy",
        ]
    ]
    ,
    'button' => [
        'create' => [
            'value' => 'Thêm mới'
        ],
        'save' => [
            'value' => 'Cập nhật'
        ],
        'edit' => [
            'value' => 'Chỉnh sửa'
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
            'title' => 'Thêm thẻ',
            'message' => [
                'success' => "Tạo thẻ mới thành công!",
                'error' => "Lỗi, tạo thẻ mới không thành công. Lý do :error"
            ]
        ],
        'update' => [
            'title' => 'Chỉnh sửa thẻ',
            'message' => [
                'success' => "Cập nhật thẻ thành công!",
                'error' => "Lỗi, cập nhật thẻ không thành công. Lý do :error"
            ]
        ],
        'delete' => [
            'title' => 'Xóa thẻ',
            'message' => [
                'confirm' => "Bạn có chắc muốn xóa thẻ :title?",
                'success' => "Xóa thẻ thành công!",
                'error' => "Lỗi, xóa thẻ thất bại. Lý do :error"
            ]
        ],
    ]
];
