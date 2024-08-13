<?php use Carbon\Carbon; ?>

<x-layout>

    <h2>Show contact</h2>

    <div style="margin-bottom: 6px">
        <a href="{{ route('contacts.index') }}">
            <button>Back</button>
        </a>
    </div>

    <div class="contact-card" style="margin-bottom:6px">
            <span style="font-weight:bold">Id:</span> {{ $contact->id }}<br/>
            <span style="font-weight:bold">Name:</span> {{ $contact->name }}<br/>
            <span style="font-weight:bold">Email:</span> {{ $contact->email }}<br/>
            <span style="font-weight:bold">Phone:</span> {{ $contact->phone }}<br/>
            <span style="font-weight:bold">Address:</span> <address>{{ $contact->address }}</address>
            <span style="font-weight:bold">Created at:</span> {{ $contact->created_at }}<br/>
            <span style="font-weight:bold">Updated at:</span> {{ $contact->updated_at }}<br/>

            <div style="margin-top: 15px">
                <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}">
                    <button>Edit</button>
                </a>

                <form action="{{ route('contacts.destroy', ['id' => $contact->id]) }}" method="POST" style="display:inline; padding:0; background-color:transparent !important;" onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id='deleteButton' style="background-color: none">Delete</button>
                </form>
            </div>
    </div>

    <script>
        function confirmDelete(){
            return confirm('Do you really want to delete the contact?')
        }
    </script>

</x-layout>
