
<div style="padding: 10px 165px 10px 30px; border-bottom: 2px solid #DBDCDB" class="d-flex align-items-center justify-content-between mb-2">
    <h2 class="light-grey">Pratiche</h2>
</div>

<div class="content-main" style="padding-top: 0px;">
    <div class="box">
        <div class="px-20 pt-20">
            <a href="{{route('business.practice.index')}}">
                <span style="margin-right: 20px" class="black text-md clickable {{Route::currentRouteName() == 'business.practice.index' ? 'bold' : ''}}">
                    Lista Pratiche
                </span>
            </a>
            <span class="black text-md {{Route::currentRouteName() != 'business.practice.index' ? 'bold' : ''}}">
                Scheda pratica
            </span>
            <hr class="bg-black" style="margin-top: 5px;">
            <div class="d-flex justify-content-between menu mb-4 ov-x">
                <a href="{{route('business.applicant.edit', $applicant->id) }}" class="{{request()->is('business/applicant*') ? 'visited' : ''}} px-3">
                    RICHIEDENTE
                </a>
                <a href="{{route('business.practice.edit', $practice->id) }}" class="{{request()->is('business/practice*') ? 'visited' : ''}} px-3">
                    PRATICA
                </a>
                <a href="{{route('business.subject.edit', $subject->id) }}" class="{{request()->is('business/subject*') ? 'visited' : ''}} px-3">
                    SUBAPPALTATORI
                </a>
                <a href="{{route('business.building.edit', $building->id) }}" class="{{request()->is('business/building/*') ? 'visited' : ''}} px-3">
                    IMMOBILE
                </a>
                <a href="{{route('business.medias', $practice->id)}}" class="{{request()->is('business/medias/*') ? 'visited' : ''}} px-3 text-nowrap">
                    FOTO E VIDEO
                </a>
                 <a href="{{route('business.folderDocument.show', [$practice->id, $practice->folder_documents->first()->id ])}}" class="{{request()->is('business/folder_document/*') ? 'visited' : ''}} text-nowrap px-3">
                    DOCUMENTI RICHIESTI
                </a>
                 <a href="{{route('business.superbonus.index', $practice->id) }}" class="{{request()->is('business/superbonus*') ? 'visited' : ''}} px-3">
                    SUPERBONUS
                </a>
                <a href="{{route('business.contracts.index', $practice->id)}}" class="{{ request()->is('business/contracts*') ? 'visited' : ''}} px-3">CONTRATTI</a>
                <a href="{{route('business.policies.index', $practice->id)}}" class="{{request()->is('business/policies*') ? 'visited' : ''}} px-3">POLIZZE</a>
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

