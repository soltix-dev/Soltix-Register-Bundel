<?php

/**
 * Register Controller
 *
 * @author  Soltix <soltix@soltix.pl>
 * @license proprietary // @cs-ignore
 */

declare(strict_types=1);

namespace Soltix\Bundle\Register\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

#[Route(
    name: 'app_soltix_'
)]
class RegisterController extends AbstractController
{


    /**
     * API Method for persisting UserInterface
     *
     * @param Request $request Symfony Request
     *
     * @return JsonResponse
     */
    #[Route(
        path: '/api/register',
        name: 'register'
    )]
    public function register(Request $request): JsonResponse
    {
        $userType = $request->get('role');

        if (isset($userType) === true) {
            // Get all user instances from config.
            $userInstances = $this->getParameter('soltix_register.userInstances');
            // Define variable for current user instance.
            $userInstance = null;

            // Check $userType in $userInstances.
            foreach ($userInstances as $instance) {
                /*
                 * Instance should be like \App\Entity\User,
                 * instance will be parsed to 'user' string and compared
                 * with string from request, which has 'role' key.
                 */

                $instanceArray = explode('\\', $instance);
                $entityName    = end($instanceArray);

                if ($entityName === $userType) {
                    $userInstance = $instance;
                }
            }

            // Create user class.
            if ($userInstance !== null) {
                $user = $userInstance();

                // Check if User instanceof default UserInterface.
                if ($user instanceof UserInterface) {
                    // Place to parsing class attributes and passing values from request.
                }//end if
            }//end if
        }//end if

        return (new JsonResponse(['message' => '']))
            ->setStatusCode(404);

    }//end register()


}//end class
