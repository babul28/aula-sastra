@props(['for'])

@error($for)
<span {{ $attributes->merge(['class' => 'inline-block mt-1 text-xs text-red-600']) }}>
    {{ $message }}
</span>
@enderror
