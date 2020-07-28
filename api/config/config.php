<?php

declare(strict_types=1);

use Api\Http\Action\HomeAction;

return [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => (bool) getenv('API_DEBUG'),
    ],

    HomeAction::class => function () {
        return new HomeAction();
    }
];