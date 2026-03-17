<?php

namespace Modules\Frontend\Database\Seeders;

use App\Enums\ThemeList;
use Illuminate\Database\Seeder;
use Modules\Frontend\Models\Section;
use Modules\Frontend\Models\SitePage;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $homeOneSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Process Area', 'slug' => 'process'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'Portfolio Area', 'slug' => 'portfolio'],
            ['title' => 'Team Area', 'slug' => 'team'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
            ['title' => 'Testimonial Area', 'slug' => 'testimonial'],
            ['title' => 'Blog Area', 'slug' => 'blog'],
        ];


        foreach ($homeOneSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => 1,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }

        $homeTwoSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'Step Area', 'slug' => 'step'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Portfolio Area', 'slug' => 'portfolio'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'Testimonial Area', 'slug' => 'testimonial'],
            ['title' => 'App Brand Area', 'slug' => 'app-brand'],
            ['title' => 'Benefit Area', 'slug' => 'benefit'],
            ['title' => 'FAQ Area', 'slug' => 'faq'],
        ];

        foreach ($homeTwoSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => 2,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }


        $homeThreeSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
            ['title' => 'Features Area', 'slug' => 'features'],
            ['title' => 'How It Works', 'slug' => 'how-it-works'],
            ['title' => 'App Review', 'slug' => 'app-review'],
            ['title' => 'Dashboard', 'slug' => 'dashboard'],
            ['title' => 'Pricing', 'slug' => 'pricing'],
            ['title' => 'Testimonial', 'slug' => 'testimonial'],
            ['title' => 'FAQ Area', 'slug' => 'faq'],
            ['title' => 'App Download Area', 'slug' => 'app-download'],
        ];

        foreach ($homeThreeSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => 3,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }

        $homeShopSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'Category Area', 'slug' => 'category'],
            ['title' => 'Product Trending Area', 'slug' => 'product-trending'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Products Area', 'slug' => 'products'],
            ['title' => 'Showcase Area', 'slug' => 'showcase'],
            ['title' => 'Newsletter Area', 'slug' => 'newsletter'],
            ['title' => 'Reviews Area', 'slug' => 'reviews'],
            ['title' => 'Features Area', 'slug' => 'features'],
            ['title' => 'Instagram Area', 'slug' => 'instagram'],
        ];


        foreach ($homeShopSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => 4,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }


        $aboutPageID = SitePage::where('slug', 'about')->first()?->id;

        $aboutPageSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'Step Area', 'slug' => 'step'],
            ['title' => 'Our Team', 'slug' => 'team'],
        ];

        foreach ($aboutPageSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => $aboutPageID,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }

        $servicesPageSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'Pricing Area', 'slug' => 'pricing'],
            ['title' => 'Process Area', 'slug' => 'process'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
        ];

        $servicesPageID = SitePage::where('slug', 'services')->first()?->id;

        foreach ($servicesPageSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => $servicesPageID,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }

        // new home page sections
        $homeFiveID = SitePage::where('slug', ThemeList::FIVE->value)->first()?->id;

        $homeFiveSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'Pricing Area', 'slug' => 'pricing'],
            ['title' => 'Process Area', 'slug' => 'process'],
            ['title' => 'Portfolio Area', 'slug' => 'portfolio'],
            ['title' => 'Team Area', 'slug' => 'team'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
            ['title' => 'Testimonial Area', 'slug' => 'testimonial'],
            ['title' => 'Blog Area', 'slug' => 'blog'],
        ];

        foreach ($homeFiveSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => $homeFiveID,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }

        // new home page sections
        $homeSixID = SitePage::where('slug', ThemeList::SIX->value)->first()?->id;

        $homeSixSections = [
            ['title' => 'Hero Area', 'slug' => 'hero'],
            ['title' => 'Text Slider Area', 'slug' => 'text-slider'],
            ['title' => 'About Area', 'slug' => 'about'],
            ['title' => 'Portfolio Area', 'slug' => 'portfolio'],
            ['title' => 'Services Area', 'slug' => 'services'],
            ['title' => 'Banner Area', 'slug' => 'banner'],
            ['title' => 'Fun Fact Area', 'slug' => 'fun-fact'],
            ['title' => 'Brand Area', 'slug' => 'brand'],
            ['title' => 'Our Team', 'slug' => 'team'],
        ];


        foreach ($homeSixSections as $section) {
            $section = Section::create([
                'title' => $section['title'],
                'slug' => $section['slug'],
                'default_content' => null,
                'status' => 0,
                'site_page_id' => $homeSixID,
            ]);

            $section->translations()->createMany([
                [
                    'locale' => 'en',
                    'content' => null,
                ],
                [
                    'locale' => 'hi',
                    'content' => null,
                ],
                [
                    'locale' => 'ar',
                    'content' => null,
                ],
            ]);
        }
    }
}
