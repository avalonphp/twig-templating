<?php
/*!
 * Avalon
 * Copyright 2011-2015 Jack Polgar
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

namespace Avalon\Templating\TwigExtensions;

use Twig_Extension;
use Twig_SimpleFunction;
use Avalon\Helpers\Time as TimeHelper;

/**
 * Time helper for Twig.
 *
 * @author Jack Polgar <jack@polgar.id.au>
 */
class Time extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Time';
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('time_ago_in_words', [$this, 'agoInWords'])
        ];
    }

    /**
     * Returns time ago in words of the given date.
     *
     * @param string  $original
     * @param boolean $detailed
     *
     * @return string
     */
    public function agoInWords($original, $detailed = false)
    {
        return TimeHelper::agoInWords($original, $detailed);
    }
}
