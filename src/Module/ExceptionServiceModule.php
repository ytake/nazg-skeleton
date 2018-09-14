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

use type App\Exception\AppExceptionHandler;
use type Ytake\HHContainer\FactoryContainer;
use type Nazg\Response\Emitter;
use type Nazg\Exceptions\ExceptionHandleInterface;
use type Nazg\Foundation\Exception\ExceptionRegister;
use type Nazg\Foundation\Exception\ExceptionServiceModule as NazgExceptionServiceModule;

final class ExceptionServiceModule extends NazgExceptionServiceModule {
  <<__Override>>
  public function provide(FactoryContainer $container): void {
    $container->set(
      ExceptionHandleInterface::class,
      $container ==> new AppExceptionHandler(new Emitter()),
    );
    $container->set(
      ExceptionRegister::class,
      $container ==> new ExceptionRegister(
        $this->invariantExceptionHandler($container),
      ),
    );
  }
}
