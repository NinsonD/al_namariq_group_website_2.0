<?php

namespace App\Traits;

use App\Enums\MessageType;
use App\Enums\RedirectType;
use App\Enums\RedirectMessage;
use Illuminate\Http\RedirectResponse;

trait RedirectTrait
{
    private function redirectWithMessage(string $type, ?string $route = null, array $params = [], array $notification = []): RedirectResponse
    {
        $messages = RedirectMessage::getAll();

        if (! $notification) {
            $notification = [
                'messege' => __($messages[$type]),
                'alert-type' => ($type === RedirectType::ERROR->value) ? MessageType::ERROR->value : MessageType::SUCCESS->value,
            ];
        }

        if ($route) {
            return redirect()->route($route, $params)->with($notification);
        }

        return redirect()->back()->with($notification);
    }
}
