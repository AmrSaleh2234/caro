<?php

namespace App\Observers;
use App\Models\User;
use App\Models\Contact;
use App\Events\ContactEvent;

class ContactObserver
{

    public function created(Contact $contact)
    {
        event(new ContactEvent($contact->id));
    }
}
