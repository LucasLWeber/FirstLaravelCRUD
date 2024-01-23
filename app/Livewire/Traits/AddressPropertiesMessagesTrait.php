<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

trait AddressPropertiesMessagesTrait
{
  // Mensagens para erros na validação
  protected array $messages = [
    'data.zipcode.required' => 'O campo CEP é obrigatório.',
    'data.street.required' => 'O campo ENDEREÇO é obrigatório.',
    'data.neighborhood.required' => 'O campo BAIRRO é obrigatório.',
    'data.city.required' => 'O campo CIDADE é obrigatório.',
    'data.state.required' => 'O campo ESTADO é obrigatório.',
    'data.state.max' => 'O campo ESTADO deve possuir 2 CARACTERES.',
  ];
}
