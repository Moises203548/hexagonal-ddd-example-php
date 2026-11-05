<?php
declare(strict_types=1);

final class GetAllSongsQuery
{
    private ?string $search;
    private int $page;
    private int $limit;

    public function __construct(?string $search = null, int $page = 1, int $limit = 10)
    {
        $search = $search !== null ? trim($search) : null;
        $this->search = ($search === '') ? null : $search;
        $this->page = $page > 0 ? $page : 1;
        $this->limit = $limit > 0 ? $limit : 10;
    }

    public function getSearch(): ?string { return $this->search; }
    public function getPage(): int { return $this->page; }
    public function getLimit(): int { return $this->limit; }
}
