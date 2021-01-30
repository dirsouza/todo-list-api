<?php

return [
    'tasks' => [
        'title' => 'Title',
        'description' => 'Description',
        'archived' => 'Archived',
        'completed' => 'Completed',
        'notFound' => 'No tasks found.',
        'successRegister' => 'Task successfully registered.',
        'errorRegister' => 'It was not possible to register the task.',
        'successUpdate' => 'Task updated successfully.',
        'errorUpdate' => 'The task could not be updated.',
        'successDelete' => 'Task successfully deleted.',
        'errorDelete' => 'The task could not be deleted.',
        'validation' => [
            'required' => 'The :attribute field is mandatory.',
            'min' => 'The :attribute field must contain more than :min characters.',
            'max' => 'The :attribute field must contain a maximum of :max characters.',
            'boolean' => 'The :attribute field must be true or false.',
            'valid_if_null_or_false' => 'The :attribute field is only valid if the :field field is null or false.'
        ]
    ],
];
