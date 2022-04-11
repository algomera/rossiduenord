@props(['vertwall', 'practice', 'surfaces'])

<div>
    <div class="nav_bonus d-flex align-items-center" style="width: 100%; padding-right: 0px; margin:0;margin-bottom: 5px;">
        <a class="frame d-flex align-items-center">
            (PV) Pareti Verticali
            <div class="add-btn-custom-small" onclick="addSurface(event)">+</div>
         </a>
        <a>(PO) Coperture</a>
        <a>(PS) Pavimenti</a>
        @if(Route::currentRouteName() == 'business.driving_intervention')
            <a>(POND) Cop. non disperdenti</a>
            <p class="m-0">Data inizio pagamento coperture non disperdenti</p>
            <input value="{{$vertwall->start_date_payment}}" name="start_date_payment" id="start_date_payment" class="border ml-2" style="width: 150px; padding:0 5px" type="date">
        @endif    
    </div>
    <table class="table_bonus" id="surface_table" style="width: 100%">
        <thead>
        <tr>
            <td class="text-center" style="width:5%;"><b>N.</b></td>
            <td style="width:20%;"><b>Descrizione</b></td>
            <td style="width:13%;"><b>Superficie (m2)</b></td>
            <td style="width:10%;">
                <b>
                    Trasm. ante
                    (W/m2k)
                </b>
            </td>
            <td style="width:10%;">
                <b>
                    Trasm. post
                    (W/m2k)
                </b>
            </td>
            <td style="width:15%;">
                <b>
                    Trasm. Term.
                    Period. YIE (W/m2k)
                </b>
            </td>
            <td style="width:15%;"><b>Confine</b></td>
            <td style="width:15%;"><b>Coibentazione</b></td>
        </tr>
        </thead>
        <tbody>
            @forelse($surfaces as $s => $surface)
                <tr>
                    <td class="text-center">{{ $s + 1 }}</td>
                    <td class="text-center">
                        <input type="text" style="border: none" value="{{ $surface->description_surface }}">
                    </td>
                    <td class="text-right">{{ $surface->surface }}</td>
                    <td class="text-right">{{ $surface->trasm_ante }}</td>
                    <td class="text-right">{{ $surface->trasm_post }}</td>
                    <td class="text-right">{{ $surface->trasm_term }}</td>
                    <td class="text-center">{{ $surface->confine }}</td>
                    <td class="text-center">{{ $surface->insulation }}</td>
                </tr>
            @empty
                <tr id="no_data_row">
                    <td colspan="12">Nessun dato caricato</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex mt-2" style="background-color: #f2f2f2; width:100%; padding:5px 10px">
        <div class="d-flex mr-4">
            <p class="m-0">Totale “pareti verticali”</p>
            <label for="total_vertical_walls" class="m-0 black">
                <input type="number" value="{{old('total_vertical_walls') ?? $vertwall->total_vertical_walls}}" name="total_vertical_walls" id="total_vertical_walls" class="border ml-2 px-2 text-right  @error('total_vertical_walls') is-invalid error @enderror" style="width: 80px">
                m²
                @error('total_vertical_walls')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">di cui realizzati SAL n. 1</p>
            <label for="vw_realized_1" class="m-0  black">
                <input type="number" value="{{old('vw_realized_1') ?? $vertwall->vw_realized_1}}" name="vw_realized_1" id="vw_realized_1" class="border ml-2 px-2 text-right @error('vw_realized_1') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_realized_1')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">SAL n. 2</p>
            <label for="vw_realized_2" class="m-0  black">
                <input type="number" value="{{old('vw_realized_2') ?? $vertwall->vw_realized_2}}" name="vw_realized_2" id="vw_realized_2" class="border ml-2 px-2 text-right @error('vw_realized_2') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_realized_2')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
        <div class="d-flex mr-4">
            <p class="m-0">SAL F.</p>
            <label for="vw_sal_f" class="m-0  black">
                <input type="number" value="{{old('vw_sal_f') ?? $vertwall->vw_sal_f}}" name="vw_sal_f" id="vw_sal_f" class="border ml-2 px-2 text-right @error('vw_sal_f') is-invalid error @enderror" style="width: 80px">
                m²
                @error('vw_sal_f')
                <span class="invalid-feedback pl-3" role="alert">
                    <strong>{{ 'incorrect' }}</strong>
                </span>
                @enderror
            </label>
        </div>
    </div>
</div>

@push('scripts')
    @include('business.scripts.surface_add')
@endpush
