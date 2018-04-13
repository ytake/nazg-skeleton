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
use Nazg\Http\HttpMethod;

return [
  \Nazg\Foundation\Service::ROUTES => ImmMap {
    /**
     * As Middleware, it needs to be implemented class.
     *
     * HttpMethod => ImmMap {
     *   'endpoint' => shape(
     *     'middleware' => ImmVector {
     *       MiddlewareClass::class, // \Interop\Http\Server\MiddlewareInterface implements Class
     *     } 
     *   )
     * }
     * 
     * use enum HttpMethod 
     * \Nazg\Http\HttpMethod::HEAD
     * \Nazg\Http\HttpMethod::GET
     * \Nazg\Http\HttpMethod::POST
     * \Nazg\Http\HttpMethod::PATCH
     * \Nazg\Http\HttpMethod::PUT
     * \Nazg\Http\HttpMethod::DELETE
     * 
     * Assigning Middleware To Route
     * 'endpoint' => shape(
     *   'middleware' => ImmVector{
     *     first - MiddlewareClass::class,
     *     second - RouteMiddlewareClass::class,
     *   }
     * ) 
     */
    HttpMethod::GET => ImmMap {
      '/' => shape(
        'middleware' => ImmVector {App\Action\IndexAction::class}
      ),
    },
  },
];
