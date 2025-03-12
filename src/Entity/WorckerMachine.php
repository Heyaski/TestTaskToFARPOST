<?php

namespace App\Entity;

use App\Repository\WorckerMachineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorckerMachineRepository::class)]
class WorckerMachine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $memoryTotal = null;

    #[ORM\Column]
    private ?int $cpuTotal = null;

    #[ORM\Column]
    private ?float $memoryAvailable = null;

    #[ORM\Column]
    private ?float $cpuAvailble = null;

    /**
     * @var Collection<int, Process>
     */
    #[ORM\OneToMany(targetEntity: Process::class, mappedBy: 'worckerMachine')]
    private Collection $processArray;

    public function __construct()
    {
        $this->processArray = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMemoryTotal(): ?int
    {
        return $this->memoryTotal;
    }

    public function setMemoryTotal(int $memoryTotal): static
    {
        $this->memoryTotal = $memoryTotal;

        return $this;
    }

    public function getCpuTotal(): ?int
    {
        return $this->cpuTotal;
    }

    public function setCpuTotal(int $cpuTotal): static
    {
        $this->cpuTotal = $cpuTotal;

        return $this;
    }

    public function getMemoryAvailable(): ?float
    {
        return $this->memoryAvailable;
    }

    public function setMemoryAvailable(float $memoryAvailable): static
    {
        $this->memoryAvailable = $memoryAvailable;

        return $this;
    }

    public function getCpuAvailble(): ?float
    {
        return $this->cpuAvailble;
    }

    public function setCpuAvailble(float $cpuAvailble): static
    {
        $this->cpuAvailble = $cpuAvailble;

        return $this;
    }

    /**
     * @return Collection<int, Process>
     */
    public function getProcessArray(): Collection
    {
        return $this->processArray;
    }

    public function addProcessArray(Process $processArray): static
    {
        if (!$this->processArray->contains($processArray)) {
            $this->processArray->add($processArray);
            $processArray->setWorckerMachine($this);
        }

        return $this;
    }

    public function removeProcessArray(Process $processArray): static
    {
        if ($this->processArray->removeElement($processArray)) {
            // set the owning side to null (unless already changed)
            if ($processArray->getWorckerMachine() === $this) {
                $processArray->setWorckerMachine(null);
            }
        }

        return $this;
    }
}
