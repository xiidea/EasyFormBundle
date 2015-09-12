<?php

namespace Xiidea\EasyFormBundle\Form\DataTransformer;


use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EntityToIdTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;
    /**
     * @var string
     */
    protected $class;

    public function __construct(ObjectManager $objectManager, $class)
    {
        $this->objectManager = $objectManager;
        $this->class = $class;
    }

    public function transform($entity)
    {
        if (null === $entity) {
            return null;
        }

        return $this->getId($entity);
    }

    public function getId($entity)
    {
        $meta = $this->objectManager->getClassMetadata(get_class($entity));
        $identifier = $meta->getIdentifierValues($entity);

        return $identifier[0];
    }

    public function reverseTransform($id)
    {
        if (!$id) {
            return null;
        }
        $entity = $this->objectManager
            ->getRepository($this->class)
            ->find($id);
        if (null === $entity) {
            throw new TransformationFailedException();
        }
        return $entity;
    }
}