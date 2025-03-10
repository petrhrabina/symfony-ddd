<?php

declare(strict_types=1);

namespace App\Controller;

use App\Module\Response\Application\ResponseFacade;
use App\Module\User\Application\UserFacade;
use App\Module\User\Domain\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserController extends AbstractController
{


    private readonly UserFacade $userFacade;
    private readonly ResponseFacade $responseFacade;

    public function __construct(
        UserFacade $userFacade,
        ResponseFacade $responseFacade,
    ) {
        $this->userFacade = $userFacade;
        $this->responseFacade = $responseFacade;
    }

    public function findAllUsers(): JsonResponse
    {
        return $this->responseFacade->successJsonResponse(
            implode(", ", $this->userFacade->findAllUsers())
        );
    }

}
