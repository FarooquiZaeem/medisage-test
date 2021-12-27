<?php

namespace App\Repositories\Student;

interface StudentInterface
{
    public function storeStudent($request);
    public function applyFilter($search);
    public function getList();
}
