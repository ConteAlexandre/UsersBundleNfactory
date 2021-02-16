<?php

namespace App\UsersBundleNfactory\Model;

use App\UsersBundleNfactory\Model\Traits\EnabledEntityTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Blameable\Traits\BlameableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class UserBundle
 *
 * @ORM\Table(name="user_nfactory")
 */
abstract class UserBundle implements UserInterface
{
    use TimestampableEntity,
        BlameableEntity,
        EnabledEntityTrait;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @Assert\Length(
     *     min=4,
     *     minMessage="The username must be do {{ limit }} characters",
     *     max=80,
     *     maxMessage="The username must not be do {{ limit }} characters",
     * )
     *
     * @ORM\Column(name="username", type="string", length=80)
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
     * @Assert\NotBlank()
     * @Assert\Email()
     *
     * @ORM\Column(name="email", type="string", length=150)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    protected $password;

    /**
     * @var string
     *
     * @Assert\Regex(
     *     pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&-+=()])(?=\\S+$).{8}$”,
     *     message="The password must do contains minimum one number, one lower case, one upper case and minimum 8 characters"
     * )
     */
    protected $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="reset_token", type="string", length=255, nullable=true)
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
     * @ORM\Column(name="roles", type="json")
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
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
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
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
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
        $this->plainPassword = null;
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