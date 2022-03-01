<div class="form-group">
    <label for="{{'product['.$pos.']'}}">Prodotto</label>
    <select name="{{'product['.$pos.']'}}" id="{{'product['.$pos.']'}}" class="form-select" readonly>
        <option value="{{$product->id}}" readonly>{{$product->id.'-'.$product->name}}</option>
    </select>
    <label for="{{'amount['.$pos.']'}}">Quantità</label>
    <input type="number" name="{{'amount['.$pos.']'}}" class="form-control @error('amount['.$pos.']') is-invalid @enderror" id="{{'amount['.$pos.']'}}" placeholder="Quantita" value="{{ old('amount['.$pos.']') }}">
        @error('amount['.$pos.']')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>