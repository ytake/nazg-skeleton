<?hh

use Nazg\Foundation\Application;
use Ytake\HHConfigAggreagator\ArrayProvider;
use Ytake\HHConfigAggreagator\ConfigAggreagator;
use Ytake\HHConfigAggreagator\PhpFileProvider;
use Zend\Diactoros\ServerRequestFactory;

require __DIR__ . '/../vendor/hh_autoload.php';
call_user_func(function() {
  $aggregator = new ConfigAggreagator([
    new PhpFileProvider(__DIR__ . '/../config/{{,*.}global,{,*.}local}.{hh,php}'),
  ]);
  $app = new Application(new \Nazg\Foundation\Dependency\Dependency());
  $app->setApplicationConfig($aggregator->getMergedConfig());
  $app->run(ServerRequestFactory::fromGlobals());
});
