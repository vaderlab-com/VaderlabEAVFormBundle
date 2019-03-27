<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 2018-12-14
 * Time: 00:35
 */

namespace Vaderlab\EAV\Form\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Vaderlab\EAV\Form\Entity\FormAttribute;
use Vaderlab\EAV\Form\Entity\FormEntity;
use Vaderlab\EAV\Form\Repository\FormEntityRepository;


class EntityFormType extends AbstractType
{
    /**
     * @var FormEntityRepository
     */
    private $formRepository;

    /**
     * EntityFormType constructor.
     * @param FormEntityRepository $formRepository
     */
    public function __construct(FormEntityRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, [ $this, 'onPreSetDataCallback' ]);

        $formEntity = $this->getFormEntity($options['form_slug']);
        $attributes = $formEntity->getAttributes();
        /**
         * @var FormAttribute $attribute
         */
        foreach ($attributes->getIterator() as $it => $attribute) {
            $builder->add(
                $attribute->getFieldName(),
                $attribute->getAttibuteType(),
                [
                    'title' => $attribute->getName(),
                    'placeholder'   => $attribute->getPlaceholder(),
                ]
            );
        }
    }

    /**
     * @param FormEvent $event
     */
    public function onPreSetDataCallback(FormEvent $event)
    {
        $entity = $event->getData();
    }

    /**
     * @param string $slug
     * @return FormEntity
     */
    public function getFormEntity(string $slug): FormEntity
    {
        return $this->formRepository->findBySlug($slug);
    }
}