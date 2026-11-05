<?php
declare(strict_types=1);

final class SongName
{
    private const FIELD = 'nombre';
    private const MAX = 150;
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        if ($value === '') {
            throw InvalidSongFieldException::becauseValueIsEmpty(self::FIELD);
        }
        if (mb_strlen($value) > self::MAX) {
            throw InvalidSongFieldException::becauseValueIsTooLong(self::FIELD, self::MAX);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
