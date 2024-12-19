<x-frontend-app-layout :title="'Project'">

    <!-- Contact Section Start -->
    <section>
        <div class="container-fluid px-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-section">
                        <img src="https://www.openproject.org/assets/images/contact/hero-contact-4cf9fa21.png"
                            alt="" />
                        <div class="text-overlay">
                            <h3>Our Pricing</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing -->

    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center">
                        <h1>General Pricing</h1>
                        <span class="line ms-2"></span>
                    </div>
                </div>

                <div class="col-lg-12">

                    <div class="snip1240">

                        @foreach ($price_plans as $price_plan)
                            @php
                                $currency = $price_plan->currency;
                            @endphp
                            <div class="plan">

                                <header>

                                    <h3 class="plan-title">{{ $price_plan->name }}</h3>

                                    <div class="plan-cost">

                                        <span class="plan-price">
                                            @if ($currency == 'taka')
                                                {{ 'tk' }}
                                            @elseif ($currency == 'dollar')
                                                {{ '$' }}
                                            @elseif ($currency == 'euro')
                                                {{ '€' }}
                                            @elseif ($currency == 'pound')
                                                {{ '£' }}
                                            @else
                                            @endif
                                        </span>
                                        <span>{{ $price_plan->price }}</span>
                                        <span class="plan-type">/ {{ $price_plan->duration }}</span>
                                    </div>
                                </header>

                                <ul class="plan-features">
                                    <li>5 Page Include</li>
                                    <li>1 MySQL Databases (Backups)</li>
                                    <li>2 Month Maintanance</li>
                                    <li>Content Upload not include</li>
                                    <li>Graphics design include</li>
                                    <li>1/30 (monthly) Support</li>
                                </ul>

                                <div class="plan-select"><a href="">Select Plan</a></div>

                            </div>
                        @endforeach

                        {{-- <div class="plan">
                            <header>
                                <h3 class="plan-title">Standard</h3>
                                <div class="plan-cost">
                                    <span class="plan-price">$329</span><span class="plan-type">/mo</span>
                                </div>
                            </header>
                            <ul class="plan-features">
                                <li>10 Pages Included</li>
                                <li>3 MySQL Databases (Backups)</li>
                                <li>6 Months Maintenance</li>
                                <li>Content Upload Included</li>
                                <li>Basic Graphics Design Included</li>
                                <li>5/30 (monthly) Support</li>
                            </ul>
                            <div class="plan-select"><a href="">Select Plan</a></div>
                        </div> --}}

                        {{-- Custom Page  --}}
                        <div class="plan featured">

                            <form action="{{ route('pricing.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <header>
                                    <h3 class="plan-title">Custom Build</h3>
                                    <div class="plan-cost">
                                        <span class="plan-price"><i class="fa-solid fa-scale-balanced"></i></span>
                                    </div>
                                </header>

                                <ul class="plan-features">
                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">How much is the page cost?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="pageCount" name="page_number">
                                                <option>Choose..</option>
                                                <option value="1">1 Page</option>
                                                <option value="2">2 Pages</option>
                                                <option value="3">3 Pages</option>
                                                <option value="4">4 Pages</option>
                                                <option value="5">5 Pages</option>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </li>

                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">Frontend used?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="technologySelect" name="frontend_technology">
                                                <option>Choose..</option>
                                                <option value="html">HTML</option>
                                                <option value="css">CSS</option>
                                                <option value="javascript">JavaScript</option>
                                                <option value="react">React</option>
                                                <option value="laravel">Laravel</option>
                                                <option value="nodejs">Node.js</option>
                                            </select>
                                        </div>
                                    </li>

                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">Database included?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="databaseSelect" name="database">
                                                <option>Choose..</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">Content upload included?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="databaseSelect" name="content">
                                                <option>Choose..</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">Months of maintenance?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="databaseSelect" name="maintenance_duration">
                                                <option>Choose..</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-0">Is graphic design included?</p>
                                        </div>
                                        <div>
                                            <select class="rounded-1" id="databaseSelect" name="graphic_design">
                                                <option>Choose..</option>
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                                <div class="plan-select">
                                    <button type="submit" class="my-4 px-4 py-2">Select Plan</button>
                                </div>
                            </form>

                        </div>
                        {{-- Custom Page  --}}


                        <div class="plan">
                            <header>
                                <h3 class="plan-title">Premium</h3>
                                <div class="plan-cost">
                                    <span class="plan-price">$599</span><span class="plan-type">/monthly</span>
                                </div>
                            </header>
                            <ul class="plan-features">
                                <li>20 Pages Included</li>
                                <li>10 MySQL Databases (Backups)</li>
                                <li>12 Months Maintenance</li>
                                <li>Content Upload Included</li>
                                <li>Advanced Graphics Design Included</li>
                                <li>10/30 (monthly) Support</li>
                            </ul>
                            <div class="plan-select"><a href="">Select Plan</a></div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="pt-5">
                        <hr />
                        <div class="d-flex justify-content-between align-items-center pt-4">
                            <div class="">
                                <h5 class="">Need As like Dadabhaai:</h5>
                            </div>
                            <div>
                                <form id="serviceForm" action="/submit" method="POST">
                                    <div class="palatform_checkbox mb-2">
                                        <input class="platform_input" id="platform_label-102" type="checkbox"
                                            value="Graphics Design" onclick="handleCheckboxClick()" />
                                        <label class="platform_label" for="platform_label-102">
                                            <span>
                                                <svg width="12px" height="10px" viewbox="0 0 12 10">
                                                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                                </svg>
                                            </span>
                                            <span>Yes, I want the complete Dadabhai Project</span>
                                        </label>
                                    </div>
                                    <!-- If Checkbox cliked then show this btn -->
                                    <div id="quotationButton" style="display: none">
                                        <button type="submit" class="btn-common-one animated mt-3 w-100">
                                            Send Quotation
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Project Section End --}}

    @include('frontend.pages.partner')

    @include('frontend.pages.client')
    <!-- Partner Section End -->


</x-frontend-app-layout>