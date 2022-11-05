<?php

require __DIR__.'/vendor/autoload.php';
use Omojunior\PhpStripeApiUsage\controller\HomeController;
use Omojunior\PhpStripeApiUsage\controller\ItemsController;
use Omojunior\PhpStripeApiUsage\database\Connect;
use tebazil\dbseeder\Seeder;

$db = new Connect();
$items = new ItemsController();
$home = new HomeController();
try {
    $seeder = new Seeder($db->pdoConnect());
    $generator = $seeder->getGeneratorConfigurator();
    $faker = $generator->getFakerConfigurator();

    $seeder->table('product')->columns([
        'name' => $faker->name(),
        'price' => $faker->randomFloat(2, 10, 100),
        //'description' => $faker->text(20,['html' => false]),
    ])->rowQuantity(2);

    $seeder->refill();
} catch (\PDOException $e) {
    echo 'Query failed: '.$e->getMessage();
} catch (\Exception $e) {
    echo 'seeding failed: '.$e->getMessage();
}
