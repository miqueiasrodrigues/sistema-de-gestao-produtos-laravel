<?php

namespace App\Http\Controllers;

class ExampleData
{
  public function suppliers(){
    return [
        [
            'code' => '001',
            'name' => 'Fornecedor 1',
            'cnpj' => '011.11.11/011',
            'email' => 'forncedor1@gmail.com',
            'fone' => '8888-8888'
        ], [
            'code' => '002',
            'name' => 'Fornecedor 2',
            'cnpj' => '011.11.13/022',
            'email' => 'forncedor2@gmail.com',
            'fone' => '1111-1111'
        ], [
            'code' => '003',
            'name' => 'Fornecedor 3',
            'cnpj' => '011.11.12/033',
            'email' => 'forncedor3@gmail.com',
            'fone' => '2222-2222'
        ],
        [
            'code' => '004',
            'name' => 'Fornecedor 4',
            'cnpj' => '011.11.12/033',
            'email' => 'forncedor4@gmail.com',
            'fone' => '2222-2222'
        ],
    ];
  }
  
  public function products(){
    return [
        [
            'code' => '001',
            'name' => 'Produto 1',
            'value' => 199.99,
            'supplier' => 'Fornecedor 1'
        ],
        [
            'code' => '002',
            'name' => 'Produto 2',
            'value' => 199.99,
            'supplier' => 'Fornecedor 2'
        ],
        [
            'code' => '003',
            'name' => 'Produto 3',
            'value' => 199.99,
            'supplier' => 'Fornecedor 2'
        ],
        [
            'code' => '004',
            'name' => 'Produto 4',
            'value' => 199.99,
            'supplier' => 'Fornecedor 1'
        ],
        [
            'code' => '005',
            'name' => 'Produto 5',
            'value' => 199.99,
            'supplier' => 'Fornecedor 3'
        ]
    ];
  }
}