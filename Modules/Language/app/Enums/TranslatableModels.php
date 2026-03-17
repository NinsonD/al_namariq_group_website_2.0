<?php

namespace Modules\Language\Enums;

enum TranslatableModels:string
{
    case BLOG = 'Modules\Blog\Models\BlogTranslation';
    case MENU = 'Modules\Menu\Models\MenuTranslation';
    case BRAND = 'Modules\Brand\Models\BrandTranslation';
    case BLOG_CATEGORY = 'Modules\Blog\Models\BlogCategoryTranslation';
    case FRONTEND_SECTIONS = 'Modules\Frontend\Models\SectionTranslation';
    case FAQ = 'Modules\Faqs\Models\FaqTranslation';
    case PAGE = 'Modules\Page\Models\PageTranslation';
    case PORTFOLIO = 'Modules\Portfolio\Models\PortfolioTranslation';
    case PRICEING = 'Modules\Pricing\Models\PricingTranslation';
    case SERVICE = 'Modules\Service\Models\ServiceTranslation';
    case TESTIMONIAL = 'Modules\Testimonial\Models\TestimonialTranslation';
    case PRODUCT = 'Modules\Shop\Models\ProductTranslation';
    case PRODUCT_CATEGORY = 'Modules\Shop\Models\ProductCategoryTranslation';
    case SHIPPING_METHOD = 'Modules\Order\Models\ShippingMethodTranslation';
    case SLIDER = 'Modules\Frontend\Models\SliderTranslation';


    // get all translatable models
    public static function all(): array
    {
        return [
            self::BLOG->value,
            self::MENU->value,
            self::BRAND->value,
            self::BLOG_CATEGORY->value,
            self::FRONTEND_SECTIONS->value,
            self::FAQ->value,
            self::PAGE->value,
            self::PORTFOLIO->value,
            self::PRICEING->value,
            self::SERVICE->value,
            self::TESTIMONIAL->value,
            self::PRODUCT->value,
            self::PRODUCT_CATEGORY->value,
            self::SHIPPING_METHOD->value,
            self::SLIDER->value,
        ];
    }

    public static function retriveIgnoreCols(): array
    {
        return [
            'id',
            'locale',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}
