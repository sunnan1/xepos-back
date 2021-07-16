<?php

namespace App\Models\Traits;

use App\Models\companies;

trait EmployeeTrait
{

    public function company()
    {
        return $this->belongsTo(companies::class);
    }
}

?>
