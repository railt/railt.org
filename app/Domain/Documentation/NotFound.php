<?php

namespace App\Domain\Documentation;

class NotFound extends Page
{
    public function __construct()
    {
        parent::__construct('Not Found', '', '
            <h1 style="text-align: center">Page Not Found</h1>
        ');
    }
}
