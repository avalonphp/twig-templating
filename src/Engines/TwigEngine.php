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

namespace Radium\Templating\Engines;

use Twig_Environment;
use Twig_Loader_Filesystem;
use Radium\Templating\EngineInterface;

/**
 * Twig template rendering engine.
 */
class TwigEngine implements EngineInterface
{
    /**
     * @var Twig_Environment
     */
    protected $twig;

    /**
     * @var object
     */
    protected $loader;

    /**
     * @param object $loader
     */
    public function __construct($loader = null)
    {
        if ($loader === null) {
            $loader = new Twig_Loader_Filesystem;
        }

        $this->loader = $loader;
        $this->twig   = new Twig_Environment($this->loader);
    }

    /**
     * @return string
     */
    public function name()
    {
        return 'twig';
    }

    /**
     * Adds a global variable for all templates.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function addGlobal($name, $value)
    {
        $this->twig->addGlobal($name, $value);
    }

    /**
     * Adds a template path to search in.
     *
     * @param string|array $path
     */
    public function addPath($path, $prepend = false)
    {
        if ($prepend) {
            $this->loader->prependPath($path);
        } else {
            $this->loader->addPath($path);
        }
    }

    /**
     * @param string $template
     * @param array  $locals
     *
     * @return string
     */
    public function render($template, array $locals = [])
    {
        return $this->twig->render($template, $locals);
    }

    /**
     * Checks if the engine can render the template.
     *
     * @param string $template
     *
     * @return bool
     */
    public function supports($template)
    {
        $extension = pathinfo($template, \PATHINFO_EXTENSION);
        return in_array($extension, ['twig', 'html']);
    }

    /**
     * Checks if the template exists.
     *
     * @param string $template
     *
     * @return bool
     */
    public function exists($template)
    {
        return $this->supports($template) && $this->loader->exists($template);
    }

    /**
     * @return Twig_Enviornent
     */
    public function twig()
    {
        return $this->twig;
    }

    /**
     * @return object
     */
    public function loader()
    {
        return $this->loader;
    }
}
