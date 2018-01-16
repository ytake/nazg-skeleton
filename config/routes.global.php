<?hh

return [
  \Nazg\Foundation\Service::ROUTES => ImmMap{
    \Nazg\Http\HttpMethod::GET => ImmMap {
      '/' => App\Action\IndexAction::class,
    },
  }
];
