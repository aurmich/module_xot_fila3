<?php return array (
  'navigation' => 
  array (
    'name' => 'Salute',
    'plural' => 'Salute',
    'group' => 
    array (
      'name' => 'Sistema',
      'description' => 'Monitoraggio dello stato del sistema',
    ),
    'sort' => 42,
    'label' => 'health.navigation',
    'icon' => 'xot-health',
  ),
  'pages' => 
  array (
    'health_check_results' => 
    array (
      'buttons' => 
      array (
        'refresh' => 'Refresh',
      ),
      'heading' => 'Application Health',
      'navigation' => 
      array (
        'group' => 'Settings',
        'label' => 'Application Health',
      ),
      'notifications' => 
      array (
        'check_results' => 'Check results from',
      ),
    ),
  ),
  'actions' => 
  array (
    'refresh' => 
    array (
      'label' => 'refresh',
    ),
  ),
);