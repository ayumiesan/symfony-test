<?php

declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="label", type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\Length(max = 100)
     */
    private $label;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     * @Assert\Length(max = 255)
     */
    private $description;

    /**
     * @ORM\Column(name="amountHt", type="float")
     * @Assert\NotBlank()
     * @Assert\Type("float")
     */
    private $amountHt;

    /**
     * @ORM\Column(name="creation", type="datetime")
     */
    private $creation;

    /**
     * @ORM\ManyToOne(targetEntity="Rate")
     * @ORM\JoinColumn(name="rate_id", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $rate;

    public function __construct()
    {
        $this->creation = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setAmountHt(float $amountHt): self
    {
        $this->amountHt = $amountHt;

        return $this;
    }

    public function getAmountHt(): ?float
    {
        return $this->amountHt;
    }

    public function setCreation(\DateTime $creation): self
    {
        $this->creation = $creation;

        return $this;
    }

    public function getCreation(): \DateTime
    {
        return $this->creation;
    }

    public function setRate(Rate $rate): self
    {
        $this->rate = $rate;

        return $this;
    }

    public function getRate(): ?Rate
    {
        return $this->rate;
    }
}
