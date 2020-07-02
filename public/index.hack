require_once __DIR__.'/../boot/app.hack';

use type Ytake\Hungrr\ServerRequestFactory;
use namespace HH\Lib\Experimental\IO;

<<__EntryPoint>>
async function mainAsync(): Awaitable<void> {
   $app = await bootApp();
   await $app->runAsync(ServerRequestFactory::fromGlobals());
}
