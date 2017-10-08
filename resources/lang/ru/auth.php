<?php
/**
 * This file is part of id.laravel.su package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

return [
    'title' => [
        'main'   => 'Аутентификация',
        'form'   => 'Вход',
        'social' => 'Войти с помощью',
    ],

    'form' => [
        'email'    => 'Email',
        'password' => 'Пароль',

        'remember'     => 'Запомнить меня',
        'reset'        => 'Забыли пароль?',

        'submit'       => 'Войти',
    ],

    'registration' => 'Ещё нет аккаунта?',

    'footer' => 'Нажимая кнопку входа через соцсеть, вы принимаете условия ' .
        '<a target="_blank" href=":rules_action">Пользовательского соглашения</a>.',

    'errors' => [
        'email'    => 'Пользователя с указанным Email не существует.',
        'password' => 'Указан неверный пароль (возможно вы регистрировались с помощью OAuth?).',
    ],
];
