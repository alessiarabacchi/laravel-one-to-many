<select name="type_id">
    <option value="">Seleziona una Tipologia</option>
    @foreach($types as $type)
        <option value="{{ $type->id }}" {{ (isset($project) && $project->type_id == $type->id) ? 'selected' : '' }}>
            {{ $type->name }}
        </option>
    @endforeach
</select>
