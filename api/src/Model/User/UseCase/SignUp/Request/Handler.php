<?php

declare(strict_types=1);

namespace Api\Model\User\UseCase\SignUp\Request;


use Api\Model\Flusher;
use Api\Model\User\Entity\User\Email;
use Api\Model\User\Entity\User\User;
use Api\Model\User\Entity\User\UserId;
use Api\Model\User\Entity\User\UserRepository;
use Api\Model\User\Service\ConfirmTokenizer;
use Api\Model\User\Service\PasswordHasher;

class Handler
{

    private $users;
    private $hasher;
    private $tokenizer;
    private $flusher;

    public function __construct(
        UserRepository $users,
        PasswordHasher $hasher,
        ConfirmTokenizer $tokenizer,
        Flusher $flusher
    )
    {
        $this->users = $users;
        $this->hasher = $hasher;
        $this->tokenizer = $tokenizer;
        $this->flusher = $flusher;
    }

    public function handler(Command $command): void
    {
        $email = new Email($command->email);

        if ($this->users->hasByEmail($email)) {
            throw new \DomainException('Пользователь с таким email уже есть.');
        }

        $user = new User(
            UserId::next(),
            new \DateTimeImmutable(),
            $email,
            $this->hasher->hash($command->password),
            $token = $this->tokenizer->generate()
        );

        $this->users->add($user);
        $this->flusher->flush();
    }

}