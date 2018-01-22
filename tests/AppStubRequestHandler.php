<?hh

namespace AppTest;

use Interop\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;

class AppStubRequestHandler implements RequestHandlerInterface {
  public function handle(
    ServerRequestInterface $request
  ): ResponseInterface {
    return new JsonResponse([]);
  }
}
