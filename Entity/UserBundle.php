<?php

namespace App\UsersBundleNfactory\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class UserBundle
 *
 * @ORM\Table(name="user_nfactory")
 */
abstract class UserBundle implements UserInterface
{
    use TimestampableEntity,
        BlameableEntity;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string")
     */
    protected $username;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"username"})
     */
    protected $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string")
     */
    protected $password;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string")
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="reset_token", type="string", nullable=true)
     */
    protected $resetToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="request_password_at", type="datetime", nullable=true)
     */
    protected $requestPasswordAt;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array")
     */
    protected $roles = [];

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string $password
     *
     * @return $this
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getResetToken(): ?string
    {
        return $this->resetToken;
    }

    /**
     * @param string|null $resetToken
     *
     * @return $this
     */
    public function setResetToken(?string $resetToken): self
    {
        $this->resetToken = $resetToken;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequestPasswordAt(): ?\DateTimeInterface
    {
        return $this->requestPasswordAt;
    }

    /**
     * @param \DateTimeInterface $requestPasswordAt
     *
     * @return $this
     */
    public function setRequestPasswordAt(\DateTimeInterface $requestPasswordAt): self
    {
        $this->requestPasswordAt = $requestPasswordAt;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     *
     * @return $this
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     *
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string
     */
    public function getSalt(): string
    {
        return $this->salt;
    }

    /**
     * @param string $salt
     */
    public function setSalt(string $salt): void
    {
        $this->salt = $salt;
    }
}