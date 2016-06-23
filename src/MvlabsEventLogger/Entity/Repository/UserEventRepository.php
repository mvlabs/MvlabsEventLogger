<?php

namespace MvlabsEventLogger\Entity\Repository;


/**
 * Class UserEventRepository
 * @package MvlabsEventLogger\Entity\Repository
 */
class UserEventRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLastUserEventByTopic($topic)
    {
        $sql =  'SELECT ue ' .
            'FROM \MvlabsEventLogger\Entity\UserEvent ue ' .
            'WHERE ue.topic = :topic ' .
            'ORDER BY ue.id desc ';
        $query = $this->getEntityManager()->createQuery($sql);
        $query->setParameter('topic', $topic);

        $query->setMaxResults(1);

        return $query->getOneOrNullResult();
    }
}
