<div class="grid grid-cols-10 gap-4">
	<div class="col-span-10 lg:col-span-2">
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto mt-3 lg:flex-col"
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