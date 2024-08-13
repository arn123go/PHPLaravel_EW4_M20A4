<?php use Carbon\Carbon; ?>

<x-layout>

<div style="background-color:palegoldenrod; color: rgb(60,60,60); padding:10px; border-radius:10px">
    <p>
        <span style="font-weight:bold">Recent response:</span>
        @if( $success == 1 )
            Contact added successfully.
        @elseif( $success == 2)
            Contact updated successfully.
        @elseif( $success == 3)
            Contact deleted successfully.
        @elseif($search == 1)
            Search complete.
        @else
            Welcome to the Contact Management Application!
        @endif
    </p>
</div>

<div>
    <h2>Create new contact</h2>
    <a href="contacts/create"><button>Create</button></a>
</div>

<div>
    <h2>List of all contacts</h2>

    <div style="border-bottom: 1px solid rgba(192,192,192, 0.1); padding-bottom: 10px;  margin-bottom:20px; display:flex;align-items:center;justify-content:flex-start">

        <div>Search by:</div>
        <div>
            <form style="display:inline-block; background: transparent !important; display:flex;align-items:center;justify-content:flex-start" id="searchForm" action="{{ route('contacts.index') }}" method="GET">
                {{-- @csrf --}}
                <input type="hidden" name="search" value=1 />
                <input type="hidden" name="sortBy" value={{$sortBy}} />
                <input type="hidden" name="order" value={{$order}} />

                <div style="inline; width:200px; padding-right:20px">
                    <select name="searchBy" style="display:inline !impportant">
                        <option value="name" {{ $searchBy == 'name' ? 'selected' : ''}} >Name</option>
                        <option value="email" {{ $searchBy == 'email' ? 'selected' : ''}} >Email</option>
                    </select>
                </div>
                <div style="display:inline">
                    <input type="text" name="searchNeedle" value="{{$searchNeedle}}"/>
                </div>
            </form>
        </div>
        <div>
            <button type="submit" form="searchForm">Search</button>
        </div>
        <div style="margin-left: 10px">
            <a href="{{ route('contacts.index', ['sortBy'=>$sortBy, 'order'=>$order, 'search'=>0]) }}">
                <button >Clear search</button>
            </a>
        </div>
    </div>

    <div style="border-bottom: 1px solid rgba(192,192,192, 0.1); padding-bottom: 10px;  margin-bottom:20px">
        Sort by:
        <a href={{ route('contacts.index', ['sortBy'=>'name', 'order'=>'asc', 'search'=>$search, 'searchBy'=>$searchBy, 'searchNeedle'=>$searchNeedle]) }}> <button class="{{ ($sortBy=='name' && $order=='asc') ? 'selected' : '' }}">Name (A-Z)</button></a>
        <a href={{ route('contacts.index', ['sortBy'=>'name', 'order'=>'desc', 'search'=>$search, 'searchBy'=>$searchBy, 'searchNeedle'=>$searchNeedle]) }}> <button class="{{ ($sortBy=='name' && $order=='desc') ? 'selected' : '' }}">Name (Z-A)</button></a>
        <a href={{ route('contacts.index', ['sortBy'=>'created_at', 'order'=>'asc', 'search'=>$search, 'searchBy'=>$searchBy, 'searchNeedle'=>$searchNeedle]) }}> <button class="{{ ($sortBy=='created_at' && $order=='asc') ? 'selected' : '' }}">Date of creation (Oldest first)</button></a>
        <a href={{ route('contacts.index', ['sortBy'=>'created_at', 'order'=>'desc', 'search'=>$search, 'searchBy'=>$searchBy, 'searchNeedle'=>$searchNeedle]) }}> <button class="{{ ($sortBy=='created_at' && $order=='desc') ? 'selected' : '' }}">Date of creation (Latest first)</button></a>
    </div>


    @if(count($contacts) > 0)
        @foreach ($contacts as $contact)
            <a href="{{ route('contacts.show', ['contact' => $contact->id]) }}" display="block" style="color:dodgerblue; ">
                <div class="flex-container contact-card-mini" style="margin-bottom:6px">
                    <div  >
                        {{ $contact->name }} ({{ $contact->email }})
                    </div>
                    <div class="datetime-mini">
                        @if($contact->created_at)
                            {{ Carbon::parse($contact->created_at)->format('l, F j, Y (H:i)') }}
                        @endif
                    </div>
                </div>
            </a>
        @endforeach
    @elseif($search == 1)
        <p>No match found!</p>
    @else
        <p>No contacts found! Create contacts to see it listed here...</p>
    @endif
</div>

</x-layout>
