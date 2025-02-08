@include('frontend/partials.home.header')

<section id="home" class="hero">
    <div class="hero-content">
        <h1>{{ __('home.hero_heading') }}</h1>
        <p>{{ __('home.hero_subheading') }}</p>
    </div>
</section>

<!-- Onboarding section -->
<section class="onboarding">
    <div class="px-5">
        <h2 class="section-title">{{ __('home.onboarding_title') }}</h2>
        <div class="tiles">
            <div class="tile">
                <h3>{{ __('home.acquire') }}</h3>
                <p>{{ __('home.acquire_desc') }}</p>
            </div>
            <div class="tile">
                <h3>{{ __('home.verify') }}</h3>
                <p>{{ __('home.verify_desc') }}</p>
            </div>
            <div class="tile">
                <h3>{{ __('home.onboard') }}</h3>
                <p>{{ __('home.onboard_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Goals -->
<section class="goals">
    <div class="">
        <div class="d-flex justify-content-center">
            <h2 class="section-title text-white w-400">{{ __('home.goals_title') }}</h2>
        </div>
        <div class="goal-images">
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/market.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_1_title') }}</h3>
                <p>{{ __('home.goal_1_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/candidatesource.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_2_title') }}</h3>
                <p>{{ __('home.goal_2_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/talent.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_3_title') }}</h3>
                <p>{{ __('home.goal_3_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/recuitment.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_4_title') }}</h3>
                <p>{{ __('home.goal_4_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/team.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_5_title') }}</h3>
                <p>{{ __('home.goal_5_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/applicants.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_6_title') }}</h3>
                <p>{{ __('home.goal_6_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/communication.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_7_title') }}</h3>
                <p>{{ __('home.goal_7_desc') }}</p>
            </div>
            <div class="goal-item">
                <img src="{{ asset('backend/assets/images/procedure.png') }}" alt="Logo" class="me-4" />
                <h3>{{ __('home.goal_8_title') }}</h3>
                <p>{{ __('home.goal_8_desc') }}</p>
            </div>
        </div>
    </div>
</section>

<section class="content-faq-section">
    <div class="left-side">
        <div class="content-section">
            <h2 class="padding-right-100">{{ __('home.custom_workflows') }}</h2>
            <p>{{ __('home.custom_workflows_desc') }}</p>
        </div>

        <div class="faq-section">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('home.workflow_customization') }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ __('home.workflow_customization_desc') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('home.diverse_pipelines') }}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ __('home.diverse_pipelines_desc') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{ __('home.shortlist_talent') }}
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ __('home.shortlist_talent_desc') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-side">
        <div class="image-container">
            <img src="{{ asset('backend/assets/images/hiring.png') }}" alt="Hiring" class="me-4" />
        </div>
    </div>
</section>

