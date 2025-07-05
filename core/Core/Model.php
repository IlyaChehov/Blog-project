<?php

namespace Core\Core;

use Core\Database\Database;
use Core\Validator\Validator;

abstract class Model
{
    protected string $table;
    protected array $fillable = [];
    protected array $attribute = [];
    protected array $rulesValidation = [];
    protected Validator $validator;

    public function __construct(array $data)
    {
        $this->attribute = $data;
        $this->validator = new Validator();
    }

    public static function all()
    {
        $class = get_called_class();
        $instance = new $class();
        $table = $instance->table;
    }

    /**
     * @throws \Exception
     */
    public function validate(): bool
    {
        $this->validator->validate($this->attribute, $this->rulesValidation);
        return $this->validator->hasErrors();
    }

    public function getErrors(): array
    {
        return $this->validator->getErrors();
    }

    public function save()
    {
        foreach ($this->attribute as $k => $v) {
            if (!in_array($k, $this->fillable)) {
                unset($this->attribute[$k]);
            }
        }
        $columns = array_keys($this->attribute);
        $columns = array_map(fn($el) => "`$el`", $columns);
        $columns = implode(', ', $columns);
        $values = array_keys($this->attribute);
        $values = array_map(fn($el) => ":$el", $values);
        $values = implode(', ', $values);
        $query = "INSERT INTO {$this->table} ($columns) VALUES ($values)";
        db()->query($query, $this->attribute);
        return db()->getInsertId();
    }

    public function getAttribute(): array
    {
        return $this->attribute;
    }

    public function setAttribute(array $attribute): void
    {
        $this->attribute = $attribute;
    }
}