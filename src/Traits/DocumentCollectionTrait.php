<?php

namespace MongoDB\Bundle\Traits;

use MongoDB\Builder\Pipeline;
use MongoDB\Collection;
use MongoDB\Database;
use MongoDB\Driver\CursorInterface;

trait DocumentCollectionTrait
{
    private Collection $collection;

    private function createCollection(Database $database, string $collectionName, array $options = []): void
    {
        $this->collection = new Collection($database->getManager(), $database->getDatabaseName(), $collectionName, $options);
    }

    public function aggregate(array|Pipeline $pipeline, array $options = []): CursorInterface
    {
        return $this->collection->aggregate($pipeline, $options);
    }

    public function estimatedDocumentCount(array $options = []): int
    {
        return $this->collection->estimatedDocumentCount($options);
    }

    public function find(array|object $filter = [], array $options = []): CursorInterface
    {
        return $this->collection->find($filter, $options);
    }

    public function findOne(array|object $filter = [], array $options = []): array|object|null
    {
        return $this->collection->findOne($filter, $options);
    }
}
