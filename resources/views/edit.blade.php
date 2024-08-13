<x-layout>
    <div>
        <h2>
            Create a new contact
        </h2>
        <form method="POST" action="{{ route('contacts.update', ['contact'=> $contact->id]) }}">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="name">Name: </label>
                <input name="name" id="name" autocomplete="name" value="{{ old('name') ?? $contact->name }}" required />
                <x-form-error name="name" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="email">Email: </label>
                <input name="email" id="email" autocomplete="email" value="{{ old('email') ?? $contact->email }}"  required />
                <x-form-error name="email" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="phone">Phone number: </label>
                <input name="phone" id="phone" autocomplete="phone" value="{{ old('phone') ?? $contact->phone }}" required />
                <x-form-error name="phone" />
            </div>

            <div style="margin-bottom: 20px">
                <label style="font-weight: bold" for="phone">Address: </label>
                <textarea name="address">{{ old('address') ?? $contact->address }}</textarea>
                <x-form-error name="address" />
            </div>

            <div>
                <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}" style="color:grey; display:inline-block">Cancel</a>
                <button type="submit">Update</button>
            </div>
        </form>

    </div>
</x-layout>
