<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\AddressStoreAction;
use App\Actions\AddressGetPropertiesAction;
use App\Livewire\Traits\AddressPropertiesMessagesTrait;
use App\Livewire\Traits\AddressPropertiesRulesTrait;
use App\Models\Address;
use App\Services\ViaCep\ViaCepService;
use Exception;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;

class SearchZipcode extends Component
{
    use WithPagination;
    use Actions;
    use AddressPropertiesRulesTrait;
    use AddressPropertiesMessagesTrait;

    public array $data = [];
    public string $button_value = 'Salvar';
    public bool $isEdit = false;

    public function updated(string $key, string $value): void
    {
        try {
            if ($key === 'data.zipcode') {
                $this->data = ViaCepService::handle($value);
            }
        } catch (Exception $e) {

            $this->notification()->error(
                $title = 'Erro!',
                $description = 'CEP não encontrado.'
            );
            $this->reset();
        }
    }

    public function save(): void
    {
        $this->validate();
        AddressStoreAction::save($this->data);

        if ($this->isEdit) {
            $title = 'Endereço editado!';
            $descprition = 'Endereço editado com sucesso.';
        } else {
            $title = 'Endereço salvo!';
            $descprition = 'Endereço salvo com sucesso.';
        }

        $this->isEdit = false;
        $this->notification()->success($title, $descprition);
        $this->reset(); // limpa os campos
    }

    public function edit(string $id): void
    {
        $this->isEdit = true;
        $this->button_value = $this->button_value . ' edição de';

        $this->data = AddressGetPropertiesAction::handle($id);
    }

    public function remove(string $id): void
    {
        $address = Address::find($id)?->delete();

        $this->notification()->success(
            $title = 'Exclusão de Endereço!',
            $descprition = 'Endereço excluído com sucesso.'
        );
    }

    public function mount(): void
    {
        $this->data = AddressGetPropertiesAction::getEmptyData();
    }

    public function render()
    {
        $addresses = Address::paginate(3);
        return view('livewire.search-zipcode', [
            'addresses' => $addresses
        ]);
    }
}
