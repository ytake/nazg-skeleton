require_once __DIR__.'/../vendor/hh_autoload.hh';

use type Nazg\Glue\ContainerBuilder;
use namespace App\Config;
use namespace Nazg\Foundation;
use namespace HH\Lib\Experimental\IO;

function bootApp(): Foundation\Application {
  $builder = new ContainerBuilder();
  list($read, $write) = IO\pipe_non_disposable();
  $config = new Config\ApplicationConfig();
  $config->setRoutes(
    (new Config\RouteConfig())->getConfiguration()
  );
  $config->setServiceProviders(
    (new Config\ProviderConfig())->getConfiguration()
  );
  $config->setLogConfig(
    shape(
      'logfile' => realpath(__DIR__ . '/../storages/logs/app.log'),
      'logname' => 'applog'
    )
  );
  $app = new Foundation\Application(
    $builder->make(),
    $read,
    $write
  );
  return $app->build($config);
}
