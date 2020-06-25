<?php

return [
    'loai_hinh' => [
        'cong_lap' => 1,
        'von_nuoc_ngoai' => 2,
        'tu_thuc' => 3,
    ],
    'paginate_size' => [
        'default' => 20,
        'list' => [20, 50, 80, 100]
    ],
    'nam_tuyen_sinh' => [
        'list' => [2016, 2017, 2018, 2019, 2020]
    ],
    'trang_thai_nghe' => [
        'hoat_dong' => 1,
        'tam_dung' => 2
    ],
    'bac_nghe' => [
        'trung_cap' => ['ma_bac' => 5, 'ten_bac' => 'Trung Cấp'],
        'cao_dang' => ['ma_bac' => 6, 'ten_bac' => 'Cao Đẳng'],
    ],
    'nam' => [
        'list' => [2016, 2017, 2018, 2019, 2020]
    ],
    'dot' => [
        '1' => 1,
        '2' => 2,
    ],
    'giao_vien' => [
        'gioi_tinh' => [
            'nu' => 0,
            'nam' => 1,
        ],
        'dan_toc_thieu_so' => [
            'khong' => 0,
            'co' => 1,
        ],
        'chuc_danh' => [
            'khong' => 0,
            'pho_giao_su' => 1,
            'giao_su' => 2,
        ],
        'trinh_do_ngoai_ngu' => [
            '0' => 0,
            '1' => 1,
            '2' => 2,
            '3' => 3,
            '4' => 4,
            '5' => 5,
        ],
        'trinh_do_nghe' => [
            'khong' => 0,
            'bac_1' => 1,
            'bac_2' => 2,
            'bac_3' => 3,
        ],
        'nghiep_vu_su_pham' => [
            'khong' => 0,
            'cao_dang' => 1,
            'trung_cap' => 2,
            'so_cap' => 3,
        ],
        'loai_hop_dong' => [
            'bien_che' => 1,
            'hop_dong' => 2,
            'thinh_giang' => 3,
        ],
        'trinh_do_tin_hoc' => [
            'co_ban' => 0,
            'nang_cao' => 1,
        ],
        'nha_giao_nhan_dan' => [
            'khong' => 0,
            'co' => 1,
        ],
        'nha_giao_uu_tu' => [
            'khong' => 0,
            'co' => 1,
        ],
    ],
    'loai_truong' => [
        'cao_dang' => 'TRƯỜNG CAO ĐẲNG',
        'trung_cap' => 'TRƯỜNG TRUNG CẤP',
        'so_cap' => 'TRƯỜNG SƠ CẤP',
    ],
    'firestore_notification_collection' => 'notifications',
    'firestore_notification_status' => [
        'unread' => 1,
        'read' => 2
    ],
    'notify_module' => [
        'tu_van_ho_tro' => 'tu-van-ho-tro'
    ],
    'trang_thai_ho_tro' => [
        'chua_phan_hoi' => 1,
        'da_phan_hoi' => 2
    ]
];