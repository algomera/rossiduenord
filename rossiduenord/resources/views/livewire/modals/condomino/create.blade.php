<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
            <div class="sm:col-span-6">
                <x-input wire:model.defer="name" type="text" name="name" id="name"
                         label="Nome/Ragione Sociale" required required></x-input>
            </div>
            <div class="sm:col-span-6">
                <x-input wire:model.defer="surname" type="text" name="surname" id="surname"
                         label="Cognome" required required></x-input>
            </div>
            <div class="sm:col-span-6">
                <x-input x-mask="999 9999999" wire:model.defer="phone" type="text" name="phone" id="phone"
                         label="Telefono" required></x-input>
            </div>
            <div class="sm:col-span-6">
                <x-input wire:model.defer="email" type="email" name="email" id="email"
                         label="Email" required></x-input>
            </div>
            <div class="sm:col-span-12">
                <x-input x-mask="aaaaaa99a99a999a" wire:model.defer="cf" type="text" name="cf" id="cf"
                         label="Codice Fiscale/P.IVA" required required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="millesimi_inv" type="text" name="millesimi_inv" id="millesimi_inv"
                         label="Millesimi" required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="foglio" type="text" name="foglio" id="foglio"
                         label="Foglio" required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="part" type="text" name="part" id="part"
                         label="Part." required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="sub" type="text" name="sub" id="sub"
                         label="Sub." required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="categ_catastale" type="text" name="categ_catastale" id="categ_catastale"
                         label="Cat. Catastale" required></x-input>
            </div>
            <div class="sm:col-span-4">
                <x-input wire:model.defer="sup_catastale" type="text" name="sup_catastale" id="sup_catastale"
                         label="Sup. Catastale" required></x-input>
            </div>
            <div class="sm:col-span-12">
                <div class="flex items-center">
                    <input wire:model="comproprietari" name="comproprietari" id="comproprietari"
                           type="checkbox"
                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <label for="comproprietari"
                           class="ml-3 block text-sm font-medium text-gray-700 truncate">Comproprietari</label>
                </div>
            </div>
        </div>
        <x-button>Salva</x-button>
    </form>
</x-card>
