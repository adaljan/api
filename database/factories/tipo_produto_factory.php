<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\tipo_produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'descricao' => $faker->text,
        'ativo' => '0',
        'excluido' => '0',
        'usuario_cadastro' => 1,
        'usuario_alteracao' => 1
    ];
});
