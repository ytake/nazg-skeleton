<?hh

/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 *
 * Copyright (c) 2017-2018 Yuuki Takezawa
 */
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
          <meta charset="utf-8" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge" />
          <meta
            name="viewport"
            content="width=device-width, initial-scale=1"
          />
          <title>Nazg</title>
        </head>
        <body>
          <div:index />
        </body>
      </html>;
  }
}
