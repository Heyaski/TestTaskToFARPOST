<?php

namespace App\Entity;

use App\Repository\ProcessRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcessRepository::class)]
class Process
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $memoryRequired = null;

    #[ORM\Column]
    private ?int $cpuRequired = null;

    #[ORM\ManyToOne(inversedBy: 'processArray')]
    private ?WorckerMachine $worckerMachine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getMemoryRequired(): ?int
    {
        return $this->memoryRequired;
    }

    public function setMemoryRequired(int $memoryRequired): static
    {
        $this->memoryRequired = $memoryRequired;

        return $this;
    }

    public function getCpuRequired(): ?int
    {
        return $this->cpuRequired;
    }

    public function setCpuRequired(int $cpuRequired): static
    {
        $this->cpuRequired = $cpuRequired;

        return $this;
    }

    public function getWorckerMachine(): ?WorckerMachine
    {
        return $this->worckerMachine;
    }

    public function setWorckerMachine(?WorckerMachine $worckerMachine): static
    {
        $this->worckerMachine = $worckerMachine;

        return $this;
    }
}
