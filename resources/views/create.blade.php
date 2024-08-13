<x-layout>
    <div>
        <h2>
            Create contact
        </h2>
        <form method="POST" action="{{ route('contacts.store') }}">
            @csrf

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="name">Name: </label>
                <input name="name" id="name" autocomplete="name" value="{{ old('name') }}" required />
                <x-form-error name="name" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="email">Email: </label>
                <input name="email" id="email" autocomplete="email" value="{{ old('email') }}"  required />
                <x-form-error name="email" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="phone">Phone number: </label>
                <input name="phone" id="phone" autocomplete="phone" value="{{ old('phone') }}" required />
                <x-form-error name="phone" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="phone">Address: </label>
                <textarea name="address">{{ old('address') }}</textarea>
                <x-form-error name="address" />
            </div>

            <div style="margin-bottom: 20px">
                <a href="{{ route('contacts.index') }}" style="color:grey; display:inline-block">Cancel</a>
                <button type="submit">Create</button>
            </div>
        </form>

    </div>
</x-layout>
