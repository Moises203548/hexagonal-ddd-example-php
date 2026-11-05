<?php
declare(strict_types=1);

class InvalidSongFieldException extends InvalidArgumentException
{
    public static function becauseValueIsEmpty(string $field): self
    {
        return new self("El campo '$field' no puede estar vacío.");
    }

    public static function becauseValueIsTooLong(string $field, int $max): self
    {
        return new self("El campo '$field' no puede superar $max caracteres.");
    }
}
