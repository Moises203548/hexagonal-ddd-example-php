<?php
declare(strict_types=1);

final class CreateSongCommand
{
    private string $name;
    private string $rhythm;
    private int $durationSeconds;
    private string $album;
    private int $position;
    private string $band;
    private string $performer;
    private string $author;
    private string $releaseDate;

    public function __construct(
        string $name, string $rhythm, int $durationSeconds, string $album, int $position,
        string $band, string $performer, string $author, string $releaseDate
    ) {
        $this->name = trim($name);
        $this->rhythm = trim($rhythm);
        $this->durationSeconds = $durationSeconds;
        $this->album = trim($album);
        $this->position = $position;
        $this->band = trim($band);
        $this->performer = trim($performer);
        $this->author = trim($author);
        $this->releaseDate = trim($releaseDate);
    }

    public function getName(): string { return $this->name; }
    public function getRhythm(): string { return $this->rhythm; }
    public function getDurationSeconds(): int { return $this->durationSeconds; }
    public function getAlbum(): string { return $this->album; }
    public function getPosition(): int { return $this->position; }
    public function getBand(): string { return $this->band; }
    public function getPerformer(): string { return $this->performer; }
    public function getAuthor(): string { return $this->author; }
    public function getReleaseDate(): string { return $this->releaseDate; }
}
