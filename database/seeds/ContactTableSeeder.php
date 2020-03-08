<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact1 = \App\Contact::create([
            'first_name' => 'Alice',
            'last_name' => 'Doe',
            'address' => 'Miami',
            'company' => 'eMindful',
            'phone_number' => '7861236547'
        ]);



        $contact2 = \App\Contact::create([
            'first_name' => 'Barry',
            'last_name' => 'Smith',
            'address' => 'Orlando',
            'company' => 'eMindful',
            'phone_number' => '4077891234'
        ]);

        //Alice call went to voice mail
        \App\CallLog::create([
            'contact_from_id' => $contact1->id,
            'contact_to_id' => $contact2->id,
            'outbound' => true,
            'voicemail' => true,
        ]);

        //barry received
        \App\CallLog::create([
            'contact_from_id' => $contact1->id,
            'contact_to_id' => $contact2->id,
            'inbound' => true,
            'voicemail' => true,
        ]);

        //Alice called no voice mail
        \App\CallLog::create([
            'contact_from_id' => $contact1->id,
            'contact_to_id' => $contact2->id,
            'outbound' => true,
            'voicemail' => false,
        ]);

        //Barry received, and no voice mail
        \App\CallLog::create([
            'contact_from_id' => $contact1->id,
            'contact_to_id' => $contact2->id,
            'inbound' => true,
            'voicemail' => false,
        ]);

        //barry called
        \App\CallLog::create([
            'contact_from_id' => $contact2->id,
            'contact_to_id' => $contact1->id,
            'outbound' => true,
            'voicemail' => false,
        ]);

        //Alice received
        \App\CallLog::create([
            'contact_from_id' => $contact2->id,
            'contact_to_id' => $contact1->id,
            'inbound' => true,
            'voicemail' => false,
        ]);

    }
}
