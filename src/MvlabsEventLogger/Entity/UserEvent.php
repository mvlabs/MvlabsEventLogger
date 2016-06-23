<?php

namespace MvlabsEventLogger\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Entity\User;
use GuzzleHttp\json_decode;

/**
 * UserEvent
 *
 * @ORM\Table(name="user_events")
 * @ORM\Entity(repositoryClass="MvlabsEventLogger\Entity\Repository\UserEventRepository")
 */
class UserEvent
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="userevents_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="insert_ts", type="datetime", nullable=false)
     */
    private $insertTs;

    /**
     * @var string
     *
     * @ORM\Column(name="topic", type="string", length=100, nullable=false)
     */
    private $topic;

    /**
     * @var string json containing event details
     *
     * @ORM\Column(name="data", type="json_array", nullable=false)
     */
    private $data;

    /**
     * @var \Webuser
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $user;


    public function __construct($user, $topic, array $data)
    {
        $this->insertTs = new \DateTime();

        $this->user = $user;
        $this->topic = $topic;
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

}
