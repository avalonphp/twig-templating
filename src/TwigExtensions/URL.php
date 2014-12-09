<?php
/*!
 * Radium
 * Copyright 2011-2014 Jack Polgar
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Radium\Templating\TwigExtensions;

use Twig_Extension;
use Twig_SimpleFunction;
use Radium\Routing\Router;
use Radium\Http\Request;

/**
 * URL helper for Twig.
 *
 * @author Jack Polgar <jack@polgar.id.au>
 */
class URL extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'url';
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('path', [$this, 'path'], ['is_safe' => ['html']])
        ];
    }

    /**
     * Returns the compiled path for the route.
     *
     * @param string $routeName
     * @param array  $tokens
     *
     * @return string
     */
    public function path($routeName, array $tokens = [])
    {
        return Request::basePath(Router::generateUrl($routeName, $tokens));
    }
}
