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
use Nazg\Cache\Driver;

return [
  \Nazg\Foundation\Service::CACHE => [
    /*
     * Supported "apc", "map", "file", "memcached", "redis", "void"
     * Driver::Apc, Driver::Map, Driver::File, Driver::Memcached, Driver::Redis, Driver::void
     */
    'driver' => Driver::Memcached,

    'drivers' => [
      Driver::File => shape(
        'cacheStoreDir' => __DIR__ . '/../storages/cache/',
      ),
      Driver::Memcached => shape(
        'servers' => ImmVector{
          shape(
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        },
        // 'persistentId' => 'rename',
      ),
      Driver::Redis => shape(
        'host' => '127.0.0.1',
        'port' => 6379,
        'database' => 0,
        // 'password' => '', // optional
        // 'prefix' => '', // optional
        // 'readTimeout' => 1, // optional
        // 'persistent' => false, // optional
      ),
    ],
  ],
];
