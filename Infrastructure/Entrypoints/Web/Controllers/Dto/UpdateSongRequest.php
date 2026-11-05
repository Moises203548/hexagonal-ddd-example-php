<?php
declare(strict_types=1);

final class UpdateSongRequest
{
    public int $id;
    public CreateSongRequest $data;

    public static function fromArray(int $id, array $d): self
    {
        $r = new self();
        $r->id = $id;
        $r->data = CreateSongRequest::fromArray($d);
        return $r;
    }
}
