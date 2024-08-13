@props(['name'])

@error($name)
    <p style="color:red"> {{ $message }}</p>
@enderror
