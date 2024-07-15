<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MoreInfo;
use App\Mail\UserLost;
use App\Mail\UserWon;
use App\Models\Legal;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingController extends Controller
{
    public function show()
    {
        return Inertia::render('Admin/Settings/Home');
    }

    public function legal()
    {
        return Inertia::render('Admin/Settings/Legal', [
            'content' => Legal::query()->first()?->content,
        ]);
    }

    public function legalStore(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $content = $request->get('content');

        $model = Legal::query()->get()->first();

        if (!$model)
            $model = Legal::query()->create(['content' => 'BBLLs']);


        $model->update(['content' => $content]);

        return Inertia::render('Admin/Settings/Legal', [
            'content' => $content,
        ]);
    }

    public function emails()
    {
        $emails = [
            'Más info.' => (new MoreInfo('abcdefg'))->render(),
            'Perdido' => (new UserLost('Una razon'))->render(),
            'Ganado' => (new UserWon())->render(),
        ];

        return Inertia::render('Admin/Settings/Emails', [
            'emails' => $emails,
        ]);
    }
}
