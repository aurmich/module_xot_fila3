<?php

return [
    /*
    |--------------------------------------------------------------------------
    | MCP Servers Configuration
    |--------------------------------------------------------------------------
    |
    | Configurazione dei server MCP disponibili nel sistema.
    | Ogni server ha un comando e argomenti specifici.
    |
    */

    'servers' => [
        'filesystem' => [
            'command' => 'npx',
<<<<<<< HEAD
<<<<<<< HEAD
            'args' => ['-y', '@modelcontextprotocol/server-filesystem'],
=======
            'args' => ['-y', '@modelcontextprotocol/server-filesystem']
>>>>>>> 89d0c8f4 (.)
        ],
        'memory' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-memory']
        ],
        'fetch' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-fetch']
        ],
        'mysql' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-mysql']
        ],
        'redis' => [
            'command' => 'npx',
<<<<<<< HEAD
            'args' => ['-y', '@modelcontextprotocol/server-redis'],
        ],
=======
            'args' => ['-y', '@modelcontextprotocol/server-filesystem']
        ],
        'memory' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-memory']
        ],
        'fetch' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-fetch']
        ],
        'mysql' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-mysql']
        ],
        'redis' => [
            'command' => 'npx',
            'args' => ['-y', '@modelcontextprotocol/server-redis']
        ]
>>>>>>> e697a77b (.)
=======
            'args' => ['-y', '@modelcontextprotocol/server-redis']
        ]
>>>>>>> 89d0c8f4 (.)
    ],

    /*
    |--------------------------------------------------------------------------
    | MCP Model Contexts
    |--------------------------------------------------------------------------
    |
    | Definizione dei contesti per i modelli del sistema.
    | Ogni contesto definisce trait, relazioni e validazioni richieste.
    |
    */

    'contexts' => [
        'User' => [
            'type' => 'base',
            'traits' => [
                'HasFactory',
                'Notifiable',
<<<<<<< HEAD
<<<<<<< HEAD
                'HasParent',
=======
                'HasParent'
>>>>>>> 89d0c8f4 (.)
            ],
            'relationships' => [
                'doctor',
                'patient'
            ],
            'table' => 'users',
<<<<<<< HEAD
            'type_column' => 'type',
=======
                'HasParent'
            ],
            'relationships' => [
                'doctor',
                'patient'
            ],
            'table' => 'users',
            'type_column' => 'type'
>>>>>>> e697a77b (.)
=======
            'type_column' => 'type'
>>>>>>> 89d0c8f4 (.)
        ],
        'Doctor' => [
            'extends' => 'User',
            'type' => 'child',
            'traits' => [
<<<<<<< HEAD
<<<<<<< HEAD
                'HasParent',
=======
                'HasParent'
>>>>>>> e697a77b (.)
=======
                'HasParent'
>>>>>>> 89d0c8f4 (.)
            ],
            'context' => 'medical',
            'validations' => [
                'medical_license',
<<<<<<< HEAD
<<<<<<< HEAD
                'specialization',
            ],
=======
                'specialization'
            ]
>>>>>>> e697a77b (.)
=======
                'specialization'
            ]
>>>>>>> 89d0c8f4 (.)
        ],
        'Patient' => [
            'extends' => 'User',
            'type' => 'child',
            'traits' => [
<<<<<<< HEAD
<<<<<<< HEAD
                'HasParent',
=======
                'HasParent'
>>>>>>> e697a77b (.)
=======
                'HasParent'
>>>>>>> 89d0c8f4 (.)
            ],
            'context' => 'medical',
            'validations' => [
                'health_insurance',
<<<<<<< HEAD
<<<<<<< HEAD
                'medical_history',
            ],
        ],
=======
                'medical_history'
            ]
        ]
>>>>>>> e697a77b (.)
=======
                'medical_history'
            ]
        ]
>>>>>>> 89d0c8f4 (.)
    ],

    /*
    |--------------------------------------------------------------------------
    | MCP Validation Rules
    |--------------------------------------------------------------------------
    |
    | Regole di validazione per i contesti dei modelli.
    |
    */

    'validation' => [
        'strict' => true,
        'log_violations' => true,
<<<<<<< HEAD
<<<<<<< HEAD
        'throw_exceptions' => false,
    ],
=======
        'throw_exceptions' => false
    ]
>>>>>>> e697a77b (.)
=======
        'throw_exceptions' => false
    ]
>>>>>>> 89d0c8f4 (.)
];
