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

/**
 * Form helper for Twig.
 *
 * @author Jack Polgar <jack@polgar.id.au>
 */
class Form extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'form';
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('form_label', ['Avalon\Helpers\Form', 'label'], ['is_safe' => ['html']]),

            // Fields
            new Twig_SimpleFunction('form_text_field', ['Avalon\Helpers\Form', 'text'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('form_password_field', ['Avalon\Helpers\Form', 'password'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('form_textarea', ['Avalon\Helpers\Form', 'textarea'], ['is_safe' => ['html']]),
            new Twig_SimpleFunction('form_select', ['Avalon\Helpers\Form', 'select'], ['is_safe' => ['html']]),

            // Buttons
            new Twig_SimpleFunction('form_submit', ['Avalon\Helpers\Form', 'submit'], ['is_safe' => ['html']])
        ];
    }
}