<!-- Evaluate your background process -->
<section class="content-evaluate-section">
    <div class="bg-process-left-side">
        <div class="image-container">
            <img src="{{ asset('backend/assets/images/evaluate.png') }}" alt="Evaluate" class="me-4" />
        </div>
    </div>

    <div class="bg-process-right-side">
        <div class="content-section pb-0">
            <h2>{{ __('home.elevate_verification') }}</h2>
            <p>{{ __('home.elevate_verification_desc') }}</p>
        </div>

        <div class="faq-section">
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{ __('home.workflow_customization') }}
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ __('home.workflow_customization_desc') }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{ __('home.diverse_pipelines') }}
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            {{ __('home.diverse_pipelines_desc') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- recruiting agencies -->
    <section class="content-agencies-section">
        <div class="agencies-left-side">
            <div class="content-section">
                <h2>@lang('home.collaborate_with_agencies')</span></h2>
                <p class="padding-right-60">@lang('home.boost_your_medical_recruitment')</p>
            </div>

            <div class="faq-section padding-right-60 mb-3">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                @lang('home.invite_agencies')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               @lang('home.invite_agenciess')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('home.enhance_security')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('home.enhance_securitys')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="agencies-right-side">
            <div class="image-container">
                <img src="{{ asset('backend/assets/images/agencies.png') }}" alt="Hiring" />
            </div>
        </div>
    </section>

    <section class="team">
        <div class="team-img">
            <img src="{{ asset('backend/assets/images/team_graph.png') }}" alt="Logo" class="mt-5 me-4" />
        </div>
    </section>

    <section class="analytics-section">
        <div class="left-side">
            <div class="content-section padding-top-80">
                <h2>@lang('home.robust_analytics') </h2>
                <p>@lang('home.robust_analyticss')</p>
            </div>

            <div class="faq-section">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               @lang('home.robusts_analytics')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                              @lang('home.robustss_analytics')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('home.unlock_talent_intelligence')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                              @lang('home.unlock_talent_intelligences')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="analytics-right-side">
            <div class="image-container">
                <img src="{{ asset('backend/assets/images/analytics.png') }}" alt="Hiring" />
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="reports">
            <div class="row g-0 mb-4">
                <div class="col-7 pl-50">
                    <div class="section-title">
                        <h2>
                            @lang('home.reports_for_hiring_needs')
                        </h2>
                    </div>
                    <p class="py-2">
                       @lang('home.share_progress_with_teammates')
                    </p>
                </div>
            </div>
            <div class="reports-section">
                <div class="container">
                    <div>
                        <img src="{{ asset('backend/assets/images/graph.png') }}" alt="Logo" class="me-4" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- visa-process -->
    <section class="visa-process-section">
        <div class="bg-visa-process-left-side">
            <div class="image-container">
                <img src="{{ asset('backend/assets/images/visa-process.png') }}" alt="Evaluate" class="me-4" />
            </div>
        </div>

        <div class="bg-visa-process-right-side">
            <div class="content-section pb-0">
                <h2>@lang('home.advance_visa_processing')</h2>
                <p>@lang('home.advance_visa_processings')</p>
            </div>

            <div class="faq-section">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                @lang('home.accelerate_visa_tracking')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               @lang('home.robustss_analytics')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                               @lang('home.unified_visa_dashboard')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('home.enhance_securitys')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                               @lang('home.tailored_visa_filtration')
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               @lang('home.tailored_visa_filtrations')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- branches and groups -->
    <section class="content-branches-groups">
        <div class="branches-groups-left-side">
            <div class="content-section">
                <h2>@lang('home.customizable_career_pages')
                </h2>
                <p>@lang('home.customizable_career_pagess')</p>
            </div>

            <div class="faq-section">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                               @lang('home.invite_agences')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                          @lang('home.allow_create')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('home.enhance_security')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                               @lang('home.enhance_securitys')
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                @lang('home.tailored_visa_filtration')
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('home.tailored_visa_filtrations')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="branches-groups-right-side">
            <div class="image-container">
                <img src="{{ asset('backend/assets/images/groups.png') }}" alt="Hiring" />
            </div>
        </div>
    </section>

    <section class="global-hiring">
        <div class="row g-0">
            <div class="col-5">
                <div class="row g-0 d-flex align-items-end">
                    <div class="col-5 text-end">
                        <img src="{{ asset('backend/assets/images/zoom.png') }}" alt="zoom" />
                    </div>
                    <div class="col-7 ps-2">
                        <img src="{{ asset('backend/assets/images/meet.png') }}" alt="meet" />
                    </div>
                    <div class="col-10 text-center">
                        <img src="{{ asset('backend/assets/images/linkedIn.png') }}" alt="linkedIn" />
                    </div>
                    <div class="col-2"></div>
                </div>
            </div>
            <div class="col-7">
                <div class="global-content">
                    <h2>@lang('home.integrate_with_hiring_tools')</h2>
                    <p>
                        @lang('home.access_integrated_solutions')
                    </p>
                </div>
            </div>
        </div>
    </section>


@include('frontend/partials.home.footer')
