<div class="nav_bonus d-flex align-items-center ov-x ov-y-none">
    <a href="{{ route('business.superbonus.show', [$practice->id, $building->id]) }}" class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}} text-nowrap px-3">Dati di Progetto</a>
    <a href="{{ route('business.driving_intervention', [$practice]) }}" class="{{Route::currentRouteName() == 'business.driving_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainanti</a>
    <a href="{{ route('business.towed_intervention', [$practice]) }}" class="{{Route::currentRouteName() == 'business.towed_intervention' ? 'frame' : ''}} text-nowrap px-3">Interventi trainati</a>
    <a href="{{ route('business.final_state', [$practice]) }}" class="{{Route::currentRouteName() == 'business.final_state' ? 'frame' : ''}} text-nowrap px-3">Dati stato finale</a>
    <a href="{{ route('business.fees_declaration', [$practice]) }}" class="{{Route::currentRouteName() == 'business.fees_declaration' ? 'frame' : ''}} text-nowrap px-3">Tot. Spese e Dichiarazioni</a>
    <a href="{{ route('business.var_computation', [$practice]) }}" class="{{Route::currentRouteName() == 'business.var_computation' ? 'frame' : ''}} text-nowrap px-3">Varianti</a>
</div>
