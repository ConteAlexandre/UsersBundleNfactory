<?php
/*
 * This file is part of the YesWeHack JobBoards
 *
 * (c) Guillaume Vassault-Houlière <g.vassaulthouliere@yeswehack.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\UsersBundleNfactory\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UsersBundleController
 * 
 * @Route("/allo", name="test")
 */
class UsersBundleController extends AbstractController
{
    /**
     * @Route()
     *
     * @return Response
     */
    public function test()
    {
        return $this->render('@UsersTest/test.html.twig');
    }
}