<?php
/*
language : VietNam
*/
return [
    'title' => [
        'index' => 'Người dùng',
        'create' => 'Thêm mới',
        'edit' => 'Chỉnh sửa',
    ],
    'form_control' => [
        'input' => [
            'name' => [
                'label' => 'Tên thành viên',
                'placeholder' => 'Thêm tên thành viên mới',
                'attribute' => 'Tên thành viên'
            ],
            'email' => [
                'label' => 'Email',
                'placeholder' => 'Thêm email',
                'attribute' => 'email'
            ],
            'password' => [
                'label' => 'Mật khẩu',
                'placeholder' => 'Thêm mật khẩu mới',
                'attribute' => 'Mật khẩu'
            ],
            'password_confirmation' => [
                'label' => 'Xác nhận lại mật khẩu',
                'placeholder' => 'Nhập lại mật khẩu',
                'attribute' => 'Xác nhận lại mật khẩu'
            ],
            'search' => [
                'label' => 'Tìm kiếm',
                'placeholder' => 'Tìm kiếm người dùng',
                'attribute' => 'Tìm kiếm'
            ]
        ],
        'select' => [
            'role' => [
                'label' => 'Vai trò',
                'placeholder' => 'Chọn vai trò',
                'attribute' => 'Vai trò'
            ]
        ]
    ],
    'label' => [
        'name' => 'Tên',
        'email' => 'Email',
        'role' => 'Vai trò',
        'no_data' => [
            'fetch' => "Không có người dùng nào",
            'search' => "Người dùng :keyword không tồn tại",
        ]
    ],
    'button' => [
        'create' => [
            'value' => 'Thêm mới'
        ],
        'save' => [
            'value' => 'Lưu'
        ],
        'update' => [
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
        'back' => [
            'value' => 'Quay lại'
        ],
    ],
    'alert' => [
        'create' => [
            'title' => 'Thêm người dùng',
            'message' => [
                'success' => "Thêm người dùng mới thành công!",
                'error' => "Lỗi, thêm người dùng không thành công. Lý do :error"
            ]
        ],
        'update' => [
            'title' => 'Chỉnh sửa',
            'message' => [
                'success' => "Cập nhật thông tin người dùng thành công!",
                'error' => "Lỗi, cập nhật thông tin không thành công. Lý do :error"
            ]
        ],
        'delete' => [
            'title' => 'Xóa người dùng',
            'message' => [
                'confirm' => "Bạn có chắc chắn muốn xóa người dùng :name không? Sẽ không phục hồi lại được.",
                'success' => "Xóa người dùng thành công!",
                'error' => "Lỗi, xóa người dùng không thành công. Lý do :error"
            ]
        ],
    ]
];
