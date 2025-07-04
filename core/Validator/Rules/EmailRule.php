<?php

namespace Core\Validator\Rules;

class EmailRule implements InterfaceRule
{
    public function validate(mixed $value, mixed $ruleValue, array $data): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function getMessage(string $field, mixed $ruleValue): string
    {
        return "Не корректный E-mail.";
    }
}