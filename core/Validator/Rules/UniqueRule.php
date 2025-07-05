<?php

namespace Core\Validator\Rules;

class UniqueRule implements InterfaceRule
{
    private string $value;
    public function validate(mixed $value, mixed $ruleValue, array $data): bool
    {
        $this->value = $value;
        $ruleValue = explode(':', $ruleValue);
        $table = $ruleValue[0];
        $column = $ruleValue[1];
        $isUnique = db()->query("SELECT * FROM `{$table}` WHERE `{$column}` = ?", [$value])->find();
//        dumpDie($isUnique);
        return !$isUnique;
    }

    public function getMessage(string $field, mixed $ruleValue): string
    {
        return "{$this->value} уже занято.";
    }
}