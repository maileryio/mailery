<?php

namespace App;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Inheritance\SingleTable;

#[Entity]
#[SingleTable]
class Employee extends Person
{
    #[Column(type: 'int')]
    public int $salary;
}
