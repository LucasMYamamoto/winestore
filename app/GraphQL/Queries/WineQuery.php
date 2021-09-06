<?php

namespace App\GraphQL\Queries;


use App\Models\Wine as ModelsWine;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class WineQuery extends Query
{
    protected $attributes = [
        'name' => 'wine',
    ];

    public function type()
    {
        return GraphQL::type('Wine');
    }

    public function args():array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return ModelsWine::findOrFail($args['id']);
    }
}