<div class="grid grid-cols-10 gap-4">
	<div class="col-span-10 lg:col-span-2">
		<nav wire:ignore class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
		     aria-label="Sidebar">
			@foreach($tree as $k => $item)
				@if(isset($item->childs))
					<div wire:key="{{ $k }}" x-data="{open: false}">
						<div @isset($item->childs) x-on:click="open = !open"
						     @else wire:click="$set('selected', '{{$item->id}}')" @endisset
						     class="@if($item->id === $selected) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
							<span class="truncate">{{ $item->name }}</span>
							@isset($item->childs)
								<span class="text-gray-600 ml-auto py-0.5 px-3 text-xs rounded-full hidden lg:inline-block">
									<x-icon name="arrow-down" class="w-4 h-4 transition-transform"
									        x-bind:class="open || '-rotate-90'"></x-icon>
								</span>
							@endisset
						</div>
						@if(isset($item->childs))
							<div x-show="open" x-collapse class="pl-2">
								@foreach($item->childs as $kk => $child)
									<div wire:click="$set('selected', '{{ $child->id }}')"
									     class="@if($kk === $selected) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
										<span class="truncate">{{ $child->name }}</span>
									</div>
								@endforeach
							</div>
						@endif
					</div>
				@endif
			@endforeach
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8">
		<div class="bg-white">
			{{ $selected }}
		</div>
	</div>
</div>