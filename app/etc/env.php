<?php
return [
    'remote_storage' => [
        'driver' => 'file'
    ],
    'backend' => [
        'frontName' => 'admin_vd30tm1'
    ],
    'cache' => [
        'graphql' => [
            'id_salt' => 'INwqABJ20XWTZrIuuOq9gSz7Q7De7iWu'
        ],
        'frontend' => [
            'default' => [
                'id_prefix' => '69d_'
            ],
            'page_cache' => [
                'id_prefix' => '69d_'
            ]
        ],
        'allow_parallel_generation' => false
    ],
    'config' => [
        'async' => 0
    ],
    'queue' => [
        'consumers_wait_for_messages' => 1
    ],
    'crypt' => [
        'key' => 'base64CU0rIKQ+Bi41Jr3QlxGBLmmt8DC+l/Zv/X125tGBViY='
    ],
    'db' => [
        'connection' => [
            'default' => [
                'host' => 'localhost',
                'dbname' => 'cadi_db',
                'username' => 'cadi_user',
                'password' => 'StrongPassword123!',
                'active' => '1'
            ]
        ]
    ],
    'MAGE_MODE' => 'production',
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'session' => [
        'save' => 'files'
    ],
    'lock' => [
        'provider' => 'db'
    ],
    'directories' => [
        'document_root_is_pub' => true
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'graphql_query_resolver_result' => 1,
        'full_page' => 1,
        'config_webservice' => 1,
        'translate' => 1
    ],
    'downloadable_domains' => [
        'localhost'
    ],
    'install' => [
        'date' => 'Wed, 19 Nov 2025 05:47:52 +0000'
    ]
];
