<?php

namespace Core\Validator\Rules;

interface InterfaceRule
{
    public function validate(mixed $value, mixed $ruleValue, array $data): bool;
    public function getMessage(string $field, mixed $ruleValue): string;
}