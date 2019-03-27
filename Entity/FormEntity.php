<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 3.12.18
 * Time: 15.34
 */

namespace Vaderlab\EAV\Form\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vaderlab\EAV\Core\Entity\BaseEntityTrait;

/**
 * @ORM\Entity(repositoryClass="Vaderlab\EAV\Form\Repository\FormEntityRepository")
 * @ORM\Cache(usage="READ_WRITE", region="model_region")
 * @ORM\HasLifecycleCallbacks()
 */
class FormEntity
{
    use BaseEntityTrait;

    /**
     * @var \DateTime
     * @ORM\Column( name="created_at", type="datetime", nullable=false )
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     * @ORM\Column( name="updated_at", type="datetime", nullable=true )
     */
    private $updatedAt;

    /**
     * @var Collection
     * @ORM\OneToMany(
     *     targetEntity="FormAttribute",
     *     mappedBy="form",
     *     fetch="EAGER",
     *     cascade={"all"}
     *     )
     */
    private $attributes;

    /**
     * @var string
     * @ORM\Column( name="title", type="string", length=128 nullable=false )
     */
    private $title;

    /**
     * @var string
     * @ORM\Column( name="slug", type="string", length=128 nullable=false, unique=true )
     */
    private $slug;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->attributes = new ArrayCollection();
    }

    /**
     * @ORM\PrePersist()
     * @throws \Exception
     */
    public function prePersist()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @ORM\PreUpdate()
     * @throws \Exception
     */
    public function preUpdate()
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @param Collection $attributes
     * @return $this
     */
    public function setAttributes(Collection $attributes): FormEntity
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): FormEntity
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug): FormEntity
    {
        $this->slug = $slug;

        return $this;
    }
}