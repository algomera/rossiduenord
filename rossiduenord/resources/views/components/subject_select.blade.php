@props(['label', 'subject', 'items', 'name'])

<div class="form-group">
    <label for="{{$name}}" style="display:inline-block;">{{ $label }}</label>
    <div class="position-relative">
        <div class="select"></div>
        <select id="{{$name}}" name="{{$name}}" class="col-md form-control credit-input @error($name) is-invalid @enderror" style="height: 40px; border-radius: 2px; border: 1px solid rgb(219, 220, 219); background-color: rgb(242, 242, 242);">
            <option value="" selected>Seleziona..</option>
            @foreach($items as $item)
                <option value="{{ $item->company_name }}" {{ $subject[$name] === $item->company_name ? 'selected' : '' }}>{{ $item->company_name }} @if($name === 'consultant' && $item->consultant_type)({{ $item->consultant_type }})@endif</option>
            @endforeach
        </select>
    </div>
    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
