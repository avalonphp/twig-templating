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

/**
 * HTML helper for Twig.
 *
 * @author Jack Polgar <jack@polgar.id.au>
 */
class HTML extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'html';
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('link_to', ['Radium\Helpers\HTML', 'link']),
            new Twig_SimpleFunction('link_to_unless_current', ['Radium\Helpers\HTML', 'linkToUnlessCurrent']),
            new Twig_SimpleFunction('css_link_tag', ['Radium\Helpers\HTML', 'cssLinkTag']),
            new Twig_SimpleFunction('js_inc_tag', ['Radium\Helpers\HTML', 'jsIncTag'])
        ];
    }
}
