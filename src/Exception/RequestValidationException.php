<?php
declare(strict_types=1);

namespace Prugala\RequestDto\Exception;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class RequestValidationException extends BadRequestHttpException
{
    private ConstraintViolationListInterface $violationList;

    public function __construct(ConstraintViolationListInterface $violationList)
    {
        parent::__construct('Request validation failed');
        $this->violationList = $violationList;
    }

    public function getViolationList(): ConstraintViolationListInterface
    {
        return $this->violationList;
    }

    public function getStatusCode(): int
    {
        return 400;
    }
}
