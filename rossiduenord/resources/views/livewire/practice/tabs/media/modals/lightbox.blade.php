<div>
	<img class="w-full h-full aspect-square" src="{{ $photo->image }}" alt="{{$photo->name}}">
	<div class="p-4">
		<div class="flex flex-col space-y-2">
			<div class="flex flex-col text-xs text-gray-500">
				<span class="font-bold">Nome:</span>
				<span>{{ $photo->name }}</span>
			</div>
			@isset($photo->description)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Descrizione:</span>
					<span>{{ $photo->description }}</span>
				</div>
			@endisset
			@isset($photo->reference)
				<div class="flex flex-col text-xs text-gray-500">
					<span class="font-bold">Riferimento:</span>
					<span>{{ $photo->reference }}</span>
				</div>
			@endisset
		</div>
	</div>
</div>
