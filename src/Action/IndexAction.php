<?hh // strict

namespace App\Action;

use App\Responder\IndexResponder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Interop\Http\Server\MiddlewareInterface;
use Interop\Http\Server\RequestHandlerInterface;

final class IndexAction implements MiddlewareInterface {

  public function __construct(private IndexResponder $responder) {}

  public function process(
    ServerRequestInterface $request,
    RequestHandlerInterface $handler,
  ): ResponseInterface {
    return $this->responder->response();
  }
}
