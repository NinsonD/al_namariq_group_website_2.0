<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Modules\Frontend\Models\Section;

class SectionHelper
{
    public static function getTranslatedSection(Request $request, string $sectionSlug, string $pageSlug)
    {
        $code = $request->get('code') ?? 'en';


        if (!isLanguageAvailable($code)) {
            dd($code);
            abort(404, __('notification.language_not_found'));
        }

        $section = Section::with(['translations' => function ($query) use ($code) {
            $query->where('locale', $code);
        }])
        ->whereHas('page', function ($query) use ($pageSlug) {
            $query->where('slug', $pageSlug);
        })
        ->where('slug', $sectionSlug)
        ->first();



        if (!$section) {
            abort(404, __('notification.section_not_found'));
        }

        $section->setRelation('translation', $section->translations->first());

        return $section;
    }
}
