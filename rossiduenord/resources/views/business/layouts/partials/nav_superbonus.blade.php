<div class="nav_bonus">
    <a href="{{ route('business.superbonus.show', [$practice->id, $building->id]) }}" class="{{Route::currentRouteName() == 'business.superbonus.show' ? 'frame' : ''}}">Dati di Progetto</a>
    <a href="{{ route('business.driving_intervention', [$practice]) }}" class="{{Route::currentRouteName() == 'business.driving_intervention' ? 'frame' : ''}}">Interventi trainanti</a>
    <a href="{{ route('business.towed_intervention', [$practice]) }}" class="{{Route::currentRouteName() == 'business.towed_intervention' ? 'frame' : ''}}">Interventi trainati</a>
    <a href="{{ route('business.final_state', [$practice]) }}" class="{{Route::currentRouteName() == 'business.final_state' ? 'frame' : ''}}">Dati stato finale</a>
    <a href="{{ route('business.fees_declaration', [$practice]) }}" class="{{Route::currentRouteName() == 'business.fees_declaration' ? 'frame' : ''}}">Tot. Spese e Dichiarazioni</a>
    <a href="{{ route('business.practice.index') }}" class="{{Route::currentRouteName() == '' ? 'frame' : ''}}">Varianti</a>
</div>
