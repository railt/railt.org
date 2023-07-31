<?php

namespace App\Domain;

class NotFound extends Documentation
{
    public function __construct()
    {
        parent::__construct('Not Found', '', '
            <h1 style="text-align: center">Page Not Found</h1>
        ');
    }
}
