<?php

use App\Entity\Repository\DocumentationRepository;
use App\Entity\Repository\ProvidesDocumentation;

Artisan::command('test', function () {
    /** @var DocumentationRepository $docs */
    $docs = app(DocumentationRepository::class);


    dd($docs->find(1));

});
