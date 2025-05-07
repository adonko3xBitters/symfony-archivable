<?php

namespace adonko3xBitters\SymfonyArchivable\Doctrine;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
class ArchivedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$targetEntity->reflClass->hasProperty('archivedAt')) {
            return '';
        }

        return sprintf('%s.archived_at IS NULL', $targetTableAlias);
    }
}