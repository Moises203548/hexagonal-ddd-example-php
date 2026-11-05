<?php
declare(strict_types=1);

final class SongWebMapper
{
    public function toCreateCommand(CreateSongRequest $r): CreateSongCommand
    {
        return new CreateSongCommand(
            $r->name, $r->rhythm, $this->parseDuration($r->duration), $r->album,
            (int) $r->position, $r->band, $r->performer, $r->author, $r->releaseDate
        );
    }

    public function toUpdateCommand(UpdateSongRequest $u): UpdateSongCommand
    {
        $r = $u->data;
        return new UpdateSongCommand(
            $u->id, $r->name, $r->rhythm, $this->parseDuration($r->duration), $r->album,
            (int) $r->position, $r->band, $r->performer, $r->author, $r->releaseDate
        );
    }

    public function toResponse(SongModel $m): SongResponse
    {
        $s = new SongResponse();
        $s->id = $m->id()->value();
        $s->name = $m->name()->value();
        $s->rhythm = $m->rhythm();
        $s->duration = $m->duration()->formatted();
        $s->album = $m->album()->value();
        $s->position = $m->position()->value();
        $s->band = $m->band()->value();
        $s->performer = $m->performer()->value();
        $s->author = $m->author()->value();
        $s->releaseDate = $m->releaseDate()->value();
        return $s;
    }

    /** @param SongModel[] $models @return SongResponse[] */
    public function toResponses(array $models): array
    {
        return array_map([$this, 'toResponse'], $models);
    }

    /** Convierte "mm:ss" a segundos. */
    private function parseDuration(string $value): int
    {
        $value = trim($value);
        if (!preg_match('/^(\d{1,3}):([0-5]\d)$/', $value, $m)) {
            throw InvalidSongDurationException::becauseFormatIsInvalid($value);
        }
        return ((int) $m[1]) * 60 + (int) $m[2];
    }
}
