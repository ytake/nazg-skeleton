<?hh

namespace AppTest;

use type Psr\Http\Server\RequestHandlerInterface;
use type Psr\Http\Message\ResponseInterface;
use type Psr\Http\Message\ServerRequestInterface;
use type Zend\Diactoros\Response\JsonResponse;

class AppStubRequestHandler implements RequestHandlerInterface {
  public function handle(
    ServerRequestInterface $request
  ): ResponseInterface {
    return new JsonResponse([]);
  }
}
