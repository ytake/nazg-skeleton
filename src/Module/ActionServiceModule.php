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

use App\Action\IndexAction;
use App\Responder\IndexResponder;
use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;

final class ActionServiceModule extends ServiceModule {

  public function provide(FactoryContainer $container): void {
    $container->set(
      IndexAction::class,
      $container ==> new IndexAction(new IndexResponder()),
      Scope::PROTOTYPE,
    );
  }
}
