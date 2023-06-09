<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    public function message_contact(){
        $messages = Contact::all();
        return view('admin.message_contact', compact('messages'));
    }

    public function destroy_message_contact($id){
        $message = Contact::find($id);
        $delete = $message->delete($id);
        if ($delete) {
            return back()->with("success", "Vous avez supprimé avec succès !");
        }
        return abort(500);
    }

}
