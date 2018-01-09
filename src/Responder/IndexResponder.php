<?hh

namespace App\Responder;

use Psr\Http\Message\ResponseInterface;
use Zend\Diactoros\Response\HtmlResponse;

final class IndexResponder {

  public function response(): ResponseInterface {
    return new HtmlResponse($this->welcome()->toString());
  }

  protected function welcome(): \xhp_html {
    return $this->layout();
  }

  protected function layout(): \xhp_html {
    return 
    <html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>Nazg</title>
    </head>
    <body>
    <div:index/>
    </body>
    </html>;    
  }
}
