@extends('layouts.app')

@section('title', 'Inspection Agreement | Premium Building & Pest Inspections')

@section('content')

<div class="agreement-page-section">
    <div class="container agreement-container">

        {{-- Alerts --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show agreement-alert" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2 fs-5 text-success"></i>
                    <div>
                        <strong>Agreement Accepted!</strong> {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show agreement-alert" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <strong>Please check the required fields:</strong>
                <ul class="mb-0 mt-1 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Main Page Title --}}
        <h1 class="agreement-main-heading">INSPECTION AGREEMENT</h1>

        {{-- Introductory Information --}}
        <div class="agreement-intro-text">
            <p>
                The Australian Standard for building inspections AS 4349.1-2007 and timber pest inspections AS 4349.3-2010 requires that every pre-purchase inspection has a pre-engagement agreement accepted by the home purchaser (or their solicitor/conveyancer) before commencement of the inspection. To comply with the standard and insurers requirements, read the information below.
            </p>
            <p class="agreement-prompt-text">
                If in agreement, fill in any empty fields at the base of this page and click the “I agree” button.
            </p>
        </div>

        {{-- Scrollable Agreement Section Box with Custom Scrollbar --}}
        <div class="agreement-scroll-box" id="agreementScrollBox">
            <div class="agreement-text-content">

                <h4 class="agreement-box-heading">TYPE OF INSPECTION ORDERED BY YOU:</h4>
                <p>
                    There are 2 parts: <strong>1. Building Inspection.</strong> <strong>2. Timber Pest Inspection</strong>
                </p>

                <h4 class="agreement-box-heading">1. BUILDING INSPECTION</h4>
                <p>
                    <strong>Inspection &amp; Report:</strong> The inspection will be of the Building Elements as outlined in Appendix C of AS4349.1-2007 except for Strata title properties where the inspection will be according to Appendix B of AS4349.1-2007.
                </p>
                <p>
                    To avoid any misunderstanding as to the type of inspection We will carry out and as to the scope of the resulting report You should immediately read, sign and return the email approval of this agreement to Us. If You fail to return the copy to Us and do not cancel the requested inspection then You agree that this document forms the agreement between You and Us. We will carry out the inspection and report as ordered by You in accordance with this agreement and you agree to make full payment before the report is released. In ordering the inspection, You agree that the inspection will be carried out in accordance with the following clauses, which define the scope and limitations of the inspection and the report.
                </p>

                <h4 class="agreement-box-heading">SCOPE OF THE INSPECTION &amp; THE REPORT</h4>
                <ol class="agreement-ordered-list">
                    <li>The Inspection will be carried out in accordance with AS4349.1-2007. <strong>The purpose of the inspection is to provide advice to a prospective purchaser regarding the condition of the property at the date and time of inspection.</strong> Areas for Inspection shall cover all safe and accessible areas.</li>
                    <li>The inspection shall comprise a visual assessment of the items listed in Appendix C to AS4349.1- 2007 for the structures within 30 metres of the building and within the site boundaries including fences.</li>
                </ol>

                <p>Subject to safe and reasonable access (See Definitions below) the Inspection will normally report on the condition of each of the following areas: –</p>
                <ol class="agreement-ordered-list">
                    <li>The interior</li>
                    <li>The subfloor</li>
                    <li>The roof void</li>
                    <li>The roof exterior</li>
                    <li>The exterior</li>
                </ol>

                <p>
                    The inspector will report individually on Major Defects and Safety Hazards evident and visible on the date and time of the inspection. The report will also provide a general assessment of the property and collectively comment on Minor Defects which would form a normal part of property maintenance.
                </p>
                <p>
                    Where a Major Defect has been identified, the inspector will give an opinion as to why it is a Major defect and specify its location.
                </p>

                <h4 class="agreement-box-heading">LIMITATIONS</h4>
                <p>
                    The Inspector will conduct a non–invasive visual inspection which will be limited to those accessible areas and sections of the property to which Safe and Reasonable Access (see Definitions below) is both available and permitted on the date and time of the inspection. Areas where reasonable entry is denied to the inspector, or where safe and reasonable access is not available, are excluded from and do not form part of, the inspection. Those areas may be the subject of an additional inspection upon request following the provision or reasonable entry and access.
                </p>
                <p>
                    The Inspection WILL NOT involve any invasive inspection including cutting, breaking apart, dismantling, removing or moving objects including, but not limited to, roofing, wall and ceiling sheeting, ducting, foliage, mouldings, debris, roof insulation, sarking, sisalation, floor or wall coverings, sidings, fixtures, floors, pavers, furnishings, appliances or personal possessions.
                </p>
                <p>
                    The Inspection and Report compares the inspected building with a building that was constructed in accordance with the generally accepted practice at the time of construction and which has been maintained such that there has been no significant loss of strength and durability.
                </p>
                <p>
                    The Inspection excludes the inside of walls, between floors, inside skillion roofing, inside the eaves, behind stored goods in cupboards, and other areas that are concealed or obstructed. The inspector WILL NOT dig, gouge, force or perform any other invasive procedures.
                </p>
                <p>
                    The Report is not a certificate of compliance that the property complies with the requirements of any Act, regulation, ordinance, local law or by-law, or as a warranty or an insurance policy against problems developing with the building in the future.
                </p>
                <p>
                    The Building Inspection WILL NOT look for or report on Timber Pest Activity. Timber Pest activity will be covered in Part 2 – Timber Pest Inspection. You should have an inspection carried out in accordance with AS 4349.3-2010 Timber Pest Inspections, by a fully qualified, licensed and insured Timber Pest Inspector.
                </p>
                <p>
                    If Timber Pest Damage is found then it will be reported. The inspector will only report on the damage which is visible.
                </p>
                <p>
                    <strong>ASBESTOS:</strong> No inspection for asbestos will be carried out at the property and no report on the presence or absence of asbestos will be provided. If during the course of the Inspection asbestos or materials containing asbestos happened to be noticed then this may be noted in the general remarks section of the report. If asbestos is noted as present within the property then you agree to seek advice from a qualified asbestos removal expert as to the amount and importance of the asbestos present and the cost sealing or of removal.
                </p>
                <p>
                    <strong>MOULD (MILDEW) AND NON-WOOD DECAY FUNGI DISCLAIMER:</strong> No inspection or report will be made for Mould (Mildew) and non-wood decay fungi.
                </p>
                <p>
                    If the property to be inspected is occupied then You must be aware that furnishings or household items may be concealing evidence of problems, which may only be revealed when the items are moved or removed. Where the Report says the property is occupied You agree to:
                </p>
                <ul class="agreement-nested-list">
                    <li>
                        <strong>a)</strong> Obtain a statement from the owner as to:
                        <ul class="agreement-roman-list">
                            <li>any Timber Pest activity or damage;</li>
                            <li>timber repairs or other repairs</li>
                            <li>alterations or other problems to the property known to them</li>
                            <li>any other work carried out to the property including Timber Pest treatments</li>
                            <li>obtain copies of any paperwork issued and the details of all work carried out</li>
                        </ul>
                    </li>
                    <li>
                        <strong>b)</strong> Indemnify the Inspector from any loss incurred by You relating to the items listed in clause a) above where no such statement is obtained.
                    </li>
                </ul>
                <p>
                    The Inspection Will not cover or report the items listed in Appendix D to AS4349.1-2007.
                </p>
                <p>
                    Where the property is a strata or similar title, the inspector will only inspect the interior and immediate exterior of the particular unit requested to be inspected as detailed in Appendix B in AS4349.1-2007. Therefore it is advised that the client obtain an inspection of common areas prior to any decision to purchase.
                </p>
                <p>
                    The Inspection and Report WILL NOT report on any defects which may not be apparent due to prevailing weather conditions at the time of the inspection. Such defects may only become apparent in differing weather conditions.
                </p>
                <p>
                    You agree that We cannot accept any liability for Our failure to report a defect that was concealed by the owner of the building being inspected and You agree to indemnify Us for any failure to find such concealed defects.
                </p>
                <p>
                    Where Our report recommends another type of inspection including an invasive inspection and report then You should have such an inspection carried out prior to the exchange of contracts or end of cooling-off period. If You fail to follow Our recommendations then You agree and accept that You may suffer a financial loss and indemnify Us against all losses that You incur resulting from Your failure to act on Our advice.
                </p>
                <p>
                    The Report is prepared and presented, unless stated otherwise, under the assumption that the existing use of the building will continue as a Residential Property.
                </p>

                <h4 class="agreement-box-heading">GENERALLY</h4>
                <p>
                    In the event of a dispute or a claim arising out of, or relating to the inspection or the report, or any alleged negligent act, error or omission on Our part or on the part of the inspector conducting the inspection, either party may give written notice of the dispute or claim to the other party. If the dispute is not resolved within fourteen (14) days from the service of the written notice then either party may refer the dispute or claim to an independent mediator. The cost shall be met equally by both parties or as agreed as part of the mediation settlement. Should the dispute or claim not be resolved by mediation then one or other of the parties may refer the dispute or claim to the Institute of Arbitrators and Mediators of Australia who will appoint an Arbitrator who will resolve the dispute by arbitration. The Arbitrator will also determine what costs each of the parties are to pay.
                </p>

                <h4 class="agreement-box-heading">THIRD PARTY DISCLAIMER:</h4>
                <p>
                    We will not be liable for any loss, damage, cost or expense, whatsoever, suffered or incurred by any Person other than You in connection with the use of the Inspection Report provided pursuant to this agreement by that Person for any purpose or in any way, including the use of this report for any purpose connected with the sale, purchase, or use of the Property or the giving of security over the Property, to the extent permissible by law. The only Person to whom We may be liable and to whom losses arising in contract or tort sustained may be payable by Us is the Client named on the face page of this Agreement.
                </p>
                <p>
                    <strong>Note:</strong> In the ACT under the Civil Law (Sale of Residential Property) Act 2003 and Civil Law(Sale of Residential Property) Regulations 2004 the report resulting from this inspection may be passed to the purchaser as part of the sale process providing it is carried out not more than three months prior to listing and is not more than six months old.
                </p>
                <p>
                    <strong>Prohibition on the Provision or Sale of the Report</strong><br>
                    The Report may not be sold or provided to any other Person without Our express written permission, unless the Client is authorised to do so by Legislation. If We give our permission it may be subject to conditions such as payment of a further fee by the other Person and agreement from the other Person to comply with this clause.<br>
                    However, We may sell the Report to any other Person although there is no obligation for Us to do so.
                </p>
                <p>
                    <strong>Release</strong><br>
                    You release Us from any and all claims, actions, proceedings, judgments, damages, losses, interest, costs and expenses of whatever nature that the Person may have at any time hereafter arising from the unauthorised provision or sale of the Report by You to a Person without Our express written permission.
                </p>
                <p>
                    <strong>Indemnity</strong><br>
                    You indemnify Us in respect of any and all liability, including all claims, actions, proceedings, judgments, damages, losses, interest, costs and expenses of any nature, which may be incurred by, brought, made or recovered against Us arising directly or indirectly from the unauthorised provision or sale of the Report by You to a Person without Our express written permission.
                </p>

                <h4 class="agreement-box-heading">DEFINITIONS:</h4>
                <p>
                    You should read and understand the following definitions of words used in this Agreement and the Report. This will help You understand what is involved in a property and building inspection, the difficulties faced by the inspector and the contents of the Report which We will provide You following the Inspection.
                </p>
                <p>
                    <strong>Acceptance Criteria:</strong> The Building shall be compared with a building that was constructed in accordance with the generally accepted practice at the time of construction and which has been maintained such that there has been no significant loss of strength and serviceability.
                </p>
                <p>
                    <strong>Access hole (cover)</strong> means an opening in the structure to allow for safe entry to carry out an inspection.
                </p>
                <p>
                    <strong>Accessible area</strong> means an area of the site where sufficient safe and reasonable access is available to allow inspection within the scope of the inspection.
                </p>
                <p>
                    <strong>Building Element</strong> means a portion of a building that, by itself or in combination with other such parts, fulfils a characteristic function.
                </p>
                <p>
                    <strong>Client</strong> means the person(s) or other legal entity for which the inspection is to be carried out. If ordered by the person(s)’s agent then it is agreed that the agent represents the person(s) and has the authority to act for and on their behalf. (See also “You/Your” below)
                </p>
                <p>
                    <strong>Defect</strong> means a fault or deviation from the intended condition of the material, assembly or component.
                </p>
                <p>
                    <strong>Inspector</strong> means the person or organisation responsible for carrying out the inspection. (See also “Our/Us/We” below.)
                </p>
                <p>
                    <strong>Limitation</strong> means any factor that prevents full achievement of the purpose of the inspection.
                </p>
                <p>
                    <strong>Major defect</strong> means a defect of sufficient magnitude where rectification has to be carried out in order to avoid unsafe conditions, loss of utility or further deterioration of the property.
                </p>
                <p>
                    <strong>Minor defect</strong> means a defect other than a Major defect.
                </p>
                <p>
                    <strong>Person</strong> means any individual, company, partnership or association who is not a Client.
                </p>
                <p>
                    <strong>Property</strong> means the structures and boundaries etc up to thirty (30m) metres from the exterior walls of the main building but within the boundaries of the land on which the main building is erected.
                </p>
                <p>
                    <strong>Report</strong> means the document and any attachments issued to You by Us following Our inspection of the property.
                </p>
                <p>
                    <strong>Structural Inspection</strong> means the inspection shall comprise visual assessment of accessible areas of the property to identify major defects to the building structure and to form an opinion regarding the general condition of the structure of the property.
                </p>
                <p>
                    The Report will not include those items noted in Clause A3 of AS 4349.1-2007 e.g. Condition of roof coverings, partition walls, cabinetry, doors, trims, fencing, minor structures, ceiling linings, windows, non-structural &amp; serviceability damp issues, rising damp, condensation etc.
                </p>
                <p>
                    <strong>Safe and Reasonable Access</strong> does not include the use of destructive or invasive inspection methods or moving furniture or stored goods.
                </p>
                <p>
                    The Standard defines the extent of safe and reasonable access as follows:
                </p>
                <blockquote class="agreement-quote">
                    “The extent of accessible areas shall be determined by the inspector at the time of inspection, based on the conditions encountered at the time of the inspection. The inspector shall also determine whether sufficient space is available to allow safe access. The inspection shall include only accessible areas and areas that are within the inspector’s line of sight and close enough to enable reasonable appraisal.”
                </blockquote>
                <p>
                    It also defines access to areas as defined in the Table below.
                </p>
                <p>
                    <strong>Access Table from AS 4349.1-2007</strong>
                </p>
                <p>
                    <strong>Table Notes:</strong><br>
                    Reasonable access does not include the cutting of access holes or the removal of screws and bolts or any other fastenings or sealants to access covers.<br>
                    Sub floor areas sprayed with Chemicals should not be inspected unless it is safe to do so.
                </p>
                <p>
                    <strong>Our/Us/We</strong> means the company, partnership or individual named below that You have requested to carry out the property inspection and report.
                </p>
                <p>
                    <strong>You/Your</strong> means the party identified on the face page of this agreement as the Client, and where more than one party all such parties jointly and severally, together with any agent of that party.
                </p>
                <p>
                    You agree that in signing this agreement You have read and understand the contents of this agreement and that the inspection will be carried out in accordance with this document. You agree to make full payment before the report is released.
                </p>
                <p>
                    If You fail to sign and return a copy of this agreement to Us and do not cancel the requested inspection then You agree that You have read and understand the contents of this agreement and that We will carry out the inspection on the basis of this agreement and that We can rely on this agreement.
                </p>
                <p>
                    <em>Note: Additional inspection requirements requested by You may incur additional expense in regard to the cost of the inspection.</em>
                </p>

                <h4 class="agreement-box-heading">2. TIMBER PEST INSPECTION</h4>
                <p>
                    <strong>AS 4349.3 2010 Pre-purchase Timber Pest Inspection.</strong>
                </p>
                <p>
                    To avoid any misunderstanding as to the type of inspection We will carry out and as to the scope of the resulting report You should immediately read, sign and return the white copy of this agreement to Us. If You fail to return the copy to Us and do not cancel the requested inspection then You agree that this document forms the agreement between You and Us. We will carry out the inspection and report as ordered by You in accordance with this agreement and You agree to make full payment before the report is released. In ordering the inspection, You agree that the inspection will be carried out in accordance with the following clauses, which define the scope and limitations of the inspection and the report.
                </p>

                <h4 class="agreement-box-heading">INSPECTION.</h4>
                <p>
                    In the case of Pre-purchase Timber Pest Inspections and all Timber Pest Inspections the inspection will be in accord with the requirements of Australian Standard AS 4349.3-2010 Inspection of buildings Part 3: Timber pest inspections.
                </p>
                <p>
                    In the case of Termite Inspections the inspection will be carried out within and around existing buildings and structures.
                </p>
                <p>
                    A copy of these Australian Standards may be obtained from RAPID Solutions at Your cost by phoning (02) 49543655 or from Standards Australia.
                </p>
                <p>
                    Termite Inspections will be conducted under AS 4349.3-2010.
                </p>
                <p>
                    All inspections will be a non-invasive visual inspection and will be limited to those areas and sections of the property to which Reasonable Access (see definitions below) is both available and permitted on the date and time of Inspection.
                </p>
                <p>
                    The inspector may use a probe or screwdriver to tap and sound some timbers and may use a sharp knife to carry out some ‘splinter testing’ on structural timbers in the subfloor and/or roof void. Splinter testing WILL NOT be carried out where the inspection is being carried out for a Client who is a purchaser and not the owner of the property being inspected. The inspector may use a moisture meter to check moisture levels in walls that back onto wet areas such as showers etc. Other than these areas the moisture meter will not be used on other surfaces except where the visual inspection indicates that there may be a need to further test the area.
                </p>
                <p>
                    The inspection WILL NOT involve any invasive inspection including cutting, breaking apart, dismantling, removing or moving objects including, but not limited to, roofing, wall and ceiling sheeting, ducting, foliage, mouldings, debris, roof insulation, sarking, sisalation, floor or wall coverings, sidings, fixtures, floors, pavers, furnishings, appliances or personal possessions.
                </p>
                <p>
                    The inspector CANNOT see or inspect inside walls, between floors, inside skillion roofing, inside the eaves, behind stored goods in cupboards, in other areas that are concealed or obstructed. Insulation in the roof void may conceal the ceiling timbers and make inspection of the area unsafe. The inspector WILL NOT dig, gouge, force or perform any other invasive procedures. An invasive inspection will not be performed unless a separate contract is entered into.
                </p>
                <p>
                    If the property to be inspected is occupied then You should be aware that furnishings or household items may be concealing evidence of Timber Pests, which may only be revealed when the items are moved or removed. In some case the concealment may be deliberate. If You are the purchaser and not the owner of the property to be inspected then You should obtain a statement from the owner as to any timber pest activity or damage to the property known to them and what, if any, treatments have been carried out to the property. It is important to obtain copies of any paperwork issued and the details of any repairs carried out. Ideally the information obtained should be given to the inspector prior to the inspection being conducted.
                </p>

                <h4 class="agreement-box-heading">SCOPE OF THE INSPECTION &amp; REPORT.</h4>
                <p>
                    In the case of Pre-purchase Timber Pest Inspections or Timber Pest Inspections in accord with AS 4349.3-2010 the Inspection and resulting Report will be confined to reporting on the discovery, or non discovery, of infestation and/or damage caused by subterranean and damp wood termites (white ants), borers of seasoned timber and wood decay fungi (rot), present on the date and time of the Inspection.
                </p>
                <p>
                    In the case of all Termite Inspections in accord with AS 3660.2-2000 inspections the Inspection and resulting Report will be confined to reporting on the discovery, or non discovery, of infestation and/or damage caused by subterranean and dampwood termites (white ants) present on the date and time of the Inspection.
                </p>
                <p>
                    In both cases the Inspection will not cover any other pests and the Report will not comment on them. Dry wood termites (Family: KALOTERMITIDAE) and European House Borer (Hylotrupes bujulus Linnaeus) will be excluded from the Inspection.
                </p>
                <p>
                    The inspection will report any evidence of a termite treatment found at the time of the inspection. Where evidence of a treatment is reported then the Client should assume that the treatment was applied as a curative and not as a preventative. You should obtain a statement from the owner as to any treatments that have been carried out to the property. It is important to obtain copies of any paperwork issued.
                </p>
                <p>
                    <strong>MOULD:</strong> Mildew and non wood decay fungi is commonly known as Mould and is not considered a Timber Pest. However, Mould and their spores may cause health problems or allergic reactions such as asthma and dermatitis in some people. No inspection for Mould will be carried out at the property and no report on the presence or absence of Mould will be provided. Should any evidence of Mould happen to be noticed during the inspection, it will be noted in the General Remarks section of this report. If Mould is noted as present within the property and you are concerned as to the possible health risk resulting from its presence then you should seek advice from your local Council, State or Commonwealth Government Health Department or a qualified expert such as an Industry Hygienist.
                </p>

                <h4 class="agreement-box-heading">LIMITATIONS.</h4>
                <p>
                    Nothing contained in the Report will imply that any inaccessible or partly inaccessible area(s) or section(s) of the property are not, or have not been, infested by termites or timber pests. Accordingly the Report will not guarantee that an infestation and/or damage does not exist in any inaccessible or partly inaccessible areas or sections of the property. Nor can it guarantee that a future infestation of Timber Pests will not occur or be found.
                </p>

                <h4 class="agreement-box-heading">DETERMINING EXTENT OF DAMAGE.</h4>
                <p>
                    The Report will state timber damage found as ‘slight’, ‘moderate’, ‘moderate to extensive’ or ‘extensive and severe’. This information is not the opinion of an expert, as the inspector is not qualified to give an expert opinion. The Report will not and cannot state the full extent of any timber pest damage. If any evidence of Timber Pest activity and/or damage resulting from Timber Pest activity is reported either in the structure(s) or the grounds of the property, then You must assume that there may be some structural or concealed damage within the building(s). An invasive Timber Pest Inspection (for which a separate contract is required) should be carried out and You should arrange for a qualified person such as a Builder, Engineer, or Architect to carry out a structural inspection and to determine the full extent of the damage and the extent of repairs that may be required.
                </p>
                <p>
                    If Timber Pest activity and/or damage are found, within the structures or the grounds of the property, then damage may exist in concealed areas, eg framing timbers. In this case an invasive inspection is strongly recommended. Damage may only be found when wall linings, cladding or insulation are removed to reveal previously concealed timber. You agree that neither We nor the individual conducting the Inspection is responsible or liable for the repair of any damage whether disclosed by the report or not.
                </p>
                <p>
                    <strong>Report</strong> means the report issued to You by Us following Our inspection of the property.
                </p>
                <p>
                    <strong>Termites</strong> means subterranean and dampwood termites (white ants) and does not include Dry wood Termites.
                </p>
                <p>
                    <strong>Timber Pests</strong> means subterranean and dampwood termites (white ants), borers of seasoned timber and wood decay fungi (rot).
                </p>
                <p>
                    <strong>Our/Us/We</strong> means the company, partnership or individual named below that You have requested to carry out a timber pest or termite inspection and report.
                </p>
                <p>
                    <strong>You/Your</strong> means the party identified as the Client on the face page of this agreement, and where more than one party all such parties jointly and severally, together with any agent of that party.
                </p>

                <h4 class="agreement-box-heading">UNDERSTANDING.</h4>
                <p>
                    If there is anything in this agreement that You do not understand then, prior to the commencement of the inspection, You must contact Us by phone or in person and have Us explain and clarify the matter to your satisfaction. Your failure to contact Us means that You have read this agreement and do fully understand the contents.
                </p>
                <p>
                    You agree that in signing this agreement You have read and understand the contents of this agreement and that the inspection will be carried out in accordance with this document. You agree to make full payment before the report is released.
                </p>
                <p>
                    If You fail to sign and to return a copy of this agreement to Us and do not cancel the requested inspection then You agree that You have read and understand the contents of this agreement and that we will carry out the inspection on the basis of this agreement and that we can rely on this agreement.
                </p>

            </div>
        </div>

        {{-- Agreement Acceptance Form Matching Design --}}
        <div class="agreement-form-wrapper">
            <form action="{{ route('inspection.agreement.store') }}" method="POST">
                @csrf

                {{-- Row 1: First Name & Last Name --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control agreement-input @error('first_name') is-invalid @enderror"
                               id="first_name"
                               name="first_name"
                               value="{{ old('first_name') }}"
                               placeholder="First Name"
                               required>
                    </div>

                    <div class="col-md-6">
                        <input type="text"
                               class="form-control agreement-input @error('last_name') is-invalid @enderror"
                               id="last_name"
                               name="last_name"
                               value="{{ old('last_name') }}"
                               placeholder="Last Name"
                               required>
                    </div>
                </div>

                {{-- Row 2: Phone & Email --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="tel"
                               class="form-control agreement-input @error('phone') is-invalid @enderror"
                               id="phone"
                               name="phone"
                               value="{{ old('phone') }}"
                               placeholder="Phone"
                               required>
                    </div>

                    <div class="col-md-6">
                        <input type="email"
                               class="form-control agreement-input @error('email') is-invalid @enderror"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Email"
                               required>
                    </div>
                </div>

                {{-- Row 3: Property Address & Agent Mobile Number --}}
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text"
                               class="form-control agreement-input @error('property_address') is-invalid @enderror"
                               id="property_address"
                               name="property_address"
                               value="{{ old('property_address') }}"
                               placeholder="Property Address"
                               required>
                    </div>

                    <div class="col-md-6">
                        <input type="tel"
                               class="form-control agreement-input @error('agent_mobile') is-invalid @enderror"
                               id="agent_mobile"
                               name="agent_mobile"
                               value="{{ old('agent_mobile') }}"
                               placeholder="Agent Mobile Number">
                    </div>
                </div>

                {{-- Row 4: Submit Button --}}
                <div class="mb-5 mt-2">
                    <button type="submit" class="agreement-submit-btn">
                        I Agree
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

{{-- CSS STYLES MATCHING SCREENSHOT 1:1 --}}
<style>
    /* PAGE WRAPPER */
    .agreement-page-section {
        background-color: #ffffff;
        padding: 45px 0 65px;
        min-height: 80vh;
        font-family: 'Poppins', sans-serif;
    }

    .agreement-container {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* MAIN HEADING */
    .agreement-main-heading {
        color: #082f57;
        font-family: 'Montserrat', sans-serif;
        font-size: clamp(32px, 4.5vw, 42px);
        font-weight: 900;
        letter-spacing: -0.5px;
        text-transform: uppercase;
        margin-top: 5px;
        margin-bottom: 22px;
        line-height: 1.15;
    }

    /* INTRO PARAGRAPHS */
    .agreement-intro-text p {
        color: #374151;
        font-size: 14.5px;
        line-height: 1.7;
        margin-bottom: 16px;
    }

    .agreement-intro-text .agreement-prompt-text {
        color: #374151;
        font-size: 14.5px;
        line-height: 1.6;
        margin-bottom: 24px;
    }

    /* SCROLLABLE AGREEMENT BOX */
    .agreement-scroll-box {
        border: 1px solid #dcdfe3;
        border-radius: 4px;
        background: #ffffff;
        padding: 26px 30px;
        max-height: 420px;
        overflow-y: scroll;
        margin-bottom: 22px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.02);
    }

    /* CUSTOM GREEN SCROLLBAR */
    .agreement-scroll-box::-webkit-scrollbar {
        width: 8px;
    }

    .agreement-scroll-box::-webkit-scrollbar-track {
        background: #f1f4f8;
        border-radius: 4px;
    }

    .agreement-scroll-box::-webkit-scrollbar-thumb {
        background: #43a900;
        border-radius: 4px;
    }

    .agreement-scroll-box::-webkit-scrollbar-thumb:hover {
        background: #368800;
    }

    /* TEXT CONTENT INSIDE SCROLL BOX */
    .agreement-text-content {
        color: #333333;
        font-size: 13.5px;
        line-height: 1.75;
    }

    .agreement-box-heading {
        color: #111827;
        font-family: 'Montserrat', sans-serif;
        font-size: 14.5px;
        font-weight: 800;
        text-transform: uppercase;
        margin-top: 22px;
        margin-bottom: 10px;
        letter-spacing: 0.2px;
    }

    .agreement-box-heading:first-child {
        margin-top: 0;
    }

    .agreement-text-content p {
        margin-bottom: 12px;
    }

    .agreement-ordered-list {
        padding-left: 20px;
        margin-bottom: 14px;
    }

    .agreement-ordered-list li {
        margin-bottom: 6px;
    }

    .agreement-nested-list {
        list-style-type: none;
        padding-left: 0;
        margin-bottom: 14px;
    }

    .agreement-nested-list > li {
        margin-bottom: 10px;
    }

    .agreement-roman-list {
        list-style-type: lower-roman;
        padding-left: 24px;
        margin-top: 6px;
    }

    .agreement-roman-list li {
        margin-bottom: 4px;
    }

    .agreement-quote {
        border-left: 3px solid #cbd5e1;
        padding-left: 16px;
        margin: 12px 0;
        font-style: italic;
        color: #4b5563;
    }

    /* FORM STYLES */
    .agreement-form-wrapper {
        margin-top: 5px;
    }

    .agreement-input {
        background-color: #eef3f8 !important;
        border: 1px solid #e1e7ec !important;
        border-radius: 4px !important;
        height: 48px !important;
        padding: 0 16px !important;
        font-size: 14px !important;
        color: #1f2937 !important;
        box-shadow: none !important;
        transition: all 0.2s ease-in-out !important;
    }

    .agreement-input::placeholder {
        color: #7b8a9c;
        font-size: 14px;
    }

    .agreement-input:focus {
        background-color: #ffffff !important;
        border-color: #43a900 !important;
        box-shadow: 0 0 0 3px rgba(67, 169, 0, 0.15) !important;
        outline: none !important;
    }

    .agreement-submit-btn {
        width: 100%;
        height: 48px;
        background-color: #43a900;
        color: #ffffff;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 15px;
        border: none;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background-color 0.2s ease;
        text-transform: none;
    }

    .agreement-submit-btn:hover {
        background-color: #388e00;
        color: #ffffff;
    }

    .agreement-alert {
        border-radius: 4px;
        border-left: 5px solid #43a900;
        background-color: #f0fdf4;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .agreement-page-section {
            padding: 30px 0 50px;
        }

        .agreement-scroll-box {
            padding: 18px 20px;
            max-height: 380px;
        }

        .agreement-main-heading {
            font-size: 28px;
            margin-bottom: 16px;
        }

        .agreement-intro-text p {
            font-size: 13.5px;
        }
    }
</style>

@endsection