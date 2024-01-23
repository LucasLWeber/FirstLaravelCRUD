<?php

declare(strict_types=1);

namespace App\Livewire\Traits;

trait AddressPropertiesRulesTrait
{
  // Regras de validação para os campos
  protected array $rules = [
    'data.zipcode' => ['required'],
    'data.street' => ['required'],
    'data.neighborhood' => ['required'],
    'data.city' => ['required'],
    'data.state' => ['required', 'max:2'],
  ];
}
