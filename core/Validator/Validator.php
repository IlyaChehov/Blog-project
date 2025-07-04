<?php

namespace Core\Validator;

use Core\Validator\Rules\InterfaceRule;

class Validator
{
    private array $errors = [];
    private array $data = [];

    /**
     * @throws \Exception
     */
    public function validate(array $data, array $rules): void
    {
        $this->data = $data;
        foreach ($data as $field => $value) {
            $this->check([
                'field' => $field,
                'value' => $value,
                'rules' => $rules[$field]
            ]);
        }
    }

    private function check(array $data)
    {
        foreach ($data['rules'] as $rule => $ruleValue) {
            $ruleClass = 'Core\Validator\Rules\\' . ucfirst($rule) . 'Rule';
            if (!class_exists($ruleClass)) {
                throw new \Exception("Правило валидации {$rule} не поддерживается.");
            }
            /** @var InterfaceRule $instance */
            $instance = new $ruleClass();
            if (!$instance->validate($data['value'], $ruleValue, $this->data)) {
                $this->errors[$data['field']][] = $instance->getMessage($data['field'], $ruleValue);
            }
        }
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
