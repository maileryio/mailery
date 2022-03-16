<?php

namespace Mailery;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Inheritance\DiscriminatorColumn;

#[Entity]
#[DiscriminatorColumn(name: 'type')]
class Person
{
    #[Column(type: 'primary', primary: true)]
    protected int $id;

    #[Column(type: 'string')]
    protected string $name;

    /** @Column(type="string") */
    #[Column(type: 'string')]
    protected string $type;
}