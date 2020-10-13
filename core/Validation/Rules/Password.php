<?php 

namespace Core\Validation\Rules;

class Password implements ValidationRule
{
    private $name, $value;

    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function validate()
    {
        $pattern = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[*.-_@#%]).{8,50}$/";

        if(! preg_match($pattern, $this->value)) {
            return "$this->name should contain at least digit, lowercase, uppercase and special char";
        }

        return "";
    }
}