<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

class FirebaseController extends Controller
{
    public $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function getData()
    {
        $this->database->getReference('coba')
            ->set([
                'name' => 'My Application',
                'emails' => [
                    'support' => 'support@domain.tld',
                    'sales' => 'sales@domain.tld',
                ],
                'website' => 'https://app.domain.tld',
            ]);
    }
}
