namespace App\Action;

use type HH\Lib\Experimental\IO\WriteHandle;
use type Facebook\Experimental\Http\Message\ResponseInterface;
use type Facebook\Experimental\Http\Message\ServerRequestInterface;
use type Nazg\Http\Server\MiddlewareInterface;
use type Nazg\Http\Server\RequestHandlerInterface;
use type Ytake\Hungrr\Response\JsonResponse;

final class IndexAction implements MiddlewareInterface {

  public function process(
    WriteHandle $writeHandle,
    ServerRequestInterface $request,
    RequestHandlerInterface $handler,
  ): ResponseInterface {
    $writeHandle->rawWriteBlocking(
      \json_encode(dict['framework' => 'nazg'])
    );
    return new JsonResponse($writeHandle);
  }
}
