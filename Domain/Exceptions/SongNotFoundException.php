<?php
declare(strict_types=1);

class SongNotFoundException extends DomainException
{
    public static function becauseIdWasNotFound(int $id): self
    {
        return new self('La canción con id ' . $id . ' no fue encontrada.');
    }
}
