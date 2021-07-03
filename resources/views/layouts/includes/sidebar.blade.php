@php
    $data = [
        [
            'icon' => 'pie-chart',
            'name' => 'Dashboard',
            'url' => request()->root().'/admin/dashboard',
            'permission' => true,
        ],
        [
            'id' => 'products',
            'icon' => 'users',
            'name' => 'Products',
            'permission' => true,
            'subMenu' => [
                [
                    'name' => 'People',
                    'url' => request()->root().'/crm/person/list',
                    'permission' => true,
                ],
                [
                    'name' => 'Organizations',
                    'url' => request()->root().'/crm/org/list',
                    'permission' => true,
                ],
                [
                    'name' => 'Lead groups',
                    'url' => request()->root().'/crm/contact/type/list',
                    'permission' => true,
                ],
            ],
        ],

        [
            'id' => 'deals',
            'icon' => 'clipboard',
            'name' => 'Deals ',
            'permission' => authorize_any(['view_deals', 'view_pipelines', 'view_lost_reasons']),
            'subMenu' => [
                [
                    'name' => 'Pipeline view',
                    'url' => request()->root().'/crm/deals/pipeline/view',
                    'permission' => authorize_any(['view_deals']),
                ],
                [
                    'name' => 'All deals',
                    'url' => request()->root().'/crm/deals/list/view',
                    'permission' => authorize_any(['view_deals']),
                ],
                [
                    'name' => 'Pipelines',
                    'url' => request()->root().'/crm/pipelines/list/view',
                    'permission' => authorize_any(['view_pipelines']),
                ],
                 [
                    'name' => 'Lost reasons',
                    'url' => request()->root().'/crm/lost/reasons/list/view',
                    'permission' => authorize_any(['view_lost_reasons']),
                ],
            ],
        ],
        [
            'id' => 'proposals',
            'icon' => 'hexagon',
            'name' => 'Proposals ',
            'permission' => true,
            'subMenu' => [
                [
                    'name' => 'Proposal list',
                    'url' => request()->root().'/crm/proposals/list/view',
                    'permission' => true,
                ],
                [
                    'name' => 'Templates',
                    'url' => request()->root().'/crm/template/view',
                    'permission' => true,
                ],
            ],
        ],
        [
            'id' => 'activities',
            'icon' => 'activity',
            'name' => 'Activities ',
            'permission' => authorize_any(['view_activities']),
            'subMenu' => [
                [
                    'name' => 'Calendar view',
                    'url' => request()->root().'/crm/activities/calendar/view/',
                    'permission' => authorize_any(['view_activities']),
                ],
                [
                    'name' => 'List view',
                    'url' => request()->root().'/crm/activities/list/view',
                    'permission' => authorize_any(['view_activities']),
                ],
            ],
        ],
        [
            'id' => 'reports',
            'icon' => 'bar-chart',
            'name' => 'Reports ',
            'permission' => true,
            'subMenu' => [
                [
                    'name' => 'Deal',
                    'url' => request()->root().'/crm/reports/deal',
                    'permission' => true,
                ],
                [
                    'name' => 'Proposal',
                    'url' => request()->root().'/crm/reports/proposal',
                    'permission' => true,
                ],
                [
                    'name' => 'Pipeline',
                    'url' => request()->root().'/crm/reports/pipeline',
                    'permission' => true,
                ],
            ],
        ],
        [
           'icon' => 'user-check',
           'name' => 'Users & roles',
           'url' => request()->root().'/crm/users/list',
           'permission' => true,
        ],
        [
            'icon' => 'settings',
            'name' => 'Settings',
            'url' => request()->root().'/crm/settings/page',
            'permission' => true,

        ],
    ];
@endphp
<sidebar :data="{{ json_encode($data) }}"
         :logo-icon-src="{{json_encode(env('APP_URL').config('settings.application.company_icon'))}}"
         :logo-src="{{json_encode(env('APP_URL').config('settings.application.company_logo'))}}">

</sidebar>
