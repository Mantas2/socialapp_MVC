<?php

declare(strict_types=1);

namespace App;

use App\Exceptions\ViewNotFoundException;

class View
{
    public function __construct(protected string $view, protected array $param = [])
    {
    }

    public function make()
    {
        $viewPath = VIEW_PATH . $this->view . '.php';

        if (file_exists($viewPath)) {
            extract($this->param);
            include $viewPath;

            //    echo '<pre>';
            //    var_dump($this->param);
            //    echo '</pre>';

        } else {
            throw new ViewNotFoundException();
        }
    }

    public function __get(string $name)
    {
        return $this->param[$name] ?? null;
    }
}