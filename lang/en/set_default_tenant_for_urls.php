<?php

declare(strict_types=1);

return [
    'actions' => [
        'set_default_tenant' => [
            'label' => 'Set Default Tenant for URLs',
            'success' => 'Default tenant set successfully for all URLs.',
            'error' => 'Error setting default tenant for URLs.',
            'confirmation' => 'Are you sure you want to set the default tenant for all URLs?',
            'tooltip' => 'Set the default tenant for all generated URLs',
        ],
    ],
    'messages' => [
        'success' => 'Default tenant has been set for all URLs.',
        'error' => 'An error occurred while setting the default tenant.',
    ],
    'fields' => [
        'tenant_id' => [
            'label' => 'Tenant',
            'placeholder' => 'Select tenant',
            'help' => 'Choose the tenant to set as default for all URLs.',
        ],
    ],
];
