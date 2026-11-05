<?php
declare(strict_types=1);

final class CreateSongRequest
{
    public string $name;
    public string $rhythm;
    public string $duration;
    public string $album;
    public string $position;
    public string $band;
    public string $performer;
    public string $author;
    public string $releaseDate;

    public static function fromArray(array $d): self
    {
        $r = new self();
        $r->name = (string) ($d['name'] ?? '');
        $r->rhythm = (string) ($d['rhythm'] ?? '');
        $r->duration = (string) ($d['duration'] ?? '');
        $r->album = (string) ($d['album'] ?? '');
        $r->position = (string) ($d['position'] ?? '');
        $r->band = (string) ($d['band'] ?? '');
        $r->performer = (string) ($d['performer'] ?? '');
        $r->author = (string) ($d['author'] ?? '');
        $r->releaseDate = (string) ($d['release_date'] ?? '');
        return $r;
    }
}
