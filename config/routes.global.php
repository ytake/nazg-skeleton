<?hh 

use Nazg\Foundation\Service;
use Nazg\Routing\HttpMethod;

return [
  Service::ROUTES => ImmMap{
    HttpMethod::GET => ImmMap {
      '/' => App\Action\IndexAction::class,
    },
  }
];
