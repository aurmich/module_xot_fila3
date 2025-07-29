<?php

<<<<<<< HEAD
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
=======
return [
    'actions' => [
        'authenticate' => [
            'label' => 'authenticate',
        ],
        'login' => [
            'label' => 'login',
        ],
        'request' => [
            'label' => 'request',
        ],
    ],
    'fields' => [
        'email' => [
            'label' => 'email',
            'description' => 'email',
            'helper_text' => '',
            'placeholder' => 'email',
        ],
        'password' => [
            'label' => 'password',
            'description' => 'password',
            'helper_text' => '',
            'placeholder' => 'password',
        ],
        'remember' => [
            'label' => 'remember',
            'description' => 'remember',
            'helper_text' => '',
            'placeholder' => 'remember',
        ],
        'cap' => [
            'description' => 'cap',
            'helper_text' => 'cap',
            'placeholder' => 'cap',
            'label' => 'cap',
        ],
        'city' => [
            'description' => 'city',
>>>>>>> 5bb5e55 (.)
        ],
    ],
];
