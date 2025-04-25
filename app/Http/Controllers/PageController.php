<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Repository;

class PageController extends Controller
{
    public function home() {
        $repositories = Repository::factory()->create();

        return view('welcome', [
            'repositories' => $repositories->latest()->get()
        ]);
    }
}
