<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Mail\Contact;
use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function show(): Response
    {
        return Inertia::render('Public/Contact', [
            'site_key' => config('duplex.recaptcha.public')
        ]);
    }

    public function store(SendContactRequest $request): RedirectResponse
    {
        $data = $request->post();
        $data['sent'] = $this->sendEmail($request);

        Message::query()->create($data);

        return Redirect::route('contact');
    }

    private function sendEmail(SendContactRequest $request): bool
    {
        $sent = \Mail::to([[
            'email' => config('mail.from.address'),
            'name' => config('mail.from.name')
        ]])->send(new Contact($request->nombre, $request->email, $request->message));

        return $sent !== null;
    }
}
