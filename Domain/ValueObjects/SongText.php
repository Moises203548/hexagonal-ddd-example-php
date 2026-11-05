<?php
declare(strict_types=1);

/** Texto obligatorio de hasta 100 caracteres (álbum, banda, intérprete, autor). */
final class SongText
{
    private const MAX = 100;
    private string $value;

    public function __construct(string $field, string $value)
    {
        $value = trim($value);
        if ($value === '') {
            throw InvalidSongFieldException::becauseValueIsEmpty($field);
        }
        if (mb_strlen($value) > self::MAX) {
            throw InvalidSongFieldException::becauseValueIsTooLong($field, self::MAX);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
