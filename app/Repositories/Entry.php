<?php

namespace App\Repositories;

use App\Models\Entry as Model;
use Laravel5Helpers\Repositories\Search;

class Entry extends Search
{
    protected $pageSize = 10;

    protected function getModel()
    {
        return new Model;
    }

    public function getLaguages()
    {
        return $this->getModel()->languages;
    }

    public function getInterests()
    {
        return $this->getModel()->interestsList;
    }

}
