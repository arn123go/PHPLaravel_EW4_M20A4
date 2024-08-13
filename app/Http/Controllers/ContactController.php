<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    //public
    public function index(){

        $success = request()->input('success') ?? 0;
        $sortBy = request()->input('sortBy');
        $order = request()->input('order');

        if ( !($sortBy && in_array($sortBy, ['name', 'created_at'])) ) {
            $sortBy = 'name';
        }
        if ( !($order && in_array($order, ['asc', 'desc'])) ) {
            $order = 'asc';
        }

        if ( in_array(request()->input('searchBy'), ['name', 'email']) && request()->input('searchNeedle') && request()->input('search') == 1){
            $search = 1;
            $contacts = DB::table('contacts')
            ->where(request()->input('searchBy'), 'like', '%'. request()->input('searchNeedle') .'%')
            ->orderBy($sortBy, $order)
            ->get();
        }else{
            $search = 0;
           $contacts = DB::table('contacts')
           ->orderBy($sortBy, $order)
           ->get();
        }

        return view(
            'index',
            [
                'success' => $success,
                'sortBy' => $sortBy,
                'order' => $order,
                'search' => $search,
                'searchBy' => $search == 1 ? request()->input('searchBy') : '',
                'searchNeedle' => $search == 1 ? request()->input('searchNeedle') : '',
                'contacts' => $contacts
            ]
        );
    }

    public function create(){
        return view('create');
    }

    public function show($contact){

        $contactInfo = DB::table('contacts')->find($contact);

        if ($contactInfo !== null){
            return view('show', ['contact' => $contactInfo]);
        }else{
            abort(404);
        }
    }

    public function store(){

        request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:contacts'],
            'phone' => ['required'],
            'address' => ['required']
        ]);

        DB::table('contacts')->insert([

            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'phone' => request()->input('phone'),
            'address' => request()->input('address'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        return redirect()->route('contacts.index', ['success' => 1]);
    }

    public function edit($contact){
        $contactInfo = DB::table('contacts')->find($contact);

        if ($contactInfo !== null){
            return view('edit', ['contact' => $contactInfo]);
        }else{
            abort(404);
        }
    }

    public function update($contact){
        $contactInfo = DB::table('contacts')->find($contact);

        if ($contactInfo !== null){

            request()->validate([
                'name' => ['required', 'min:3'],
                'phone' => ['required'],
                'email' => Rule::unique('contacts', 'email')->ignore($contact),
                'address' => ['required']
            ]);

            DB::table('contacts')
            ->where('id', $contact)
            ->update([
                'name' => request()->input('name'),
                'email' => request()->input('email'),
                'phone' => request()->input('phone'),
                'address' => request()->input('address'),
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('contacts.index', ['success' => 2]);

        }else{
            abort(404);
        }
    }

    public function destroy($contact){
        $contactInfo = DB::table('contacts')->find($contact);

        if ($contactInfo !== null){
            DB::table('contacts')->where('id', '=', $contact)->delete();
            return redirect()->route('contacts.index', ['success' => 3]);
        }else{
            abort(404);
        }
    }


}
