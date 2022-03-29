
<div style="padding: 10px 165px 10px 30px; border-bottom: 2px solid #DBDCDB" class="d-flex align-items-center justify-content-between mb-2">
    <h2 class="light-grey">Pratiche</h2>
</div>

<div class="content-main" style="padding-top: 0px;">
    <div class="box">
        <div class="px-20 pt-20">
            <span style="margin-right: 20px" class="black text-md {{Route::currentRouteName() == 'business.practice.index' ? 'bold' : ''}}">
                Lista Pratiche
            </span>
            <span class="black text-md {{Route::currentRouteName() != 'business.practice.index' ? 'bold' : ''}}">
                Scheda pratica
            </span>
            <hr class="bg-black" style="margin-top: 5px;">

            <div class="d-flex justify-content-between menu mb-4">
                <a href="{{route('business.applicant.edit', $applicant->id) }}" class="{{request()->is('business/applicant/*') ? 'visited' : ''}}">
                    RICHIEDENTE
                </a>
                <a href="{{route('business.practice.edit', $practice->id) }}" class="{{request()->is('business/practice/*') ? 'visited' : ''}}">
                    PRATICA
                </a>
                <a href="{{route('business.subject.edit', $subject->id) }}" class="{{request()->is('business/subject/*') ? 'visited' : ''}}">
                    SOGGETTI E IMPORTI
                </a>
                <a href="{{route('business.building.edit', $building->id) }}" class="{{request()->is('business/building/*') ? 'visited' : ''}}">
                    IMMOBILE
                </a>
                <a href="">FOTO DA APP</a>
                <a href="">DOCUMENTI RICHIESTI</a>
                <a href="{{route('business.superbonus.index', $practice->id) }}" class="{{request()->is('business/superbonus/*') ? 'visited' : ''}}">
                    SUPERBONUS 110%
                </a>
                <a href="">CONTRATTI</a>
                <a href="">AUDITOR</a>
            </div>

            @if (Route::currentRouteName() == 'business.applicant.create')
            <div class="submenu">
                <h6>Dati richiedente</h6>
            </div>
            @endif
            @if (Route::currentRouteName() == 'business.practice.create')
            <div class="submenu">
                <h6>Dati pratica</h6>
            </div>
            @endif
            @if (Route::currentRouteName() == 'business.superbonus.index')
            <div class="submenu">
                <h6>Lista dati progetto</h6>
            </div>
            @endif
        </div>

