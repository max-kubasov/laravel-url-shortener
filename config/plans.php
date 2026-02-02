<?php


return [
    'free' => [
        'max_links' => 100,
        'max_custom_slugs' => 5,
        'can_edit_links' => true,
    ],
    'basic' => [
        'max_links' => 500,
        'max_custom_slugs' => 100,
        'can_edit_links' => true,
        'features' => ['detailed-analytics', 'no-ads'],
    ],
    'pro' => [
        'max_links' => 5000,
        'max_custom_slugs' => 1000,
        'can_edit_links' => true,
        'features' => ['detailed-analytics', 'no-ads'],
    ],
];
