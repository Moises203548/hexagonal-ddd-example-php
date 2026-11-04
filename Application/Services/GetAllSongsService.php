<?php
declare(strict_types=1);

final class GetAllSongsService implements GetAllSongsUseCase
{
    public function __construct(private GetAllSongsPort $getAllSongsPort)
    {
    }

    public function execute(GetAllSongsQuery $query): array
    {
        return $this->getAllSongsPort->getAll($query->getSearch(), $query->getPage(), $query->getLimit());
    }
}
