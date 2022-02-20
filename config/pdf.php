<?php
return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'default_font_size' => '12',
    'default_font' => 'iransans',
    'margin_left' => 10,
    'margin_right' => 10,
    'margin_top' => 10,
    'margin_bottom' => 10,
    'margin_header' => 0,
    'margin_footer' => 0,
    'orientation' => 'P',
    'title' => 'Laravel mPDF',
    'author' => '',
    'watermark' => '',
    'show_watermark' => false,
    'watermark_font' => 'iransans',
    'display_mode' => 'fullpage',
    'watermark_text_alpha' => 0.1,
    'directionality' => 'rtl',
    'custom_font_dir' => public_path('/fonts/ttf/'),
    'custom_font_data' => [
        'iransans' => [
            'R' => 'IRANSansWeb.ttf',    // regular font
            'B' => 'IRANSansWeb_Bold.ttf',       // optional: bold font
            'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
        ],
    ],
    'auto_language_detection' => false,
    'temp_dir' => base_path('../temp/')
];