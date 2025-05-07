<?php

namespace adonko3xBitters\SymfonyArchivable;

use Doctrine\ORM\Mapping as ORM;
trait Archivable
{
    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $archivedAt = null;

    public function getArchivedAt(): ?\DateTimeInterface
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?\DateTimeInterface $archivedAt): self
    {
        $this->archivedAt = $archivedAt;
        return $this;
    }

    public function isArchived(): bool
    {
        return null !== $this->archivedAt;
    }
}