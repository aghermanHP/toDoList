<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * A To Do
 * @ApiResource
 *
 * @ORM\Table(name="ToDoList")
 * @ORM\Entity(repositoryClass="App\Repository\ToDoListRepository")
 */
class ToDoList
{
    /**
     * The id of  To Do
     *
     * @var $id integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private  $id = null;

    /**
     * The name of To Do
     *
     * @var $name string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private $name = null;

    /**
     * The description of To Do
     *
     * @var $description string
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $description = null;

    /**
     * The update date of To Do
     *
     * @var $date_updated DateTime
     *
     * @ORM\Column(name="date_updated", type="date",  nullable=true)
     */
    private $date_updated = null;

    /**
     * The creation date of To Do
     *
     * @var $data_created DateTime
     *
     * @ORM\Column(name="data_created", type="date",  nullable=true)
     */
    private $data_created = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getDateUpdated(): DateTime
    {
        return $this->date_updated;
    }

    /**
     * @param DateTime $date_updated
     */
    public function setDateUpdated(DateTime $date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    /**
     * @return DateTime
     */
    public function getDataCreated(): DateTime
    {
        return $this->data_created;
    }

    /**
     * @param DateTime $data_created
     */
    public function setDataCreated(DateTime $data_created): void
    {
        $this->data_created = $data_created;
    }
}
