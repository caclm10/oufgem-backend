<?php

namespace App\Helpers;

class ViewHelper
{
    public static function generateBreadcrumb(string $name = 'dashboard'): array
    {
        switch ($name) {
            case 'dashboard':
                return [['title' => 'Dashboard']];
            case 'roles':
                return [
                    [
                        'title' => 'Dashboard',
                        'href' => '/panel'
                    ],
                    [
                        'title' => 'Roles',
                    ]
                ];
            default:
                return [];
        }
    }
}
