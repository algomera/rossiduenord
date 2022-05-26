<?php

namespace App\Http\Livewire\Practice\Tabs\Document\Modals;

use LivewireUI\Modal\ModalComponent;

class AddDocument extends ModalComponent
{
    public function render()
    {
        return view('livewire.practice.tabs.document.modals.add-document');
    }
}
