<?php

return [ // Mensajes de error especificos que manda "validate" cuando no se cumple una condicion.
    'required'    => 'El campo {field} es obligatorio.',
    'min_length'  => 'El campo {field} debe tener al menos {param} caracteres.',
    'max_length'  => 'El campo {field} no puede exceder {param} caracteres.',
    'valid_email' => 'El campo {field} debe contener un correo válido.',
    'is_unique'   => 'El {field} ya está registrado.',
];