<?hh // partial

/**
 */
return dict[
  'logs' => shape(
    'logfile' => realpath(__DIR__ . '/../storages/logs/app.log'),
    'logname' => 'applog'
  )
];
