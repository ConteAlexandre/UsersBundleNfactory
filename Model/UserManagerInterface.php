<?php


namespace App\UsersBundleNfactory\Model;

/**
 * Interface UserManagerInterface
 *
 * @package App\UsersBundleNfactory\Model
 */
interface UserManagerInterface
{
    /**
     * Crate an empty user instance
     * 
     * @return UserBundle
     */
    public function createUser(): UserBundle;

    /**
     * Update password for user instance
     *
     * @param UserBundle $user
     *
     * @return mixed
     */
    public function updatePassword(UserBundle $user);

    /**
     * Return the user's fully qualified class name
     *
     * @return string
     */
    public function getClass(): string;

    /**
     * @param UserBundle $user
     * @param bool          $andFlush
     *
     * @return mixed
     */
    public function save(UserBundle $user, $andFlush = true);
}