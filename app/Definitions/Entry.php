<?php

namespace App\Definitions;

use Laravel5Helpers\Definitions\Definition;

class Entry extends Definition
{

    public $name;

    public $surname;

    public $id_number;

    public $mobile_number;

    public $email_address;

    public $date_of_birth;

    public $language;

    public $interests;

    public function __construct($data)
    {
        $this->interests = $data['hobbies'];
        parent::__construct($data);
    }

    protected function setValidators()
    {
        return $this->validators = [
            'name' => 'bail| required',
            'surname' => 'bail| required',
            'id_number' => 'bail| required |min:13',
            'email_address' => 'bail| required | unique:entries',
            'language' => 'bail| required',
            'mobile_number' => 'bail| required | unique:entries'
        ];
    }
}
