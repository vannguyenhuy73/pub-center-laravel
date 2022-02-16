<?php

return [
    'required'             => ':attribute là bắt buộc.',
    'regex'                => ':attribute chưa đúng định dạng hợp lệ.',
    'string'               => ':attribute phải là kiểu chuỗi.',
    'max'                  => [
        'string'  => ':attribute chỉ được tối đa :max ký tự.',
        'digits' => ':attribute chỉ được tối đa :digits chữ số.'
    ],
    'email'               => ':attribute phải đúng định dạng email.',
    'unique'              => ':attribute đã tồn tại trên hệ thống.',
    'min'                 => [
        'string'  => ':attribute có ít nhất :min ký tự.',
    ],
    'alpha_dash' => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'confirmed'  => ':attribute được nhập lại không khớp',
    'url'        => ':attribute chưa đúng định dạng hợp lệ',
    'not_empty'  => ':attribute là không được rỗng',
    'date_format' => ':attribute là chưa đúng định dạng: :format',
    'after'      => ':end phải sau :start',
    'after_or_equal' => ':end phải sau hoặc bằng :start',
    'numeric' => ':attribute chỉ được phép là số'
];
