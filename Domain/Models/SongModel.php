<?php
declare(strict_types=1);

final class SongModel
{
    public function __construct(
        private ?SongId $id,
        private SongName $name,
        private string $rhythm,
        private SongDuration $duration,
        private SongText $album,
        private SongPosition $position,
        private SongText $band,
        private SongText $performer,
        private SongText $author,
        private ReleaseDate $releaseDate
    ) {
        SongRhythmEnum::ensureIsValid($rhythm);
    }

    public function withId(SongId $id): self
    {
        return new self($id, $this->name, $this->rhythm, $this->duration, $this->album,
            $this->position, $this->band, $this->performer, $this->author, $this->releaseDate);
    }

    public function id(): ?SongId { return $this->id; }
    public function name(): SongName { return $this->name; }
    public function rhythm(): string { return $this->rhythm; }
    public function duration(): SongDuration { return $this->duration; }
    public function album(): SongText { return $this->album; }
    public function position(): SongPosition { return $this->position; }
    public function band(): SongText { return $this->band; }
    public function performer(): SongText { return $this->performer; }
    public function author(): SongText { return $this->author; }
    public function releaseDate(): ReleaseDate { return $this->releaseDate; }

    public function toArray(): array
    {
        return [
            'id' => $this->id?->value(),
            'name' => $this->name->value(),
            'rhythm' => $this->rhythm,
            'duration' => $this->duration->seconds(),
            'album' => $this->album->value(),
            'position' => $this->position->value(),
            'band' => $this->band->value(),
            'performer' => $this->performer->value(),
            'author' => $this->author->value(),
            'releaseDate' => $this->releaseDate->value(),
        ];
    }
}
