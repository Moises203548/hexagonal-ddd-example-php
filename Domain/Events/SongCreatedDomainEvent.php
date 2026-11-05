<?php
declare(strict_types=1);

require_once __DIR__ . '/EventDomain.php';

final class SongCreatedDomainEvent extends DomainEvent
{
    private SongModel $song;

    public function __construct(SongModel $song)
    {
        parent::__construct('song.created');
        $this->song = $song;
    }

    public function payload(): array
    {
        return $this->song->toArray();
    }
}
