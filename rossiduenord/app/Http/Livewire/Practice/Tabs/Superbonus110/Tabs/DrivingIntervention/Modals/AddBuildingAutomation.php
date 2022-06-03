<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddBuildingAutomation extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $ba_winter_acs;
		public $ba_summer_acs;
		public $ba_hot_water_production;
		public $ba_usable_area;
		public $ba_project_cost;
		public $ba_max_cost;
		public $ba_energetic_savings;

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->building_automations()->create([
				'condomino_id'            => $this->condomino_id,
				'is_common'               => $this->is_common,
				'ba_winter_acs'           => $this->ba_winter_acs,
				'ba_summer_acs'           => $this->ba_summer_acs,
				'ba_hot_water_production' => $this->ba_hot_water_production,
				'ba_usable_area'          => $this->ba_usable_area,
				'ba_project_cost'         => $this->ba_project_cost,
				'ba_max_cost'             => $this->ba_max_cost,
				'ba_energetic_savings'    => $this->ba_energetic_savings,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Building Automation salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.building-automations', 'building-automation-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-building-automation');
		}
	}
