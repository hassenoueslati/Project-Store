<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="integer")
     */
    private $Number_of_employees;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="float")
     */
    private $Cost;

    /**
     * @ORM\Column(type="date")
     */
    private $Creation_date;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class, inversedBy="projects")
     */
    private $Category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Company_name;

    public function __construct()
    {
        $this->Category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getNumberOfEmployees(): ?int
    {
        return $this->Number_of_employees;
    }

    public function setNumberOfEmployees(int $Number_of_employees): self
    {
        $this->Number_of_employees = $Number_of_employees;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getCost(): ?float
    {
        return $this->Cost;
    }

    public function setCost(float $Cost): self
    {
        $this->Cost = $Cost;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->Creation_date;
    }

    public function setCreationDate(\DateTimeInterface $Creation_date): self
    {
        $this->Creation_date = $Creation_date;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategory(): Collection
    {
        return $this->Category;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Category->contains($category)) {
            $this->Category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        $this->Category->removeElement($category);

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->Company_name;
    }

    public function setCompanyName(string $Company_name): self
    {
        $this->Company_name = $Company_name;

        return $this;
    }
    public function toString()
    {
        return $this->Category;
    }
}
