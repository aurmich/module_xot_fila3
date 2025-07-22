<?php

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
declare(strict_types=1);

return [
    'actions' => [
        'authenticate' => [
            'label' => 'Authenticate',
            'help' => 'Authenticate the user for this tenant',
        ],
        'login' => [
            'label' => 'Login',
            'help' => 'Login to your tenant account',
        ],
        'request' => [
            'label' => 'Request',
            'help' => 'Request tenant access',
        ],
        'test' => [
            'label' => 'Test',
            'help' => 'Test tenant configuration',
>>>>>>> 560b5e9 (.)
        ],
    ],
    'fields' => [
        'email' => [
<<<<<<< HEAD
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
        ],
    ],
];
=======
return array (
  'actions' => 
  array (
    'authenticate' => 
    array (
      'label' => 'authenticate',
    ),
    'login' => 
    array (
      'label' => 'login',
    ),
    'request' => 
    array (
      'label' => 'request',
    ),
    'test' => 
    array (
      'label' => 'test',
    ),
  ),
  'fields' => 
  array (
    'email' => 
    array (
      'label' => 'email',
      'description' => 'email',
      'helper_text' => '',
      'placeholder' => 'email',
    ),
    'password' => 
    array (
      'label' => 'password',
      'description' => 'password',
      'helper_text' => '',
      'placeholder' => 'password',
    ),
    'remember' => 
    array (
      'label' => 'remember',
      'description' => 'remember',
      'helper_text' => '',
      'placeholder' => 'remember',
    ),
    'cap' => 
    array (
      'description' => 'cap',
      'helper_text' => 'cap',
      'placeholder' => 'cap',
      'label' => 'cap',
    ),
    'city' => 
    array (
      'description' => 'city',
    ),
  ),
);
>>>>>>> e4cf0bb (.)
=======
            'label' => 'Email',
            'description' => 'User email address',
            'helper_text' => 'Enter your email address',
            'placeholder' => 'Email',
        ],
        'password' => [
            'label' => 'Password',
            'description' => 'User password',
            'helper_text' => 'Enter your password',
            'placeholder' => 'Password',
        ],
        'remember' => [
            'label' => 'Remember me',
            'description' => 'Keep me logged in',
            'helper_text' => 'Check to stay logged in',
            'placeholder' => '',
        ],
        'cap' => [
            'label' => 'Postal Code',
            'description' => 'Postal code for the address',
            'helper_text' => 'Enter your postal code',
            'placeholder' => 'Postal code',
        ],
        'city' => [
            'label' => 'City',
            'description' => 'City of residence',
            'helper_text' => 'Enter your city',
            'placeholder' => 'City',
        ],
    ],
};
>>>>>>> 560b5e9 (.)
