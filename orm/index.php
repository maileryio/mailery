<?php

require_once __DIR__ . '/vendor/autoload.php';

use Cycle\Database;
use Cycle\Database\Config;
use Cycle\Schema;
use Cycle\Annotated;
use Cycle\ORM;
use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader('class_exists');

$dbal = new Database\DatabaseManager(
    new Config\DatabaseConfig([
        'default' => 'default',
        'databases' => [
            'default' => ['connection' => 'sqlite']
        ],
        'connections' => [
            'sqlite' => new Config\SQLiteDriverConfig(
                connection: new Config\SQLite\MemoryConnectionConfig(),
                queryCache: true,
            ),
        ]
    ])
);

$finder = (new \Symfony\Component\Finder\Finder())->files()->in([__DIR__ . '/src']);
$classLocator = new \Spiral\Tokenizer\ClassLocator($finder);

$schema = (new Schema\Compiler())->compile(new Schema\Registry($dbal), [
    new Schema\Generator\ResetTables(),             // re-declared table schemas (remove columns)
    new Annotated\Embeddings($classLocator),        // register embeddable entities
    new Annotated\Entities($classLocator),          // register annotated entities
    new Annotated\TableInheritance(),               // register STI/JTI
    new Annotated\MergeColumns(),                   // add @Table column declarations
    new Schema\Generator\GenerateRelations(),       // generate entity relations
    new Schema\Generator\GenerateModifiers(),       // generate changes from schema modifiers
    new Schema\Generator\ValidateEntities(),        // make sure all entity schemas are correct
    new Schema\Generator\RenderTables(),            // declare table schemas
    new Schema\Generator\RenderRelations(),         // declare relation keys and indexes
    new Schema\Generator\RenderModifiers(),         // render all schema modifiers
    new Annotated\MergeIndexes(),                   // add @Table column declarations
    new Schema\Generator\SyncTables(),              // sync table changes to database
    new Schema\Generator\GenerateTypecast(),        // typecast non string columns
]);

$orm = new ORM\ORM(new ORM\Factory($dbal), new \Cycle\ORM\Schema($schema));

$employee = new \App\Employee();
$employee->name = 'Test';
$employee->salary = 100;

$manager = new \Cycle\ORM\EntityManager($orm);
$manager->persist($employee);
$manager->run();

$people = $orm->getRepository(\App\Person::class)->findAll();

var_dump($people);