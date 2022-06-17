@foreach($items as $item)
{{--	@if(isset($item->children))--}}
		<div wire:key="{{ $item->id }}" x-data="{open: false}">
			<div @if($item->children->count()) x-on:click="open = !open"
			     @else wire:click="$set('selected', '{{$item->id}}')" @endif
			     class="@if($item->id === $selected) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
				<span class="truncate">{{ $item->code }}</span>
				@if($item->children->count())
					<span class="text-gray-600 ml-auto py-0.5 px-3 text-xs rounded-full hidden lg:inline-block">
									<x-icon name="arrow-down" class="w-4 h-4 transition-transform"
									        x-bind:class="open || '-rotate-90'"></x-icon>
								</span>
				@endif
			</div>
			@if(isset($item->children))
				<div x-show="open" x-collapse class="pl-2">
					<x-computo-folder-loop :items="$item->children" :selected="$selected"></x-computo-folder-loop>
				</div>
			@endif
		</div>
{{--	@endif--}}
@endforeach