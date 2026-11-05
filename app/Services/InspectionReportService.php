<?php

namespace App\Services;

use App\Models\Booking;

class InspectionReportService
{
    /**
     * Generate complete, service-specific report configuration for a booking.
     */
    public static function getReportConfig(Booking $booking): array
    {
        $serviceRaw = strtolower(trim($booking->service_type ?? ''));
        $address = $booking->property_address ?? 'the designated property';
        $clientName = $booking->name ?? 'Valued Client';

        // 1. POOL BARRIER INSPECTION
        if (str_contains($serviceRaw, 'pool') || str_contains($serviceRaw, 'barrier')) {
            return [
                'service_category' => 'pool_barrier',
                'service_display' => 'Pool Barrier Inspection',
                'document_title' => 'Swimming Pool & Spa Safety Barrier Inspection Certificate',
                'doc_type_badge' => 'Pool Safety Audit',
                'standard_code' => 'AS 1926.1-2012',
                'compliance_pill' => 'AS 1926.1 & Vic Regs Part 9A',
                'standards_description' => 'The visual and physical barrier safety audit was conducted in compliance with Australian Standard <strong>AS 1926.1-2012</strong> (Safety Barriers for Swimming Pools) and Victorian Building Regulations (Part 9A - Swimming Pool and Spa Safety).',
                'checklist' => [
                    [
                        'area' => 'Perimeter Barrier Height & Ground Clearance',
                        'scope' => 'Barrier height verified at minimum 1,200mm on outside; gap between bottom of barrier and finished ground level does not exceed 100mm on stable ground.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Access Gate & Self-Closing Swing Direction',
                        'scope' => 'Access gate swings strictly outwards (away from pool enclosure); hinges and self-closing device return gate to fully latched from any open angle without manual assistance.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Latch Release Mechanism Height & Shielding',
                        'scope' => 'Latch release mechanism positioned at minimum 1,500mm above finished ground level (or shielded inside min 1,400mm with statutory 450mm shield radius).',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Non-Climbable Zone (NCZ 1 - 5)',
                        'scope' => 'Continuous 900mm non-climbable quadrant on outside of barrier clear of all foothold elements, steps, pot plants, retaining ledges, horizontal rails, and tree branches.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Boundary Fence Barrier Sections',
                        'scope' => 'Boundary fences utilized as part of the safety barrier verified at minimum 1,800mm in height on the inside of the pool enclosure with statutory 900mm internal NCZ.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Dwelling Openings, Windows & Balcony Access',
                        'scope' => 'Direct door access from dwelling strictly prohibited; openable windows into pool enclosure restricted to maximum 100mm opening or fitted with permanent security grilles.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Barrier Rigidity, Glass Spigots & Structural Anchors',
                        'scope' => 'Glass panels, spigots, posts, palings, and horizontal rails tested for rigidity and deflection resistance under statutory point load tests without loosening.',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'Mandatory CPR Resuscitation Signage',
                        'scope' => 'Durable, UV-resistant Cardiopulmonary Resuscitation (CPR) instructional chart displayed prominently and clearly legible from anywhere inside the pool coping zone.',
                        'outcome' => 'Verified & Displayed',
                    ],
                ],
                'assessment_summary' => "The swimming pool/spa safety barrier at {$address} was inspected for physical compliance with Victorian pool safety laws and AS 1926.1-2012. All accessible barriers, gates, latching systems, clearances, and non-climbable zones were audited and found to meet safety criteria at the time of inspection.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this pool barrier safety inspection for the property specified above in an objective, professional, and compliant manner in accordance with Australian Standard AS 1926.1-2012 and Victorian Building Regulations Part 9A.",
                'disclaimer' => "NOTICE & LIMITATIONS: This pool barrier inspection certificate verifies physical and mechanical barrier compliance at the date and time of inspection only. Property owners must ensure gates are never propped open, latches are regularly maintained, and no climbable objects, furniture, or vegetation are placed within the 900mm Non-Climbable Zone (NCZ) following inspection.",
            ];
        }

        // 2. RISING DAMP INSPECTION
        if (str_contains($serviceRaw, 'damp') || str_contains($serviceRaw, 'moisture')) {
            return [
                'service_category' => 'rising_damp',
                'service_display' => 'Rising Damp Inspection',
                'document_title' => 'Rising Damp & Moisture Diagnostic Inspection Report',
                'doc_type_badge' => 'Moisture Diagnostic',
                'standard_code' => 'AS 4349.1 & Moisture Diagnostic Codes',
                'compliance_pill' => 'AS 4349.1 & Thermal Imaging',
                'standards_description' => 'The moisture assessment was executed in compliance with <strong>AS 4349.1</strong> diagnostic guidelines, utilizing digital pinless radio-frequency scanning, calibrated pin electrical resistance meters, and high-resolution thermal infrared imaging.',
                'checklist' => [
                    [
                        'area' => 'Damp-Proof Course (DPC) Physical Integrity',
                        'scope' => 'Physical inspection of original poly/slate DPC membrane, checking for exterior garden bed bridging, render bridging, mortar gaps, or structural degradation.',
                        'outcome' => 'Audited',
                    ],
                    [
                        'area' => 'Calibrated Digital Moisture Meter Mapping',
                        'scope' => 'Electronic pin and non-invasive capacitance moisture scanning of internal plaster, skirting boards, and masonry across affected perimeter wall zones.',
                        'outcome' => 'Scanned & Recorded',
                    ],
                    [
                        'area' => 'Infrared Thermal Imaging Moisture Sweep',
                        'scope' => 'High-resolution thermal camera scan across internal walls to map concealed capillary action evaporation footprints and cold bridging profiles.',
                        'outcome' => 'Mapped & Profiled',
                    ],
                    [
                        'area' => 'Subfloor Cross-Flow Ventilation & Air Vents',
                        'scope' => 'Audit of subfloor terracotta/concrete air bricks, checking for obstruction, ground mulch buildup, air volume adequacy, and damp subsoil conditions.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Wall Surfaces, Efflorescence & Hygroscopic Salts',
                        'scope' => 'Visual and diagnostic appraisal of salt crystal efflorescence, blistering paintwork, crumbling plaster, and rotting timber skirting boards.',
                        'outcome' => 'Evaluated',
                    ],
                    [
                        'area' => 'External Ground Levels & Perimeter Grading',
                        'scope' => 'Exterior soil level heights relative to internal floor levels, pathway falls away from foundations, and downpipe discharge points.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Plumbing Leak Differential Diagnosis',
                        'scope' => 'Differential pressure and drain line checks to distinguish rising damp capillary action from active concealed water supply or wet area leaks.',
                        'outcome' => 'Checked & Isolated',
                    ],
                    [
                        'area' => 'Damp Mitigation & Remediation Strategy',
                        'scope' => 'Comprehensive recommendations formulated including chemical DPC injection, subfloor mechanical ventilation, and exterior drainage improvements.',
                        'outcome' => 'Formulated',
                    ],
                ],
                'assessment_summary' => "A specialized moisture investigation was performed across all accessible internal and subfloor areas of {$address}. Calibrated moisture readings, hygroscopic salt deposits, and thermal imaging profiles were recorded to establish damp intrusion pathways and capillary ground moisture absorption.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this rising damp and moisture diagnostic inspection objectively using calibrated detection equipment in accordance with AS 4349.1 and professional diagnostic moisture guidelines.",
                'disclaimer' => "NOTICE & LIMITATIONS: Moisture readings reflect atmospheric and subfloor conditions at the date and time of inspection. Weather patterns, seasonal ground water tables, and subfloor ventilation can cause moisture levels to fluctuate over time. Recommendations are provided to mitigate further damage.",
            ];
        }

        // 3. BUILDING STAGE BY STAGE INSPECTION
        if (str_contains($serviceRaw, 'stage')) {
            return [
                'service_category' => 'stage_inspection',
                'service_display' => 'Building Stage by Stage Inspection',
                'document_title' => 'Construction Stage Quality & Structural Compliance Report',
                'doc_type_badge' => 'Stage Compliance Audit',
                'standard_code' => 'NCC 2022 & AS 1684 / AS 2870',
                'compliance_pill' => 'NCC 2022 & VBA Standards',
                'standards_description' => 'The stage inspection was executed in accordance with the <strong>National Construction Code (NCC 2022)</strong>, <strong>AS 2870</strong> (Residential Slabs and Footings), <strong>AS 1684</strong> (Residential Timber-Framed Construction), and the Victorian Guide to Standards & Tolerances.',
                'checklist' => [
                    [
                        'area' => 'Foundation & Concrete Slab Engineering',
                        'scope' => 'Edge beam clearances, vapor retarder membrane, slab surface levels, visible honeycombing, step-downs, and pipe penetrations.',
                        'outcome' => 'Verified',
                    ],
                    [
                        'area' => 'Structural Frame & Load-Bearing Stud Walls',
                        'scope' => 'Stud plumb and spacing, lintel bearing, bottom plate overhang, double studs at openings, nogging alignment, and wall plumb tolerances.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Roof Trusses, Bracing & Tie-Down Connections',
                        'scope' => 'Truss tie-down brackets, speed braces, roof pitch alignment, girder truss brackets, and point load transfer down to foundation elements.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Lock-Up Weatherproofing & Cladding Wrap',
                        'scope' => 'Sarking integrity, vapor barriers, window flashings, brick ties spacing, cavity cleanliness, mortar joints, and weep hole spacing.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Fixing Stage & Wet Area Waterproofing Preparation',
                        'scope' => 'Architraves, skirtings, internal door jambs, wet area wall sheet fixing, floor fall to waste, and puddle flange installations pre-tiling.',
                        'outcome' => 'Audited',
                    ],
                    [
                        'area' => 'Services Rough-In & Framing Stud Notches',
                        'scope' => 'Plumbing pipe penetrations through framing, electrical cabling clearances, and structural timber notching within statutory AS 1684 limits.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Victorian Standards & Tolerances Verification',
                        'scope' => 'Audit against VBA Guide to Standards and Tolerances on wall plumb (max 4mm in 2m), squareness, floor levels, and surface alignment.',
                        'outcome' => 'Checked',
                    ],
                    [
                        'area' => 'Builder Rectification Notice / Snag Catalogue',
                        'scope' => 'Itemised punchlist of non-compliant items compiled with photographic evidence for builder rectification prior to proceeding to subsequent build stage.',
                        'outcome' => 'Catalogued',
                    ],
                ],
                'assessment_summary' => "The construction stage assessment for {$address} was carried out to independently verify workmanship, structural compliance, and building code conformance prior to closing in or progress stage payments.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this independent construction stage inspection objectively in accordance with the National Construction Code, Australian Standards AS 1684/2870, and Victorian Building Authority guidelines.",
                'disclaimer' => "NOTICE & LIMITATIONS: This stage report verifies works visible at the current stage of construction prior to subsequent coverings. Defect notices must be formally submitted to the registered builder for contractual rectification under standard Victorian domestic building contracts.",
            ];
        }

        // 4. NEW BUILD HANDOVER INSPECTION (PCI)
        if (str_contains($serviceRaw, 'handover') || str_contains($serviceRaw, 'pci') || str_contains($serviceRaw, 'new build')) {
            return [
                'service_category' => 'handover',
                'service_display' => 'New Build Handover Inspection',
                'document_title' => 'New Home Practical Completion & Handover (PCI) Inspection Report',
                'doc_type_badge' => 'Handover (PCI) Audit',
                'standard_code' => 'AS 4349.1-2010 & VBA Tolerances',
                'compliance_pill' => 'AS 4349.1 & VBA Standards',
                'standards_description' => 'The pre-handover practical completion inspection was executed in accordance with <strong>AS 4349.1-2010</strong> and the <strong>Victorian Building Authority (VBA) Guide to Standards and Tolerances</strong>.',
                'checklist' => [
                    [
                        'area' => 'External Brickwork, Render & Cladding Finishes',
                        'scope' => 'Perimeter mortar lines, weep holes clear of ground, articulation joints, render texture consistency, paint lines, and meter box sealing.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Roofing System, Gutters & Downpipes',
                        'scope' => 'Colorbond / tile alignment, flashing seals, gutter falls without water ponding, and downpipes securely connected to legal stormwater.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Internal Paint, Plasterboard & Cornices',
                        'scope' => 'Wall plumbness, flashing joints under glancing light, ceiling nail pops, paint coverage, square-set, and cornice line alignment.',
                        'outcome' => 'Audited',
                    ],
                    [
                        'area' => 'Cabinetry, Benchtops & Joinery Margins',
                        'scope' => 'Kitchen island, stone margins, soft-close hardware alignment, vanity units, caulking joints, and interior shelf finishes.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Tiling, Grout & Silicone Waterproof Expansion',
                        'scope' => 'Shower tile lippage, falls to floor waste, silicone sealant around perimeters, and clean tile cuts around tapware and waste outlets.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Windows, Sliding Doors & External Glazing',
                        'scope' => 'Sash operation, weather seals, locks, keys, scratch audit on low-E / double glazed panes, flyscreens, and sliding tracks.',
                        'outcome' => 'Tested',
                    ],
                    [
                        'area' => 'Plumbing Flow, Drainage & Electrical Fixtures',
                        'scope' => 'Water pressure, mixer tap operation, sink drainage speed, power outlets polarity, circuit breaker labels, and rangehood ducting.',
                        'outcome' => 'Tested',
                    ],
                    [
                        'area' => 'Comprehensive Handover Defect Punchlist',
                        'scope' => 'Itemised defect catalogue cross-referenced against VBA standards ready for presentation to builder before final progress payment.',
                        'outcome' => 'Delivered',
                    ],
                ],
                'assessment_summary' => "A comprehensive practical completion review of the newly constructed property at {$address} was performed. Every accessible room, fixture, surface, and service was scrutinized against professional trade finish tolerances.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this new home handover practical completion inspection objectively in accordance with AS 4349.1 and Victorian building finish standards.",
                'disclaimer' => "NOTICE & LIMITATIONS: This report provides the property purchaser with an itemized snagging list for presentation to the builder during the contractual pre-handover defect rectification period prior to final settlement and occupancy permit sign-off.",
            ];
        }

        // 5. DILAPIDATION REPORT
        if (str_contains($serviceRaw, 'dilapidation')) {
            return [
                'service_category' => 'dilapidation',
                'service_display' => 'Dilapidation Report',
                'document_title' => 'Pre-Construction Dilapidation Condition Survey Report',
                'doc_type_badge' => 'Dilapidation Survey',
                'standard_code' => 'AS 4349.1 & Forensic Audit',
                'compliance_pill' => 'AS 4349.1 & Forensic Standards',
                'standards_description' => 'This photographic and forensic condition survey was conducted prior to nearby demolition, excavation, or construction works in compliance with <strong>AS 4349.1</strong> to establish an indisputable baseline record.',
                'checklist' => [
                    [
                        'area' => 'Boundary & Shared Party Walls',
                        'scope' => 'Baseline recording of hairline fissures, existing brick step cracks, mortar separation, and joint stability along boundary interfaces.',
                        'outcome' => 'Documented',
                    ],
                    [
                        'area' => 'Internal Plaster Walls & Ceilings',
                        'scope' => 'High-resolution photographic record of internal room surfaces, cornice junctions, window heads, and door reveal alignments.',
                        'outcome' => 'Documented',
                    ],
                    [
                        'area' => 'External Facades, Brickwork & Cladding',
                        'scope' => 'Settlement crack measurements using optical crack-width comparators; baseline condition of render, cladding, and eaves.',
                        'outcome' => 'Catalogued',
                    ],
                    [
                        'area' => 'Driveways, Paved Paths & Hardscaping',
                        'scope' => 'Survey of concrete flatwork, driveway slabs, expansion joints, differential settlement, and pre-existing fractures.',
                        'outcome' => 'Mapped',
                    ],
                    [
                        'area' => 'Boundary Fencing, Retaining Walls & Gates',
                        'scope' => 'Structural alignment, post verticality, fence lean angle, timber decay, retaining wall bow, or masonry displacement.',
                        'outcome' => 'Audited',
                    ],
                    [
                        'area' => 'Council Assets, Kerb & Footpath Crossover',
                        'scope' => 'Photographic survey of public footpath, nature strip, kerb, and channel directly adjoining subject property boundaries.',
                        'outcome' => 'Logged',
                    ],
                    [
                        'area' => 'Outbuildings, Garages, Sheds & Pergolas',
                        'scope' => 'Condition audit of secondary structures, rooflines, concrete slabs, timber posts, and stormwater connections.',
                        'outcome' => 'Recorded',
                    ],
                    [
                        'area' => 'Photographic Evidence Matrix & Defect Registry',
                        'scope' => 'Complete catalog of dated, high-resolution photographs indexed with crack widths for future dispute protection.',
                        'outcome' => 'Archived',
                    ],
                ],
                'assessment_summary' => "An independent condition survey of {$address} was performed to create a definitive photographic baseline of existing structural, cosmetic, and hardscape conditions prior to civil/construction activities in the vicinity.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this dilapidation condition survey objectively and impartially, recording all visible baseline conditions prior to adjacent construction works.",
                'disclaimer' => "NOTICE & LIMITATIONS: This dilapidation report documents visible pre-existing conditions at the date of survey. It serves as legal baseline evidence for comparison in the event of alleged damage arising from adjacent building or excavation works.",
            ];
        }

        // 6. APARTMENT BUILDING INSPECTION
        if (str_contains($serviceRaw, 'apartment') || str_contains($serviceRaw, 'unit') || str_contains($serviceRaw, 'strata')) {
            return [
                'service_category' => 'apartment',
                'service_display' => 'Apartment Building Inspection',
                'document_title' => 'Strata Apartment Pre-Purchase & Defect Inspection Report',
                'doc_type_badge' => 'Apartment Audit',
                'standard_code' => 'AS 4349.1-2010 (Strata)',
                'compliance_pill' => 'AS 4349.1 (Strata)',
                'standards_description' => 'The strata apartment inspection was executed in compliance with <strong>AS 4349.1-2010</strong> covering accessible private lot areas and immediate interfaces with common property.',
                'checklist' => [
                    [
                        'area' => 'Internal Living, Dining & Bed Spaces',
                        'scope' => 'Walls, ceilings, timber/carpet flooring, internal doors, architraves, cornices, and acoustic door seals.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Kitchen Joinery, Benches & Built-In Appliances',
                        'scope' => 'Cooktop, rangehood exhaust velocity, stone benchtops, cabinetry soft-close, under-sink plumbing, and trap seals.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Bathroom & Ensuite Moisture Audit',
                        'scope' => 'Digital moisture scanning of shower recesses, tile hollows, vanity waste, ventilation fan extraction, and perimeter silicone joints.',
                        'outcome' => 'Scanned',
                    ],
                    [
                        'area' => 'Private Balcony Membrane & Balustrade Safety',
                        'scope' => 'Balcony tile fall to drain, membrane integrity check at threshold, and balustrade safety compliance (minimum 1,000mm height).',
                        'outcome' => 'Compliant',
                    ],
                    [
                        'area' => 'European Laundry & Utility Cupboards',
                        'scope' => 'Laundry trough, washing machine cock valves, clothes dryer moisture venting, and floor waste drain trap.',
                        'outcome' => 'Checked',
                    ],
                    [
                        'area' => 'Glazing, Windows & Acoustic Insulation',
                        'scope' => 'Sliding door tracks, double glazing seal integrity, draft seals, security latches, and window restrictors.',
                        'outcome' => 'Tested',
                    ],
                    [
                        'area' => 'Electrical Sub-Board & Safety Services',
                        'scope' => 'Lot electrical switchboard, RCD circuit breakers, interconnected smoke alarms, and intercom security handset.',
                        'outcome' => 'Tested',
                    ],
                    [
                        'area' => 'Immediate Common Property Interfaces',
                        'scope' => 'Fire-rated entry door operation, door closers, hallway threshold, allocated basement car space, and storage cage.',
                        'outcome' => 'Verified',
                    ],
                ],
                'assessment_summary' => "An independent private lot inspection of {$address} was performed. All internal rooms, kitchen, wet areas, private balcony, services, and accessible common property interfaces were evaluated.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this apartment inspection in accordance with AS 4349.1-2010 standards for strata residential properties.",
                'disclaimer' => "NOTICE & LIMITATIONS: This report covers the internal private lot and immediate visible interfaces. Structural common property components (e.g. building exterior facade, elevators, roof top, communal basement) remain under body corporate jurisdiction.",
            ];
        }

        // 7. BUILDERS WARRANTY INSPECTION
        if (str_contains($serviceRaw, 'warranty')) {
            return [
                'service_category' => 'builders_warranty',
                'service_display' => 'Builders Warranty Inspection',
                'document_title' => 'Builders Statutory Warranty Defect Audit Report',
                'doc_type_badge' => 'Warranty Defect Audit',
                'standard_code' => 'AS 4349.1 & DBI Act 1995',
                'compliance_pill' => 'AS 4349.1 & DBI Act 1995',
                'standards_description' => 'The warranty audit was conducted pursuant to the <strong>Victorian Domestic Building Contracts Act 1995</strong>, <strong>AS 4349.1</strong>, and the <strong>VBA Guide to Standards and Tolerances</strong> prior to warranty expiration.',
                'checklist' => [
                    [
                        'area' => 'Structural Foundation & Slab Settlement',
                        'scope' => 'Differential foundation movement, slab edge dampness, and structural crack assessment against VBA Category limits.',
                        'outcome' => 'Audited',
                    ],
                    [
                        'area' => 'Load-Bearing Framing & Structural Walls',
                        'scope' => 'Wall deflection, lintel sag, roof framing load transfers, and structural movement affecting ceiling and wall alignments.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'External Cladding, Render & Masonry Cracks',
                        'scope' => 'Brickwork articulation joints, cracking around window openings, render delamination, and weep hole clearance.',
                        'outcome' => 'Catalogued',
                    ],
                    [
                        'area' => 'Waterproofing Failures & Water Ingress',
                        'scope' => 'Shower recess leaks, balcony membrane penetrations, and water marks on ceilings from defective roof flashings.',
                        'outcome' => 'Evaluated',
                    ],
                    [
                        'area' => 'Roofing System, Flashings & Rainwater Assets',
                        'scope' => 'Valley irons, ridge capping mortar, box gutters, gutter falls, and roof sheet fasteners integrity.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Doors, Windows & Joinery Movement',
                        'scope' => 'Binding doors/windows due to frame settlement, cabinetry delamination, and countertop joint separations.',
                        'outcome' => 'Checked',
                    ],
                    [
                        'area' => 'Subfloor Moisture & Ventilation Deficiencies',
                        'scope' => 'Ponding water in subfloor, defective agricultural drains, and inadequate subfloor vents under warranty scope.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Itemised Warranty Claim Defect Schedule',
                        'scope' => 'Formal schedule categorizing structural vs non-structural defects with photographic evidence for builder / VMIA claim.',
                        'outcome' => 'Compiled',
                    ],
                ],
                'assessment_summary' => "A comprehensive statutory warranty audit was conducted at {$address} to identify latent defects, waterproofing breaches, and structural non-compliances prior to the expiration of the statutory builder warranty period.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this builders warranty inspection objectively in accordance with Victorian domestic building warranty legislation and AS 4349.1.",
                'disclaimer' => "NOTICE & LIMITATIONS: This report provides an expert defect assessment for submission to the registered builder or domestic building dispute resolution authorities (DBDRV/VMIA/VCAT).",
            ];
        }

        // 8. VENDOR INSPECTION (PRE-SALE)
        if (str_contains($serviceRaw, 'vendor') || str_contains($serviceRaw, 'pre-sale') || str_contains($serviceRaw, 'seller')) {
            return [
                'service_category' => 'vendor_inspection',
                'service_display' => 'Vendor Inspection',
                'document_title' => 'Vendor Pre-Sale Building & Pest Disclosure Report',
                'doc_type_badge' => 'Vendor Pre-Sale Audit',
                'standard_code' => 'AS 4349.1 & AS 4349.3',
                'compliance_pill' => 'AS 4349.1 & AS 4349.3',
                'standards_description' => 'The pre-sale inspection was executed in compliance with <strong>AS 4349.1-2010</strong> and <strong>AS 4349.3-2010</strong> to provide the property owner with full disclosure of building conditions before listing on the market.',
                'checklist' => [
                    [
                        'area' => 'Internal Living Areas & Cosmetic Finishes',
                        'scope' => 'Walls, ceilings, doors, windows, paint condition, and minor settlement items that prospective buyers will flag.',
                        'outcome' => 'Reviewed',
                    ],
                    [
                        'area' => 'External Brickwork, Cladding & Mortar',
                        'scope' => 'Facade integrity, minor cracking, sealant maintenance, fascia boards, and paint finish on exterior trims.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Roofing Exterior & Stormwater Flow',
                        'scope' => 'Broken/displaced roof tiles, rusted valleys, gutter silt build-up, and flashing condition prior to open homes.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Roof Cavity Void & Insulation Status',
                        'scope' => 'Structural trusses, ceiling batts coverage, electrical clearances, and vermin activity checks in roof void.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Subfloor Structure & Ventilation Flow',
                        'scope' => 'Foundation stumps/piers, timber joists, damp course, ground moisture, and subfloor ventilation efficiency.',
                        'outcome' => 'Inspected',
                    ],
                    [
                        'area' => 'Wet Areas & Plumbing Leak Prevention',
                        'scope' => 'Bathrooms, ensuite, laundry, moisture scan around showers, and silicone resealing needs to prevent buyer renegotiations.',
                        'outcome' => 'Scanned',
                    ],
                    [
                        'area' => 'Timber Pest & Termite Risk Assessment',
                        'scope' => 'Full scan for active subterranean termites, borers, fungal timber decay, or conducive conditions around perimeter.',
                        'outcome' => 'Clear / Scanned',
                    ],
                    [
                        'area' => 'Pre-Listing Value-Add Action Checklist',
                        'scope' => 'Prioritized list of cost-effective maintenance items to address prior to open homes to maximize property value.',
                        'outcome' => 'Provided',
                    ],
                ],
                'assessment_summary' => "A pre-sale building and timber pest assessment was completed for {$address}. The vendor is provided with clear visibility into structural health, maintenance priorities, and pest status before listing.",
                'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this vendor pre-sale building and timber pest inspection objectively in accordance with AS 4349.1 and AS 4349.3.",
                'disclaimer' => "NOTICE & LIMITATIONS: This vendor report is prepared for the property owner to assist with pre-market maintenance and disclosure. Prospective purchasers are encouraged to engage an independent pre-purchase inspection.",
            ];
        }

        // 9. DEFAULT: PRE-PURCHASE BUILDING AND PEST INSPECTION
        return [
            'service_category' => 'building_pest',
            'service_display' => $booking->service_type ?: 'Pre-Purchase Building and Pest Inspection',
            'document_title' => 'Comprehensive Pre-Purchase Building & Timber Pest Inspection Report',
            'doc_type_badge' => 'Building & Pest Certificate',
            'standard_code' => 'AS 4349.1-2010 & AS 4349.3-2010',
            'compliance_pill' => 'AS 4349.1 & AS 4349.3',
            'standards_description' => 'The visual inspection was executed in compliance with Australian Standards <strong>AS 4349.1-2010</strong> (Pre-Purchase Inspections of Residential Buildings) and <strong>AS 4349.3-2010</strong> (Timber Pest Inspections).',
            'checklist' => [
                [
                    'area' => 'Internal Living Areas & Rooms',
                    'scope' => 'Walls, ceilings, timber floors, joinery, doors, windows, and architraves throughout all habitable rooms.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'External Building Envelope',
                    'scope' => 'Brickwork, cladding, mortar joints, flashings, lintels, eaves, fascias, and exterior paintwork.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Roof Exterior & Stormwater Drainage',
                    'scope' => 'Roof tiles / metal sheets, flashings, valleys, ridge caps, gutters, downpipes, and stormwater fall.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Roof Space & Framing Void',
                    'scope' => 'Structural roof trusses, rafters, ceiling joists, sarking, insulation, and party walls where accessible.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Subfloor & Foundation Systems',
                    'scope' => 'Concrete slab / stumps, bearers, joists, ventilation, damp course, ant caps, and soil clearance.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Wet Areas & Plumbing Fixtures',
                    'scope' => 'Bathrooms, ensuite, kitchen, laundry, tapware, waste outlets, and electronic moisture checks.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Timber Pest & Termite Evaluation',
                    'scope' => 'Visual scan for subterranean termites, active borer damage, and fungal wood decay throughout accessible zones.',
                    'outcome' => 'Inspected',
                ],
                [
                    'area' => 'Site, Drainage Fall & Outbuildings',
                    'scope' => 'Driveway, pathways, surface grading, boundary fencing, retaining walls, and patio/decking structures.',
                    'outcome' => 'Inspected',
                ],
            ],
            'assessment_summary' => "The visual assessment for {$address} was conducted under standard inspection conditions in accordance with Victorian Building Regulations and Australian Standards AS 4349.1 and AS 4349.3. All accessible elements within the agreed scope have been visually appraised, verified, and noted in our official inspection records.",
            'inspector_declaration' => "I, Ronak Gami, certify that I have conducted this building and pest inspection for the property specified above in an objective, professional, and compliant manner in accordance with Australian Standards AS 4349.1 and AS 4349.3.",
            'disclaimer' => "NOTICE & LIMITATIONS: This inspection completion certificate is a visual report carried out in accordance with Australian Standard AS 4349.1-2010 and AS 4349.3-2010. It is based on visible and readily accessible areas at the time of inspection only. It is not an invasive or destructive test, nor a warranty against future defects. Premium Building & Pest Inspections accepts no liability for concealed, inaccessible, or latent building components.",
        ];
    }
}
