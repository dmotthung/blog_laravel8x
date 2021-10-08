<?php
/*
language : VietNam
*/
return [
    'title' => [
        'index' => 'Vai trò',
        'create' => 'Thêm vai trò',
        'edit' => 'Chỉnh sửa vai trò',
        'detail' => 'Xem vai trò',
        'action' => 'Hành động',
    ],
    'form_control' => [
        'input' => [
            'name' => [
                'label' => 'Tên vai trò',
                'placeholder' => 'Thêm tên',
                'attribute' => 'Tên vai trò'
            ],
            'permission' => [
                'label' => 'Các quyền',
                'placeholder' => 'Chọn quyền',
                'attribute' => 'Các quyền'
            ],
            'search' => [
                'label' => 'Tìm kiếm',
                'placeholder' => 'Tìm kiếm vai trò',
                'attribute' => 'Tìm kiếm'
            ]
        ],
    ],
    'label' => [
        'no_data' => [
            'fetch' => "Chưa có vai trò!",
            'search' => "Vai trò :keyword không tìm thấy",
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
            'value' => 'Chỉnh sửa'
        ],
        'update' => [
            'value' => 'Cập nhật'
        ],
        'delete' => [
            'value' => 'Xóa'
        ],
        'cancel' => [
            'value' => 'Thoát'
        ],
        'back' => [
            'value' => 'Quay lại'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => 'Thêm vai trò',
            'message' => [
                'success' => "Thêm vai trò thành công!",
                'error' => "Đã xảy ra lỗi khi lưu vai trò. :error"
            ]
        ],
        'update' => [
            'title' => 'Chỉnh sửa vai trò',
            'message' => [
                'success' => "Cập nhật vai trò thành công.",
                'error' => "Đã xảy ra lỗi khi cập nhật vai trò. :error"
            ]
        ],
        'delete' => [
            'title' => 'Xóa vai trò',
            'message' => [
                'confirm' => "Bạn có chắc chắn muốn xóa vai trò :name?",
                'success' => "Xóa vai trò thành công.",
                'error' => "Đã xảy ra lỗi khi xóa vai trò. :error",
                'warning' => "Cảnh báo, Vai trò :name không thể xóa. Vì nó đang tồn tại số người dùng."
            ]
        ],
    ]
];
