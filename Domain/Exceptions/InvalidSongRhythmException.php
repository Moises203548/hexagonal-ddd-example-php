<?php
declare(strict_types=1);

class InvalidSongRhythmException extends InvalidArgumentException
{
    public static function becauseValueIsInvalid(string $rhythm): self
    {
        return new self('El ritmo no es válido: ' . $rhythm);
    }
}
