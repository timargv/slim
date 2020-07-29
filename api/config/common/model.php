<?php

declare(strict_types=1);

use Api\Infrastructure\Model\User\Entity\DoctrineUserRepository;
use Api\Infrastructure\Model\User\Service\BCryptPasswordHasher;
use Api\Infrastructure\Model\User\Service\RandConfirmTokenizer;
use Api\Model\User\Entity\User\UserRepository;
use Api\Model\User\Service\ConfirmTokenizer;
use Api\Model\User\Service\PasswordHasher;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerInterface;

return [
    Api\Model\Flusher::class => function (ContainerInterface $container) {
        return new Api\Infrastructure\Model\Service\DoctrineFlusher(
            $container->get(EntityManagerInterface::class),
        );
    },

    PasswordHasher::class => function () {
        return new BCryptPasswordHasher();
    },

    UserRepository::class => function (ContainerInterface $container) {
        return new DoctrineUserRepository(
            $container->get(EntityManagerInterface::class)
        );
    },

    ConfirmTokenizer::class => function (ContainerInterface $container) {
        $interval = $container->get('config')['auth']['signup_confirm_interval'];
        return new RandConfirmTokenizer(new \DateInterval($interval));
    },

//    UserModel\Entity\User\UserRepository::class => function (ContainerInterface $container) {
//        return new UserInfrastructure\Entity\DoctrineUserRepository(
//            $container->get(\Doctrine\ORM\EntityManagerInterface::class)
//        );
//    },
//
//    UserModel\UseCase\SignUp\Request\Handler::class => function (ContainerInterface $container) {
//        return new UserModel\UseCase\SignUp\Request\Handler(
//            $container->get(UserModel\Entity\User\UserRepository::class),
//            $container->get(UserModel\Service\PasswordHasher::class),
//            $container->get(UserModel\Service\ConfirmTokenizer::class),
//            $container->get(Api\Model\Flusher::class)
//        );
//    },
//
//    UserModel\UseCase\SignUp\Confirm\Handler::class => function (ContainerInterface $container) {
//        return new UserModel\UseCase\SignUp\Confirm\Handler(
//            $container->get(UserModel\Entity\User\UserRepository::class),
//            $container->get(Api\Model\Flusher::class)
//        );
//    },

    'config' => [
        'auth' => [
            'signup_confirm_interval' => 'PT5M',
        ],
    ],
];