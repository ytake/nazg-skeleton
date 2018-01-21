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
use Nazg\Foundation\Application;
use Ytake\HHConfigAggreagator\ArrayProvider;
use Ytake\HHConfigAggreagator\ConfigAggreagator;
use Ytake\HHConfigAggreagator\PhpFileProvider;
use Zend\Diactoros\ServerRequestFactory;

require __DIR__.'/../vendor/hh_autoload.php';
call_user_func(
  function() {
    $aggregator = new ConfigAggreagator(
      [
        new PhpFileProvider(
          __DIR__.'/../config/{{,*.}global,{,*.}local}.{hh,php}',
        ),
      ],
      __DIR__.'/../storages/config/cached.config.php',
    );
    $app = new Application(new \Nazg\Foundation\Dependency\Dependency());
    $app->setApplicationConfig($aggregator->getMergedConfig());
    $app->run(ServerRequestFactory::fromGlobals());
  },
);
