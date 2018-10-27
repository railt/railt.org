<?php

return [
    'sdl'         => <<<EOL
<p>
    The Railt mission provide a handy tool for
    writing and designing GraphQL servers using PHP.
</p>
<p>
    Unfortunately, <a href="https://facebook.github.io/graphql/draft/" target="_blank">modern specification</a>
    GraphQL and GraphQL SDL features are not always convenient to use and
    designing server applications.
</p>
<p>
    The <code>RL/SDL</code> language is completely backward compatible with the latest specification, however
    provides a large set of additional language tools.
</p>
EOL
    ,
    'open-source' => '
The Railt Framework is provided under the free MIT license.
Please note that you can safely use the product
even in commercial software without any restrictions.',
    'packages'    => [
        'sdl'       => '
A package that provides an independent implementation of the RL/SDL language,
which can be used separately from the framework.
        ',
        'router'    => '
Flexible declarative routing based on directive capabilities
of GraphQL SDL language.
        ',
        'discover'  => '
Component cross-package configuration of projects based on
composer.json syntax and Composer features.
        ',
        'parser'    => '
Independent implementation of the top-down LL(k) parser for
subsets of context-free LL grammars.
        ',
        'container' => '
Implementing a proxy DI based container
PSR-11, providing automatic linking (autowiring) capabilities.
        ',
        'lexer'     => '
The lexer component (tokenizer) providing
several implementations, including the lexertl driver.
        ',
    ],
];
