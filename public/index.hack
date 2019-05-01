require_once __DIR__.'/../boot/app.hack';

use type Ytake\Hungrr\ServerRequestFactory;
use namespace HH\Lib\Experimental\IO;

<<__EntryPoint>>
function main(): void {
  $app = bootApp();
  $app->run(ServerRequestFactory::fromGlobals());
}
