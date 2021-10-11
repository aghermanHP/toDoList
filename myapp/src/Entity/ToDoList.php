<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A To Do
 * @ApiResource(
 *     collectionOperations={"get"={"path"="todolists"}, "post"={"path"="todolists"}},
 *     itemOperations={"get"={"path"="todolists/{id}"}, "put"={"path"="todolists/{id}"} },
 * )
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
    private  $id;

    /**
     * The name of To Do
     *
     * @var $name string
     *
     * @Assert\NotBlank
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name = null;

    /**
     * The description of To Do
     *
     * @var $description string
     *
     * @Assert\NotBlank
     *
     * @ORM\Column(name="description", type="string", nullable=false)
     */
    private $description = null;

    /**
     * The update date of To Do
     *
     * @var $dateUpdated DateTime
     *
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="dateUpdated", type="datetime",  nullable=true)
     */
    private $dateUpdated = null;

    /**
     * The creation date of To Do
     *
     * @Groups({"read"})
     *
     * @var $dataCreated DateTime
     *
     * @Assert\Type("datetime")
     *
     * @ORM\Column(name="dataCreated", type="datetime",  nullable=false)
     */
    private $dataCreated = null;

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
     * @return DateTime|null
     */
    public function getDateUpdated(): ?DateTime
    {
        return $this->dateUpdated;
    }

    /**
     * @return DateTime
     */
    public function getDataCreated(): DateTime
    {
        return $this->dataCreated;
    }

    /**
     * @param $createdAt DateTime
     */
    public function prepareDataCreated(DateTime $createdAt)
    {
        $this->dataCreated = $createdAt;
    }

    /**
     * @param $updatedAt DateTime
     */
    public function prepareDataUpdated(DateTime $updatedAt)
    {
        $this->dateUpdated = $updatedAt;
    }
}
