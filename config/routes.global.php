<?hh // partial

use type Facebook\Experimental\Http\Message\HTTPMethod;

/**
 * routes type
 *  * @see \App\Config\RoutesType
 */

return dict[
  'routes' => dict[
    HTTPMethod::GET => ImmMap{
      '/' => shape(
        'middleware' => vec[
          \App\Action\IndexAction::class,
        ],
      )
    }
  ]
];
