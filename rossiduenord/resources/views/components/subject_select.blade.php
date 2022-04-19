@props(['label', 'subject', 'items', 'name'])

<div class="form-group">
    <label for="{{$name}}" class="d-inline-block">{{ $label }}</label>
    <div class="position-relative">
        <div class="d-flex align-items-center">
            @if($subject[$name])
            <div class="viewAnagrafica mr-2 btn bg-blue white" data-toggle="modal" data-target="#anagrafiche-modal" data-company_name="{{$subject[$name]}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            @endif
        <div class="select"></div>
        <select onchange="setSubject({{$subject->practice->id}}, this.name, this.value)" id="{{$name}}" name="{{$name}}" class="col-md form-control credit-input @error($name) is-invalid @enderror" style="height: 40px; border-radius: 2px; border: 1px solid rgb(219, 220, 219); background-color: rgb(242, 242, 242);">
            <option value="" selected>Seleziona..</option>
            @foreach($items as $item)
                <option value="{{ $item->company_name }}" {{ $subject[$name] === $item->company_name ? 'selected' : '' }}>{{ $item->company_name }} @if($name === 'consultant' && $item->consultant_type)({{ $item->consultant_type }})@endif</option>
            @endforeach
        </select>
        </div>
    </div>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
