<?php

namespace App\ArgumentResolver;

use App\DTO\ItemBeingAdded;
use InvalidArgumentException;
use App\Exception\ValidationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;

class ItemBeingAddedResolver implements ArgumentValueResolverInterface
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var Validator */
    private $validator;

    public function __construct(SerializerInterface $serializer, ValidatorInterface $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    public function supports(Request $request, ArgumentMetadata $argument) : bool
    {
        if ($argument->getType() !== ItemBeingAdded::class) {
            return false;
        }

        return true;
    }

    public function resolve(Request $request, ArgumentMetadata $argument) : \Generator
    {
        $data = $this->serializer->deserialize($request->getContent(), ItemBeingAdded::class, 'json');

        $errors = $this->validator->validate($data);

        if (count($errors)) {
            throw new ValidationException($errors);
        }

        yield $data;
    }
}