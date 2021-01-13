<?php

return [

    'sidebarLinks' => [
        [
            'route' => 'result.create',
            'method' => 'create',
            'model' => 'App\Result',
            'label' => 'Прочитать лицо модели'
        ],
        [
            'route' => 'result.index',
            'method' => 'viewAny',
            'model' => 'App\Result',
            'label' => 'Чтение лиц (все)'
        ],
        [
            'route' => 'result.forModeration',
            'method' => 'viewForModeration',
            'model' => 'App\Result',
            'label' => 'Чтение лиц (для модерации)'
        ],
        [
            'route' => 'result.moderated',
            'method' => 'viewAny',
            'model' => 'App\Result',
            'label' => 'Чтение лиц (модерированные)'
        ],
        [
            'route' => 'person.create',
            'method' => 'create',
            'model' => 'App\Person',
            'label' => 'Добавить Модель'
        ],
        [
            'route' => 'person.index',
            'method' => 'viewAny',
            'model' => 'App\Person',
            'label' => 'Модели (все)'
        ],
        [
            'route' => 'person.forModeration',
            'method' => 'viewForModeration',
            'model' => 'App\Person',
            'label' => 'Модели (для модерации)'
        ],
        [
            'route' => 'result.mineAll',
            'method' => 'mine',
            'model' => 'App\Result',
            'label' => 'Мои оценки'
        ],
        [
            'route' => 'result.mine',
            'method' => 'mine',
            'model' => 'App\Result',
            'label' => 'Мои результаты'
        ],
        [
            'route' => 'user.index',
            'method' => 'viewAny',
            'model' => 'App\User',
            'label' => 'Пользователи'
        ],

    ],

    'userRoles' => ['user' => 'Пользователь', 'moderator' => 'Модератор', 'admin' => 'Администратор'],
    'genderForSelect' => [true => 'м', false => 'ж']

];
