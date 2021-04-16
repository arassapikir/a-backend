<?php


namespace App\Traits;


use Illuminate\Http\RedirectResponse;

trait WebResponse
{
    public function created(): RedirectResponse
    {
        return redirect()->back()->with(["success", "Üstünlikli goşuldy."]);
    }

    public function updated(): RedirectResponse
    {
        return redirect()->back()->with(["success", "Üstünlikli üýtgedildi."]);
    }

    public function deleted(): RedirectResponse
    {
        return redirect()->back()->with(["success", "Üstünlikli pozuldy."]);
    }

    public function success(string $message): RedirectResponse
    {
        return redirect()->back()->with(["success", $message]);
    }

    public function error(string $message): RedirectResponse
    {
        return redirect()->back()->withErrors($message);
    }
}
