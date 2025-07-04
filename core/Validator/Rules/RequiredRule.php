<?php

namespace Core\Validator\Rules;

class RequiredRule
{
    public function validate(mixed $value, mixed $ruleValue, array $data): bool
    {
        return !empty($value);
    }

    public function getMessage(string $field, mixed $ruleValue): string
    {
        return 'Данное поле обязательно для заполнения.';
    }
}