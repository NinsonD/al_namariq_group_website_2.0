<?php

namespace Modules\Frontend\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Frontend\Http\Requests\ContactRequest;
use Modules\Frontend\Models\Contact;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ContactPageController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:frontend-contact_page_show', ['index']),
            new Middleware('permission:frontend-contact_page_update', ['update']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('frontend::pages.contact', compact('contacts'));
    }

    public function update(ContactRequest $request, $key)
    {
        $contact = Contact::where('key', $key)->firstOrFail();
        $value = $contact->value ?? [];

        $fileId = "contact_{$key}";
        $defaultId = "default_{$key}";

        // Handle image
        if ($request->hasFile($fileId)) {
            $value['image'] = updateMedia(
                $request->file($fileId),
                $value['image'] ?? null,
                'web'
            );
        }

        // Handle standard fields
        foreach (['name', 'phone', 'email', 'address', 'address_link'] as $field) {
            $inputName = "{$field}_{$key}";
            if ($request->has($inputName)) {
                $value[$field] = $request->input($inputName);
            }
        }

        // Handle default toggle
        if ($request->has($defaultId) && $request->boolean($defaultId)) {
            Contact::where('key', '!=', $key)->update(['default' => false]);
            $contact->default = true;
        }

        $contact->value = $value;
        cache()->forget('site_contact');
        $contact->save();

        return redirect()->back()->with('success', __('notification.updated', ['field' => __('admin.contact')]));
    }


}
