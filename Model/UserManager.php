<?php

namespace App\UsersBundleNfactory\Model;

use Exception;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class UserManager
 */
abstract class UserManager implements UserManagerInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * UserManager constructor.
     *
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->passwordEncoder = $encoder;
    }

    /**
     * @return UserBundle
     */
    public function createUser(): UserBundle
    {
        $class = $this->getClass();
        $user = new $class();

        return $user;
    }

    /**
     * @param UserBundle $user
     *
     * @return mixed|void
     *
     * @throws Exception
     */
    public function updatePassword(UserBundle $user)
    {
        if (0 !== strlen($password = $user->getPlainPassword())) {
            $user->setSalt(rtrim(str_replace('+', '.', base64_encode(random_bytes(32))), '='));
            $user->setPassword($this->passwordEncoder->encodePassword($user, $user->getPlainPassword()));
            $user->eraseCredentials();
        }
    }
}