<?php

namespace App\GraphQL\Queries;

use App\Models\Wine as ModelsWine;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class WinesQuery extends Query
{
    protected $attributes = [
        'name' => 'wines',
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Wine'));
    }

    public function resolve($root, $args)
    {
        return ModelsWine::all();
    }
}