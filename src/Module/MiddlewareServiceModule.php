<?hh // strict

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
namespace App\Module;

use Psr\Log\LoggerInterface;
use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;
use Nazg\Http\HttpMethod;
// use Nazg\Middleware\SimpleCorsMiddleware;
// use Nazg\Middleware\LogExceptionMiddleware;

final class MiddlewareServiceModule extends ServiceModule {
  <<__Override>>
  public function provide(FactoryContainer $container): void {
    /** include basic middlewares
    // for simple cors middleware
    $container->set(
      SimpleCorsMiddleware::class,
      $container ==> new SimpleCorsMiddleware(shape(
       'origin' => '*',
       'header' => 'testing',
       'methods' => Vector{
         HttpMethod::GET
        }
      )),
    );
    // for log exception middleware
    $container->set(
      LogExceptionMiddleware::class,
      $container ==> new LogExceptionMiddleware(
        $this->invariantLoggerInterface($container)
      ),
    );
    */
  }

  private function invariantLoggerInterface(
    FactoryContainer $container,
  ): LoggerInterface {
    $logger = $container->get(LoggerInterface::class);
    invariant(
      $logger instanceof LoggerInterface,
      "Interface '\Psr\Log\LoggerInterface' is not implemented by this class",
    );
    return $logger;
  }
}
