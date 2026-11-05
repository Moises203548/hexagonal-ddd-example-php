<?php
declare(strict_types=1);

final class ReleaseDate
{
    private string $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);
        $errors = DateTimeImmutable::getLastErrors();
        $hasErrors = $errors !== false && ($errors['warning_count'] > 0 || $errors['error_count'] > 0);
        if ($date === false || $hasErrors || $date->format('Y-m-d') !== $value) {
            throw InvalidSongDateException::becauseFormatIsInvalid($value);
        }
        if ($date > new DateTimeImmutable('today')) {
            throw InvalidSongDateException::becauseIsInFuture($value);
        }
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}
