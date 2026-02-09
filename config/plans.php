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
    'ultra' => [
        'max_links' => 10000,
        'max_custom_slugs' => 5000,
        'can_edit_links' => true,
        'can_view_analytics' => true,
        'features' => ['detailed-analytics', 'no-ads'],
    ],
];
