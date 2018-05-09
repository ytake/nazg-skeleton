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

use Nazg\Cache\Driver;
use Nazg\Cache\CacheConfiguration;
use Nazg\Foundation\Service;
use Ytake\HHContainer\Scope;
use Ytake\HHContainer\ServiceModule;
use Ytake\HHContainer\FactoryContainer;

final class CacheServiceModule extends \Nazg\Cache\CacheServiceModule {

  <<__Override>>
  public function provide(FactoryContainer $container): void {
    $config = $container->get(Service::CONFIG);
    if (\is_array($config)) {
      $this->defaultDriver = $config[Service::CACHE]['driver'];
    }
    parent::provide($container);
  }

  <<__Override>>
  protected function cacheConfigure(FactoryContainer $container): CacheConfiguration {
    $config = $container->get(Service::CONFIG);
    if (\is_array($config)) {
      $drivers = $config[Service::CACHE]['drivers'];
      return new CacheConfiguration(
        $drivers[Driver::Memcached],
        $drivers[Driver::File],
        $drivers[Driver::Redis],
      );
    }
    return new CacheConfiguration();
  }
}
