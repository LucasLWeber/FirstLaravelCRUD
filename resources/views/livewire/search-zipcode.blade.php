<div>
    <form class="p-8 bg-gray-200 flex flex-col w-1/2 mx-auto mt-10 gap-4">
        <h1 class="text-2xl mb-2">Busque seu CEP!</h1>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="zipcode">CEP</label>
            <input class="border" id="zipcode" type="text" wire:model.lazy="data.zipcode">
            @error('data.zipcode')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="street">Rua</label>
            <input class="border" id="street" type="text" wire:model="data.street">
            @error('data.street')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="neighborhood">Bairro</label>
            <input class="border" id="neighborhood" type="text" wire:model="data.neighborhood">
            @error('data.neighborhood')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-col gap-2 w-1/2">
            <label for="city">Cidade</label>
            <input class="border" id="city" type="text" wire:model="data.city">
            @error('data.city')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex flex-col  gap-2 w-1/2">
            <label for="state">Estado</label>
            <input class="border" id="state" type="text" wire:model="data.state">
            @error('data.state')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <button class="px-4 py-2 bg-green-500 hover:bg-green-400 text-white rounded-md" type="button"
                wire:click="save">
                {{ $button_value . ' Endereço'}}
            </button>
        </div>
    </form>

    <br>
    <hr>

    <div class="flex flex-col my-8 mx-20">
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2">CEP</th>
                    <th class="px-4 py-2">Rua</th>
                    <th class="px-4 py-2">Bairro</th>
                    <th class="px-4 py-2">Cidade</th>
                    <th class="px-4 py-2">Estado</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td class="border px-4 py-2">{{ $address['zipcode'] }}</td>
                        <td class="border px-4 py-2">{{ $address['street'] }}</td>
                        <td class="border px-4 py-2">{{ $address['neighborhood'] }}</td>
                        <td class="border px-4 py-2">{{ $address['city'] }}</td>
                        <td class="border px-4 py-2">{{ $address['state'] }}</td>
                        <td class="px-4 py-2 flex flex-row justify-evenly">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md" 
                                    wire:click="edit({{ $address['id'] }})" 
                                    type="button">Editar
                            </button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded-md" 
                                    wire:click="remove({{ $address['id'] }})" 
                                    type="button">Excluir
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex flex-col">
            {{ $addresses->links() }}
        </div>
    </div>
</div>
