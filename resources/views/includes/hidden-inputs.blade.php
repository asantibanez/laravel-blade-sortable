@if($name)
    <template x-for="value in sortOrder" x-key="index">
        <input
            type="hidden"
            name="{{ $name }}[]"
            x-model:value="value"
        />
    </template>
@endif
