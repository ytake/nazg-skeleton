namespace App\Action;

use type App\Responder\IndexResponder;
use type HH\Lib\Experimental\IO\WriteHandle;
use type Facebook\Experimental\Http\Message\ResponseInterface;
use type Facebook\Experimental\Http\Message\ServerRequestInterface;
use type Nazg\Http\Server\AsyncMiddlewareInterface;
use type Nazg\Http\Server\AsyncRequestHandlerInterface;

final class IndexAction implements AsyncMiddlewareInterface {

  public function __construct(
    private IndexResponder $responder
  ) {}

  public async function processAsync(
    WriteHandle $writeHandle,
    ServerRequestInterface $request,
    AsyncRequestHandlerInterface $_,
  ): Awaitable<ResponseInterface> {
    \var_dump($request->getServerParams());
    return await $this->responder
      ->invokeAsync($writeHandle, dict[
        'Nazg Hack Framework' => 'You have arrived.',
        'HHVM Version' => \phpversion()
      ]);
  }
}
