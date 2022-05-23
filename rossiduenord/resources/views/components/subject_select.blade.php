@props(['label', 'subject', 'items', 'name'])
<x-select wire:ignore wire:model.lazy="{{ $name }}" name="{{$name}}" label="{{$label}}">
	<option value="" selected>Seleziona..</option>
	@foreach($items as $item)
		<option value="{{ (int) $item->id }}" {{ $subject[$name] === $item->id ? 'selected' : '' }}>{{ $item->company_name }} @if($name === 'consultant' && $item->consultant_type)
				({{ $item->consultant_type }})
			@endif</option>
	@endforeach
	@if($subject[$name])
		<x-slot name="action">
			<span class="text-xs text-indigo-500 cursor-pointer hover:underline"
			      wire:click="$emit('openModal', 'anagrafica.show', {{ json_encode([$subject[$name]]) }})">Vedi</span>
		</x-slot>
	@else
		<x-slot name="action">
			<span class="text-xs text-indigo-500 cursor-pointer hover:underline"
			      wire:click="$emit('openModal', 'anagrafica.create', {{ json_encode([\App\SubjectRole::where('slug', $name)->pluck('id')]) }})">Crea</span>
		</x-slot>
	@endif
</x-select>
