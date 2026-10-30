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
                    'status' => $service['status'],
                ]
            );
        }

        $this->command->info(
            '9 Premium Building & Pest Inspection services have been seeded successfully.'
        );
    }
}
