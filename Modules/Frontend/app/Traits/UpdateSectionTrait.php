<?php

namespace Modules\Frontend\Traits;

use Modules\Frontend\Models\Section;
use Illuminate\Http\Request;
use Modules\Language\Traits\TranslationGenerateTrait;

trait UpdateSectionTrait {
    use TranslationGenerateTrait;

    private function updateSection($content, $request, array $fields, array $images = [], array $switches = [])
    {

        if (is_null($content)) {
            $content = new \stdClass();
        }

        // Update text or array fields
        foreach ($fields as $field) {
            if ($request->has($field)) {
                $value = $request->$field;
                $content->$field = is_array($value) ? json_encode($value) : $value;
            } else {
                // Force empty value if nothing was submitted
                $content->$field = null;
            }
        }

        // Update image fields
        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $file_name = updateMedia($request->file($image), $content->$image ?? null, 'web');
                $content->$image = $file_name;
            } elseif (isset($content->$image)) {
                // Keep existing image
            } else {
                $content->$image = null;
            }
        }

        // Update switch fields (boolean flags)
        foreach ($switches as $switch) {
            $content->$switch = $request->has($switch);
        }

        return $content;
    }

    private function checkSection($slug, $page_id)
    {
        $section = Section::where('slug', $slug)->where('site_page_id', $page_id)->first();

        if (!$section) {
            return abort(404);
        }

        return $section;
    }

    protected function handleSectionUpdate(Request $request, int $pageId, string $slug, array $defaultFields, array $imageFields, array $translatableFields)
    {

        $section = Section::where('site_page_id', $pageId)
            ->where('slug', $slug)
            ->first();

        if (!$section) {
            return abort(404, __('notification.section_not_found'));
        }

        // Validate the request
        $request->validate([
            'code' => 'required|string|max:10|exists:languages,code',
        ],
        [
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.max' => __('rules.max', ['max' => 10]),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.code')]),
        ]);

        $content = $this->updateSection($section?->default_content, $request, $defaultFields, $imageFields);
        $translatedContent = $this->updateSection($section?->content, $request, $translatableFields);

        $section->update([
            'default_content' => $content,
            'status' => $request->has('status'),
        ]);

        $this->updateTranslations(
            $section,
            $request,
            $request->validated(),
            ['content' => $translatedContent],
        );

        return redirect()->back()->with('success', __('notification.section_updated_successfully'));
    }
}
