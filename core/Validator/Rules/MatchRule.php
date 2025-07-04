<?php

namespace Core\Validator\Rules;

class MatchRule implements InterfaceRule
{
    public function validate(mixed $value, mixed $ruleValue, array $data): bool
    {
        return $data[$ruleValue] === $value;
    }

    public function getMessage(string $field, mixed $ruleValue): string
    {
        return "Данное поле не совпадает с полем {$ruleValue}";
    }
}