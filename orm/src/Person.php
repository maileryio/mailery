<?php

namespace App;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Inheritance\DiscriminatorColumn;

#[Entity]
#[DiscriminatorColumn(name: 'type')]
class Person
{
    #[Column(type: 'primary', primary: true)]
    public int $id;

    #[Column(type: 'string')]
    public string $name;

    #[Column(type: 'string')]
    public string $type;
}