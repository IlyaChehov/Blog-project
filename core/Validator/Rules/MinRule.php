<?php

namespace Core\Validator\Rules;

class MinRule implements InterfaceRule
{
    public function validate(mixed $value, mixed $ruleValue, array $data): bool
    {
        $length = mb_strlen($value, 'UTF-8');
        return $length >= $ruleValue;
    }

    public function getMessage(string $field, mixed $ruleValue): string
    {
        return "Количество символов не должно быть меньше {$ruleValue}.";
    }
}