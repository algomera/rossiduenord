<?php

namespace App\Http\Livewire\Business;

use Livewire\Component;

class CompleteProfileForm extends Component
{
	public $type = '';
	public $p_iva = '';
	public $c_f = '';
	public $legal_form = '';
	public $rea = '';
	public $c_ateco = '';
	public $reg_date = '';

	public function save() {
		dd('submit');
	}

    public function render()
    {
        return view('livewire.business.complete-profile-form');
    }
}
