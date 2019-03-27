<?php
/**
 * Created by PhpStorm.
 * User: kost
 * Date: 2018-12-11
 * Time: 00:52
 */

namespace Vaderlab\EAV\Form\Repository;


use Doctrine\ORM\EntityRepository;
use Vaderlab\EAV\Form\Entity\FormEntity;

class FormEntityRepository extends EntityRepository
{
    /**
     * @param string $slug
     * @return FormEntity|null
     */
    public function findBySlug(string $slug): ?FormEntity
    {
        return $this->findOneBy(['slug' => $slug]);
    }
}