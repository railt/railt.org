<?php

declare(strict_types=1);

namespace App\Controller;

use Twig\Environment;

abstract class Controller
{
    public function __construct(
        protected readonly Environment $view,
    ) {
    }
}
