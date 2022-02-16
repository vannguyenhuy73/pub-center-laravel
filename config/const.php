<?php

return [
    'asset' => [
        'version' => '20210325-1407',
    ],
    'smart_url_library' => 'http://adpia.vn/js/api/adpia_smart_url.min.js',
    'minishop' => [
        'pub_url' => env('MINISHOP_PUBLISHER_URL', 'https://minishop.adpia.vn/'),
        'js_url' => env('MINISHOP_JAVASCRIPT_URL', 'https://event.adpia.vn/js/minishop/adpia_minishop.js'),
        'status' => [
            'active' => 1,
            'deactive' => 0
        ],
        'proxy_url' => env('MINISHOP_PROXY_URL', 'https://cors-anywhere.herokuapp.com/'),
        'do_upload_image_url' => env('MINISHOP_DO_UPLOAD_IMAGE_URL', 'https://www.adpia.vn/util/do_upload_multi.php'),
        'register_type' => [
            'regis' => 'R',
            'codes' => 'C'
        ],
        'approve' => [
            'active' => 'A',
            'pending' => 'P',
            'deactive' => 'D'
        ],
        'subs_status' => [
            'request' => 'REQ',
            'approval' => 'APR',
            'deny' => 'DEN'
        ],
        'approval_type' => [
            'manual' => 'MAN',
            'auto' => 'AUT'
        ],
        'logo_document_folder' => 'multi',
        'api_merchant' => "'shopee','lazada','klook','sendo','tiki','yes24'",
        'db_discount_merchant_without' => ['klook', 'luxstay', 'tiki', 'lazada'],
        'category_list' => 'DT,TBDT,MT,CMR,HB,FA,HL,GD,MB,TG,SK,BS,SP,DL',
        'default_user_custom_products_image' => 'https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/affiliate_document/img/image-placeholder-square.jpg',
        'pgm_status' => [
            'active' => 'ACT',
            'deactive' => 'DEA'
        ],
        'aws_store_img' => 'https://s3-ap-southeast-1.amazonaws.com/storage.adpia.vn/affiliate_document/multi/'
    ],
    'discount_code' => [
        'status' => [
            'active' => 1,
            'deactive' => 0
        ],
        'shopee_api' => 'https://magiamgiashopee.vn/wp-admin/admin-ajax.php?action=polyxgo_offers_load_more_data&pg=1&sid=6&cid=9&orderby=date&order=DESC&size=8&ex=false',
        'multi_api' => 'https://bloggiamgia.vn/wp-admin/admin-ajax.php?action=polyxgo_offers_load_more_data&pg=1&sid=6&cid=9&orderby=date&order=DESC&size=8&ex=false'
    ],
    'billing' => [
        'bill_ready_request' => [
            'yes' => 'Y',
            'no' => 'N'
        ],
        'bill_ready_flag' => [
            'yes' => 'Y',
            'no' => 'N'
        ]
    ],
    'adpia_homepage' => env('ADPIA_HOMEPAGE', 'https://adpia.vn'),
    'ac_adpia' => env('AC_ADPIA', 'https://ac.adpia.vn'),
    'img_adpia' => env('IMG_ADPIA', 'https://img.adpia.vn'),
    'blog_adpia' => env('BLOG_ADPIA', 'https://blog.adpia.vn'),
    'adpia_fanpage' => env('ADPIA_FANPAGE', 'https://www.facebook.com/adpia.tiepthilienket'),
    'adpia_youtube' => env('ADPIA_YOUTUBE', 'https://www.youtube.com/channel/UCqmtJ0l3dWwPavkN5b8Ov2g'),
    'notice_cache_expires' => '10',
    'top_merchant_limit' => 10,
    'notice_data_limit' => 20,
    'report' => [
        'detail_records_limit' => 150,
        'pub_bonus' => [
            'status' => [
                'finish' => 'F',
                'pending' => 'P',
                'active' => 'A',
                'deactive' => 'D'
            ]
        ],
        'last_30_days' => 2592000
    ],
    'notify' => [
        'sender_name' => 'Admin',
        'limit' => 20,
        'mail_key' => 'notify_mail',
        'notice_key' => 'notify_publisher'
    ]
];