<div class="grid grid-cols-10 gap-4 h-[30%] overflow-hidden">
	<div class="col-span-10 lg:col-span-2 border-r pr-4">
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-1 flex flex-row h-[300px] overflow-y-auto mt-3 lg:flex-col"
		     aria-label="Sidebar">
			<x-intervention-list-folder-loop :items="$tree" :selected="$selected"></x-intervention-list-folder-loop>
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8">
		<div class="bg-white">
			{{ $selected }}
		</div>
	</div>
</div>