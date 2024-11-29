<?php

declare(strict_types=1);

namespace App\Controller;

use App\Module\Response\Application\ResponseFacade;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ErrorController extends AbstractController
{

    private readonly ResponseFacade $responseFacade;

    public function __construct(
        ResponseFacade $responseFacade,
    ) {
        $this->responseFacade = $responseFacade;
    }

    public function notFound(): JsonResponse
    {
        return $this->responseFacade->errorJsonResponse('Not found');
    }

}
