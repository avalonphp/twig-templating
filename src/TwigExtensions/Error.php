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
use Avalon\Database\Model\Base as BaseModel;

/**
 * Error helper for Twig.
 *
 * @author Jack Polgar <jack@polgar.id.au>
 */
class Error extends Twig_Extension
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'error';
    }

    /**
     * @return Twig_SimpleFunction[]
     */
    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('var_dump', 'var_dump', ['is_safe' => ['html']]),
            new Twig_SimpleFunction('translated_errors_for', [$this, 'translatedMessagesFor'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * Returns an array of non-translated model errors.
     *
     * @param BaseModel $model
     *
     * @return array
     */
    public function messagesFor(BaseModel $model)
    {
        $errors = [];

        foreach ($model->errors() as $field => $validations) {
            foreach ($validations as $error) {
                $errors[$field] = $error + [
                    'translationString' => "errors.validations.{$error['error']}"
                ];
            }
        }

        return $errors;
    }

    /**
     * Returns an array of translated model errors.
     *
     * @param BaseModel $model
     *
     * @return array
     */
    public function translatedMessagesFor(BaseModel $model)
    {
        $messages = [];

        foreach ($this->messagesFor($model) as $error) {
            $error['field'] = $this->translate($error['field']);
            $messages[] = $this->translate($error['translationString'], $error);
        }

        return $messages;
    }

    /**
     * Translate error message.
     *
     * @param string $string
     * @param array  $vars
     *
     * @return string
     */
    protected function translate($string, $vars = [])
    {
        return \Avalon\Language::translate($string, $vars);
    }
}
