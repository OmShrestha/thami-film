<?php

return [
    'redirect_to_production' => env('REDIRECT_TO_PRODUCTION'),
    'production_admin_url'     => env('PRODUCTION_ADMIN_URL'),

    'admin_login_url' => env('ADMIN_LOGIN_URL', 'portal'),

    'mail_to_address'    => env('MAIL_TO_ADDRESS', 'tutor.club@gmail.com'),
    'enable_feedback'    => env('ENABLE_FEEDBACK', 'true'),
    'enable_contact'     => env('ENABLE_CONTACT', 'false'),
    'subscription_from'  => env('ENABLE_SUBSCRIPTION_FORM', 'false'),
    'blog_search'        => env('ENABLE_BLOG_SEARCH', 'true'),
    'enable_blog_import' => env('ENABLE_IMPORT_BLOG', 'false'),

    'blog_image_path' => env('BLOG_IMAGE_PATH', '/assets/frontend/images/blogs/'),
    'admin_image_path' => env('ADMIN_IMAGE_PATH', '/'),
    'aws_url'         => env('AWS_URL'),

];
