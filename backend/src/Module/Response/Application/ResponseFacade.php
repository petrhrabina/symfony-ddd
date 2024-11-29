<?php

declare(strict_types=1);

namespace App\Module\Response\Application;

use App\Module\Response\Domain\ResponseService;
use App\Module\Response\Domain\ResponseStatusEnum;
use App\Module\Response\Infrastructure\ResponseJsonFactory;
use App\Module\Response\Infrastructure\ResponseServiceFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseFacade
{
    private readonly ResponseService $responseJsonService;
    private readonly ResponseJsonFactory $responseJsonFactory;

    public function __construct(
        ResponseServiceFactory $responseJsonServiceFactory,
        ResponseJsonFactory $responseJsonFactory,
    ) {
        $this->responseJsonService = $responseJsonServiceFactory->create();
        $this->responseJsonFactory = $responseJsonFactory;
    }


    public function successJsonResponse(string $message): JsonResponse
    {
        $response = $this->responseJsonService->json(
            $message,
            ResponseStatusEnum::SUCCESS,
        );

        return $this->responseJsonFactory->create($response);
    }

    public function errorJsonResponse(string $message): JsonResponse
    {
        $response = $this->responseJsonService->json(
            $message,
            ResponseStatusEnum::ERROR,
        );

        return $this->responseJsonFactory->create($response);
    }

}
