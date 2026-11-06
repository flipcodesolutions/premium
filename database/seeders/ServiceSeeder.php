<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Seed the application's services.
     */
    public function run(): void
    {
        $services = [

            // =====================================================
            // 1. PRE-PURCHASE BUILDING & PEST INSPECTION
            // =====================================================
            [
                'name' => 'Pre-Purchase Building and Pest Inspection',
                'slug' => 'pre-purchase-building-and-pest-inspection',
                'short_description' => 'Ensure your property is free from structural issues and pest infestations with our comprehensive inspection service, designed to highlight hidden problems that could affect the value or safety of your property.',
                'description' => 'A pre-purchase building and pest inspection provides an independent assessment of accessible areas of a property before purchase. Our inspection looks for visible building defects, deterioration, cracking, moisture concerns, termite and timber pest activity, roof and drainage issues, and other conditions that may require attention. You receive a professional and easy-to-understand report to help you make a more informed property decision.',
                'image' => 'images/pre-purchase.png',
                'starting_price' => 400.00,
                'meta_title' => 'Pre-Purchase Building & Pest Inspection Melbourne | From $400',
                'meta_description' => 'Pre-purchase building inspection by VBA-licensed expert. Check structure, roof, plumbing, electrical & pests. Detailed report in 24 hrs. Book from $400.',
                'meta_keywords' => 'pre purchase building inspection, pest inspection Melbourne, building and pest inspection, property inspection',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 2. BUILDING STAGE BY STAGE INSPECTION
            // =====================================================
            [
                'name' => 'Building Stage by Stage Inspection',
                'slug' => 'building-stage-by-stage-inspection',
                'short_description' => 'Ensure your property is built to the highest standards at every stage of construction. Our stage-by-stage inspections help identify issues early, avoid costly defects, and keep your build on track.',
                'description' => 'Building stage by stage inspections provide independent checks throughout the construction process. Inspections can be arranged at important construction stages such as the foundation, frame, lock-up, fixing and final stages. Our inspection helps identify visible construction defects, workmanship concerns and areas requiring attention before the next stage of construction proceeds.',
                'image' => 'images/building-stage.jpg',
                'starting_price' => null,
                'meta_title' => 'Stage by Stage Building Inspection Melbourne | New Builds',
                'meta_description' => 'Stage-by-stage building inspections in Melbourne—slab, frame, lock-up, fixing & handover. Catch defects early. VBA licensed. Get a quote today.',
                'meta_keywords' => 'stage by stage inspection, new build inspection Melbourne, slab inspection, frame inspection, lock up inspection, building stages',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 3. NEW BUILD HANDOVER INSPECTION
            // =====================================================
            [
                'name' => 'New Build Handover Inspection',
                'slug' => 'new-build-handover-inspection',
                'short_description' => 'Before you accept your new home, make sure everything is built to standard. Our handover inspections give you peace of mind by ensuring your property meets all building codes and quality expectations.',
                'description' => 'A new build handover inspection provides an independent review of accessible areas of your newly constructed property before handover. We look for visible defects, incomplete works, workmanship concerns, damage and other areas that may require attention. The inspection can help property owners understand outstanding issues before accepting their new home.',
                'image' => 'images/new-build-handover.jpg',
                'starting_price' => 450.00,
                'meta_title' => 'New Build Handover Inspection Melbourne | From $450',
                'meta_description' => 'New build handover inspection in Melbourne. VBA-licensed inspector finds defects before settlement. Detailed report in 24 hrs. From $450, book now.',
                'meta_keywords' => 'new build handover inspection, practical completion inspection Melbourne, handover inspection PCI, defect report new home, PCI inspection',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 4. RISING DAMP INSPECTION
            // =====================================================
            [
                'name' => 'Rising Damp Inspection',
                'slug' => 'rising-damp-inspection',
                'short_description' => 'Protect your property from rising damp and hidden moisture damage. Our expert inspections help you detect issues early, avoid costly repairs, and maintain a safe living space.',
                'description' => 'A rising damp inspection helps investigate visible signs of moisture and dampness within accessible areas of a property. Our inspection considers signs such as damp or deteriorated wall surfaces, staining, moisture-related damage and other visible conditions that may require further investigation. Modern moisture detection equipment may be used where appropriate.',
                'image' => 'images/rising-damp.jpg',
                'starting_price' => null,
                'meta_title' => 'Rising Damp Inspection Melbourne | Moisture Detection',
                'meta_description' => 'Rising damp inspection in Melbourne. Detect moisture, peeling paint & hidden damage with advanced tools. Licensed inspector. Book your inspection today.',
                'meta_keywords' => 'rising damp inspection, moisture detection Melbourne, subfloor damp inspection, damp proofing inspection, timber moisture testing',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 5. POOL BARRIER INSPECTION
            // =====================================================
            [
                'name' => 'Pool Barrier Inspection',
                'slug' => 'pool-barrier-inspection',
                'short_description' => 'Ensure your pool complies with Victoria\'s stringent safety regulations. Our certified pool barrier inspections will help you avoid fines and keep your property safe for everyone.',
                'description' => 'Our pool barrier inspection assesses the visible condition of accessible pool barrier areas, including fencing, gates, latches and related components. The inspection is designed to help identify visible issues that may require attention and improve awareness of potential pool barrier safety concerns.',
                'image' => 'images/pool-barrier.jpg',
                'starting_price' => 250.00,
                'meta_title' => 'Pool Barrier Inspection Melbourne | Compliance Certificate | From $250',
                'meta_description' => 'Pool barrier compliance inspection in Melbourne. Meet Victoria safety regulations, avoid fines & keep family safe. Certified checks. From $250, book fast.',
                'meta_keywords' => 'pool barrier inspection, pool fence compliance Melbourne, pool safety certificate Victoria, pool barrier certificate, swimming pool inspection',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 6. APARTMENT BUILDING INSPECTION
            // =====================================================
            [
                'name' => 'Apartment Building Inspection',
                'slug' => 'apartment-building-inspection',
                'short_description' => 'Ensure your property meets insurance requirements with our expert inspections. We provide comprehensive reports to help you secure the best insurance coverage for your property.',
                'description' => 'Apartment building inspections are designed to help buyers understand the visible condition of an apartment before making a purchase. We inspect accessible areas for building defects, cracking, moisture concerns, deterioration, workmanship issues and other observable conditions. The inspection provides useful information to help you make a confident property decision.',
                'image' => 'images/apartment.jpeg',
                'starting_price' => null,
                'meta_title' => 'Apartment Building Inspection Melbourne | VBA Licensed',
                'meta_description' => 'Apartment inspection in Melbourne. We check structure, common areas, HVAC, electrical & fire safety. Clear photo report delivered within 24 hrs.',
                'meta_keywords' => 'apartment building inspection, unit inspection Melbourne, strata inspection, apartment pre purchase inspection, body corporate defects',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 7. DILAPIDATION REPORT
            // =====================================================
            [
                'name' => 'Dilapidation Report',
                'slug' => 'dilapidation-inspection',
                'short_description' => 'Protect your property investment with our dilapidation reports. We document the current condition of your property, providing a reliable reference point for future assessments and disputes.',
                'description' => 'A dilapidation inspection records the existing visible condition of a property before nearby construction, excavation or building works commence. The inspection provides photographic documentation of accessible areas and existing visible conditions so that there is a clear record of the property condition at the time of inspection.',
                'image' => 'images/dilapidation.jpg',
                'starting_price' => null,
                'meta_title' => 'Dilapidation Report Melbourne | Pre-Construction Property Condition',
                'meta_description' => 'Dilapidation report in Melbourne. Photographic evidence of existing property condition before construction. Protect against disputes. Book today.',
                'meta_keywords' => 'dilapidation report Melbourne, dilapidation inspection, pre construction condition report, property dilapidation, council condition report',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 8. VENDOR INSPECTION
            // =====================================================
            [
                'name' => 'Vendor Inspection',
                'slug' => 'vendor-inspection',
                'short_description' => 'Get ahead of the market with a pre-sale inspection. Identify any potential issues that buyers may raise and resolve them before listing your property.',
                'description' => 'A vendor inspection helps property owners understand the visible condition of their property before putting it on the market. Identifying building defects, maintenance concerns, moisture issues, pest-related observations and other visible conditions can help vendors prepare their property and better understand potential issues before sale.',
                'image' => 'images/vendor.jpg',
                'starting_price' => null,
                'meta_title' => 'Vendor Building Inspection Melbourne | Sell With Confidence',
                'meta_description' => 'Pre-sale building inspection in Melbourne. Identify issues early, boost value & avoid renegotiation. Know your property before buyers do. Book today.',
                'meta_keywords' => 'vendor inspection Melbourne, pre sale building inspection, seller property inspection, vendor condition report, property sales inspection',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

            // =====================================================
            // 9. BUILDERS WARRANTY INSPECTION
            // =====================================================
            [
                'name' => 'Builders Warranty Inspection',
                'slug' => 'builders-warranty-inspection',
                'short_description' => 'Ensure your new home meets all standards and regulations with our comprehensive inspections. Our experts provide detailed reports on the structural integrity and safety of your newly constructed home.',
                'description' => 'A builders warranty inspection helps property owners identify visible defects, workmanship concerns and areas requiring attention before applicable warranty periods expire. Our inspection focuses on accessible areas of the property and provides documented observations to help owners understand issues that may need to be addressed.',
                'image' => 'images/builders-warranty.jpg',
                'starting_price' => null,
                'meta_title' => 'Builder Warranty Inspection Melbourne | Don\'t Let It Expire',
                'meta_description' => 'Builder warranty inspection in Melbourne. VBA-licensed inspector finds structural defects & workmanship issues before claim expiry. Book now.',
                'meta_keywords' => 'builder warranty inspection Melbourne, 6 year warranty inspection Victoria, building warranty claim inspection, domestic building insurance report',
                'author' => 'Premium Building & Pest Inspections',
                'status' => true,
            ],

        ];

        // Insert or update services
        foreach ($services as $service) {
            Service::updateOrCreate(
                [
                    'slug' => $service['slug'],
                ],
                [
                    'name' => $service['name'],
                    'short_description' => $service['short_description'],
                    'description' => $service['description'],
                    'image' => $service['image'],
                    'starting_price' => $service['starting_price'],
                    'meta_title' => $service['meta_title'],
                    'meta_description' => $service['meta_description'],
                    'meta_keywords' => $service['meta_keywords'],
                    'author' => $service['author'],
                    'status' => $service['status'],
                ]
            );
        }

        $this->command->info(
            '9 Premium Building & Pest Inspection services have been seeded successfully with dynamic SEO meta properties.'
        );
    }
}
