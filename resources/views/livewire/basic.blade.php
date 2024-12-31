<form>

    <select wire:model.live="selectedProvince">
        @foreach ($provinces as $province)
            <option value="{{$province['province_id']}}"> {{$province['province_name']}} </option>
        @endforeach
    </select>

    {{$selectedProvince}}

    <select wire:model.live>="selectedDistrict"
        @foreach ($districts as $district)
            <option value="{{$district['district_id']}}"> {{$district['district_name']}} </option>
        @endforeach
    </select>

    <select wire:model.live>="selectedMunicipality"
        @foreach ($municipalities as $municipality)
            <option value="{{$municipality['id']}}"> {{$municipality['municipality_name']}} {{$municipality['type']}} </option>
        @endforeach
    </select>
</form>