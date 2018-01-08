<?hh

namespace App\Responder;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

final class IndexResponder {

  public function response(): ResponseInterface {
    return new HtmlResponse($this->welcome()->toString());
  }

  protected function welcome(): \xhp_div {
    return <div>
      <h1>Nazg</h1>
      Begin developing HHVM/Hack Http Application / {phpversion()}
      </div>;
  }
}
