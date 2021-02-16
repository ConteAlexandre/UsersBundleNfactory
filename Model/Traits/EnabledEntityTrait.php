<?php

namespace App\UsersBundleNfactory\Model\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class EnabledEntityTrait
 */
trait EnabledEntityTrait
{
    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    protected $enabled;

    /**
     * @param bool $enabled
     *
     * @return $this
     */
    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }
}