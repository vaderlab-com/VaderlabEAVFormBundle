<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 2018-12-14
 * Time: 00:34
 */

namespace Vaderlab\EAV\Form\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vaderlab\EAV\Core\Entity\BaseEntityTrait;

/**
 * Class FormAttribute
 * @package Vaderlab\EAV\Form\Entity
 * @ORM\Entity()
 */
class FormAttribute
{
    use BaseEntityTrait;

    /**
     * @var FormEntity
     * @ORM\ManyToOne(
     *     targetEntity="FormEntity",
     *     inversedBy="attributes",
     *     fetch="LAZY"
     * )
     * @ORM\JoinColumn(
     *     name="form_id",
     *     referencedColumnName="id",
     *     nullable=false
     * )
     */
    private $form;

    /**
     * @var string
     * @ORM\Column(
     *     name="name"
     *     type="string",
     *     length=256,
     *     nullable=false
     * )
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(
     *     name="attibute_type",
     *     type="string",
     *     length=256,
     *     nullable=false
     * )
     */
    private $attibuteType;

    /**
     * @var string
     * @ORM\Column(
     *     name="field_name",
     *     type="string",
     *     length=256,
     *     nullable=false
     * )
     */
    private $fieldName;

    /**
     * @var string
     * @ORM\Column(
     *     name="value_type",
     *     type="string",
     *     length=256,
     *     nullable=false
     * )
     */
    private $valueType;

    /**
     * @var string
     * @ORM\Column(
     *     name="placeholder",
     *     type="string",
     *     length=256
     * )
     */
    private $placeholder;

    /**
     * @return FormEntity
     */
    public function getForm(): FormEntity
    {
        return $this->form;
    }

    /**
     * @param FormEntity $form
     * @return $this
     */
    public function setForm(FormEntity $form): FormAttribute
    {
        $this->form = $form;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): FormAttribute
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getValueType(): ?string
    {
        return $this->valueType;
    }

    /**
     * @param string $valueType
     * @return $this
     */
    public function setValueType(string $valueType): FormAttribute
    {
        $this->valueType = $valueType;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttibuteType(): ?string
    {
        return $this->attibuteType;
    }

    /**
     * @param string $attibuteType
     * @return $this
     */
    public function setAttibuteType(string $attibuteType): FormAttribute
    {
        $this->attibuteType = $attibuteType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFieldName(): ?string
    {
        return $this->fieldName;
    }

    /**
     * @param string $fieldName
     * @return $this
     */
    public function setFieldName(string $fieldName): FormAttribute
    {
        $this->fieldName = $fieldName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string $placeholder
     * @return $this
     */
    public function setPlaceholder(string $placeholder): FormAttribute
    {
        $this->placeholder = $placeholder;

        return $this;
    }
}