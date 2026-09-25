<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\PricingPackage;
use App\Models\Review;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        Service::create([
            'name' => 'Pre-Purchase Building Inspection',
            'slug' => 'pre-purchase-building-inspection',
            'short_description' => 'Get a detailed inspection before purchasing your property.',
            'description' => 'Our pre-purchase building inspection helps identify visible defects, maintenance issues and potential concerns before you make an important property investment.',
            'image' => null,
            'starting_price' => 350,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Building & Pest Inspection',
            'slug' => 'building-pest-inspection',
            'short_description' => 'Comprehensive building and pest inspection for your property.',
            'description' => 'A detailed inspection covering the building condition and visible evidence of timber pests and conditions that may encourage pest activity.',
            'image' => null,
            'starting_price' => 450,
            'status' => true,
        ]);

        Service::create([
            'name' => 'New Build Inspection',
            'slug' => 'new-build-inspection',
            'short_description' => 'Independent inspections throughout your new construction.',
            'description' => 'Identify potential defects during important construction stages so issues can be addressed before the project is completed.',
            'image' => null,
            'starting_price' => 300,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Apartment Inspection',
            'slug' => 'apartment-inspection',
            'short_description' => 'Professional inspection services for apartments and units.',
            'description' => 'A detailed inspection designed to help apartment buyers understand the visible condition of their prospective property.',
            'image' => null,
            'starting_price' => 300,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Pest Inspection',
            'slug' => 'pest-inspection',
            'short_description' => 'Check your property for signs of termites and timber pests.',
            'description' => 'Our pest inspection focuses on visible evidence of termites, timber pests and conditions that may contribute to pest activity.',
            'image' => null,
            'starting_price' => 250,
            'status' => true,
        ]);

        Service::create([
            'name' => 'Pre-Handover Inspection',
            'slug' => 'pre-handover-inspection',
            'short_description' => 'Inspect your new property before final handover.',
            'description' => 'A practical inspection to identify visible defects and incomplete work before you accept the final handover of your property.',
            'image' => null,
            'starting_price' => 300,
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | PRICING PACKAGES
        |--------------------------------------------------------------------------
        */

        PricingPackage::create([
            'name' => 'Building Inspection',
            'description' => 'Professional building inspection for property buyers.',
            'price' => 350,
            'features' => [
                'Detailed visual inspection',
                'Major defect identification',
                'Internal inspection',
                'External inspection',
                'Digital inspection report',
                'Clear recommendations',
            ],
            'status' => true,
        ]);

        PricingPackage::create([
            'name' => 'Building & Pest',
            'description' => 'Complete building and pest inspection package.',
            'price' => 450,
            'features' => [
                'Complete building inspection',
                'Pest inspection',
                'Termite risk assessment',
                'Moisture checks',
                'Digital inspection report',
                'Professional advice',
            ],
            'status' => true,
        ]);

        PricingPackage::create([
            'name' => 'Premium Inspection',
            'description' => 'Comprehensive inspection package for maximum peace of mind.',
            'price' => 550,
            'features' => [
                'Building inspection',
                'Pest inspection',
                'Moisture detection',
                'Thermal imaging',
                'Roof and drainage checks',
                'Detailed digital report',
                'Professional consultation',
            ],
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | REVIEWS
        |--------------------------------------------------------------------------
        */

        Review::create([
            'customer_name' => 'Michael R.',
            'rating' => 5,
            'review' => 'Very professional service. The report was detailed, easy to understand and helped us make a confident decision.',
            'status' => true,
        ]);

        Review::create([
            'customer_name' => 'Sarah M.',
            'rating' => 5,
            'review' => 'Excellent inspection service. Everything was explained clearly and the report was delivered promptly.',
            'status' => true,
        ]);

        Review::create([
            'customer_name' => 'Daniel K.',
            'rating' => 5,
            'review' => 'The inspection gave us valuable information before purchasing our home. Highly recommended.',
            'status' => true,
        ]);

        Review::create([
            'customer_name' => 'Emma T.',
            'rating' => 5,
            'review' => 'Professional, thorough and very helpful. Great communication from start to finish.',
            'status' => true,
        ]);

        Review::create([
            'customer_name' => 'James P.',
            'rating' => 5,
            'review' => 'The inspector was thorough and the final report was very clear. Excellent experience.',
            'status' => true,
        ]);

        Review::create([
            'customer_name' => 'Olivia W.',
            'rating' => 5,
            'review' => 'Great service and very detailed inspection. We felt much more confident about our purchase.',
            'status' => true,
        ]);


        /*
        |--------------------------------------------------------------------------
        | FAQ
        |--------------------------------------------------------------------------
        */

        Faq::create([
            'question' => 'Why should I get a building inspection before buying?',
            'answer' => 'A building inspection can help you identify visible defects and potential maintenance concerns before making a major property investment.',
            'status' => true,
            'sort_order' => 1,
        ]);

        Faq::create([
            'question' => 'What is included in a building and pest inspection?',
            'answer' => 'The inspection generally covers accessible areas of the property and looks for visible building defects, timber pest activity and conditions that may contribute to pest problems.',
            'status' => true,
            'sort_order' => 2,
        ]);

        Faq::create([
            'question' => 'How long does an inspection take?',
            'answer' => 'Inspection time depends on the size, type and condition of the property. Your inspector can provide an estimated timeframe when booking.',
            'status' => true,
            'sort_order' => 3,
        ]);

        Faq::create([
            'question' => 'When will I receive my inspection report?',
            'answer' => 'Reports are prepared after the inspection and provided digitally. Delivery time can vary depending on the inspection type and property.',
            'status' => true,
            'sort_order' => 4,
        ]);

        Faq::create([
            'question' => 'Do you inspect new homes?',
            'answer' => 'Yes. New construction can be inspected at important stages to help identify visible defects or incomplete work before handover.',
            'status' => true,
            'sort_order' => 5,
        ]);

        Faq::create([
            'question' => 'Can I book an inspection online?',
            'answer' => 'Yes. You can submit an inspection or quote request through our website and our team can contact you to confirm the details.',
            'status' => true,
            'sort_order' => 6,
        ]);


        /*
        |--------------------------------------------------------------------------
        | BLOG CATEGORIES
        |--------------------------------------------------------------------------
        */

        $buying = BlogCategory::create([
            'name' => 'Property Buying',
            'slug' => 'property-buying',
        ]);

        $inspection = BlogCategory::create([
            'name' => 'Inspections',
            'slug' => 'inspections',
        ]);

        $pest = BlogCategory::create([
            'name' => 'Pest Prevention',
            'slug' => 'pest-prevention',
        ]);


        /*
        |--------------------------------------------------------------------------
        | BLOG POSTS
        |--------------------------------------------------------------------------
        */

        BlogPost::create([
            'blog_category_id' => $buying->id,
            'title' => 'Why You Should Inspect a Property Before Buying',
            'slug' => 'why-you-should-inspect-a-property-before-buying',
            'image' => null,
            'excerpt' => 'Buying a property is a major investment. Learn why an inspection should be part of your property buying process.',
            'content' => 'A property may look perfect during an inspection by the buyer, but visible presentation does not always reveal potential building defects. A professional inspection can provide useful information before you commit to the purchase.',
            'status' => true,
            'published_at' => now(),
        ]);

        BlogPost::create([
            'blog_category_id' => $inspection->id,
            'title' => 'Common Problems Found During Building Inspections',
            'slug' => 'common-problems-found-during-building-inspections',
            'image' => null,
            'excerpt' => 'Learn about some common issues that may be identified during a professional property inspection.',
            'content' => 'Common inspection findings can include cracking, moisture issues, drainage concerns, roof defects, damaged materials and maintenance problems. The severity of each issue should be assessed based on the property and circumstances.',
            'status' => true,
            'published_at' => now(),
        ]);

        BlogPost::create([
            'blog_category_id' => $pest->id,
            'title' => 'Signs of Termites You Should Know About',
            'slug' => 'signs-of-termites-you-should-know-about',
            'image' => null,
            'excerpt' => 'Termites can cause significant damage. Learn about some warning signs and why professional inspection matters.',
            'content' => 'Termites may remain hidden for long periods. Signs can include damaged timber, mud tubes and other visible evidence. Professional inspection can help identify visible evidence and conditions that may encourage termite activity.',
            'status' => true,
            'published_at' => now(),
        ]);


        /*
        |--------------------------------------------------------------------------
        | GALLERY
        |--------------------------------------------------------------------------
        */

        Gallery::create([
            'title' => 'Professional Property Inspection',
            'image' => 'gallery/inspection-1.jpg',
            'description' => 'Professional property inspection.',
            'status' => true,
            'sort_order' => 1,
        ]);

        Gallery::create([
            'title' => 'Building Inspection',
            'image' => 'gallery/inspection-2.jpg',
            'description' => 'Detailed building inspection.',
            'status' => true,
            'sort_order' => 2,
        ]);

        Gallery::create([
            'title' => 'Property Assessment',
            'image' => 'gallery/inspection-3.jpg',
            'description' => 'Property assessment and inspection.',
            'status' => true,
            'sort_order' => 3,
        ]);
    }
}