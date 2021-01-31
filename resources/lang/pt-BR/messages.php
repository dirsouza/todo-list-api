<?php

return [
    'tasks' => [
        'title' => 'Título',
        'description' => 'Descrição',
        'archived' => 'Arquivar',
        'completed' => 'Completar',
        'notFound' => 'Nenhuma tarefa encontrada.',
        'successTask' => 'Tarefa encontrada com sucesso.',
        'successListing' => 'Tarefas listadas com sucesso.',
        'successRegister' => 'Tarefa cadastrada com sucesso.',
        'errorRegister' => 'Não foi possível realizar o cadastro da tarefa.',
        'successUpdate' => 'Tarefa atualizada com sucesso.',
        'errorUpdate' => 'Não foi possível realizar a atualização da tarefa.',
        'successDelete' => 'Tarefa excluída com sucesso.',
        'errorDelete' => 'Não foi possível realizar a exclusão da tarefa.',
        'validation' => [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve conter mais de :min caracteres.',
            'max' => 'O campo :attribute deve conter no máximo :max caracteres.',
            'boolean' => 'O campo :attribute deve ser verdadeiro ou falso.',
            'valid_if_null_or_false' => 'O campo :attribute só é válido se o campo :field for nulo ou falso.'
        ]
    ],
];
