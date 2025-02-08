@extends('layouts.main')

@include('../frontend/profile/style')

@section('content')
<div style="height: 94px;"></div>

<div class="site-section bg-light">
    <div class="container">
        <div class="profile-body">
            <!-- Sidebar -->
           @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>@lang('messages.profile_information')</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil"></i> @lang('messages.edit')
                    </a>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-phone"></i> @lang('messages.phone'):</span>
                    <span>{{ Auth::user()->profile->phone ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-birthday-cake"></i> @lang('messages.date_of_birth')</span>
                    <span>{{ Auth::user()->profile->dob ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-venus-mars"></i> @lang('messages.gender')</span>
                    <span>{{ Auth::user()->profile->gender ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-globe"></i> @lang('messages.specialization')</span>
                    <span>{{ Auth::user()->profile->specialization ?? "-" }}</span>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> @lang('messages.address')</span>
                    <span>{{ Auth::user()->profile->address ?? "-" }}</span>
                </div>
               <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> @lang('messages.country')</span>
                    <span>{{ Auth::user()->profile->country ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.highest_education')</span>
                    <span>{{ Auth::user()->profile->education ?? "-" }}</span>
                </div>
                 <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.diploma')</span>
                    <span>{{ Auth::user()->profile->diploma ?? "-" }}</span>
                </div>
                  <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.certificate')</span>
                    <span>{{ Auth::user()->profile->certification ?? "-" }}</span>
                </div>
                <h2>@lang('messages.skills')</h2>
                <div class="skills">
                    @foreach(explode(',', Auth::user()->profile->skills) as $skill)
                        <div class="skill">{{ trim($skill) }}</div>
                    @endforeach
                </div>
                <h2 style="margin-top: 5px">@lang('messages.bio')</h2>
                <div class="skills">
                    <div class="skill">{{ Auth::user()->profile->bio }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.create') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phone" class="form-label">@lang('messages.phone')</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->profile->phone ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">@lang('messages.date_of_birth')</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ Auth::user()->profile->dob ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">@lang('messages.gender')</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="Male" {{ Auth::user()->profile->gender === 'Male' ? 'selected' : '' }}>@lang('messages.male')</option>
                            <option value="Female" {{ Auth::user()->profile->gender === 'Female' ? 'selected' : '' }}>@lang('messages.female')</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="country" class="form-label">@lang('messages.specialization')</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" value="{{ Auth::user()->profile->specialization ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">@lang('messages.skills')</label>
                        <input type="text" class="form-control" id="skill" name="skills" value="{{ Auth::user()->profile->skills ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">@lang('messages.address')</label>
                        <textarea class="form-control" id="address" name="address" rows="3">{{ Auth::user()->profile->address ?? '' }}</textarea>
                    </div>
                     <div class="mb-3">
                        <label for="country" class="form-label">@lang('messages.country')</label>
                        <select  class="form-control" id="country" name="country" value="{{ Auth::user()->profile->country ?? '' }}">

                            </select>
                    </div>
                     <div class="mb-3">
                        <label for="city" class="form-label">@lang('messages.city')</label>
                        <select class="form-control" id="city" name="city" value="{{ Auth::user()->profile->city ?? '' }}">
                            </select>
                    </div>
                      <div class="mb-3">
                        <label for="country" class="form-label"> @lang('messages.highest_education')</label>
                        <input type="text" class="form-control" id="education" name="education" value="{{ Auth::user()->profile->education ?? '' }}">
                    </div>
                      <div class="mb-3">
                        <label for="country" class="form-label">@lang('messages.diploma')</label>
                        <input type="text" class="form-control" id="diploma" name="diploma" value="{{ Auth::user()->profile->diploma ?? '' }}">
                    </div>
                      <div class="mb-3">
                        <label for="country" class="form-label">@lang('messages.certificate')</label>
                        <input type="text" class="form-control" id="certification" name="certification" value="{{ Auth::user()->profile->certification ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="bio" class="form-label">@lang('messages.bio')</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3">{{ Auth::user()->profile->bio ?? '' }}</textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('messages.close')</button>
                    <button type="submit" class="btn btn-info">@lang('messages.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit resume Modal -->
<div class="modal fade" id="editresumeProfileModal" tabindex="-1" aria-labelledby="editresumeProfileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editresumeProfileModal">Edit Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume" >

                    @if (Session::has('resume'))
                        <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                            <strong>Wow !</strong> {{ Session::get('resume') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                    @endif

                    @if ($errors->has('resume'))
                        <div style="color:red">
                            <p class="mb-0">{{ $errors->first('resume') }}</p>
                        </div>
                    @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('messages.close')</button>
                    <button type="submit" class="btn btn-info">@lang('messages.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Edit Cover Latter Modal -->
<div class="modal fade" id="editcoverProfileModal" tabindex="-1" aria-labelledby="editcoverProfileModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editcoverProfileModal">Update Cover Latter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="file" class="form-control{{ $errors->has('cover_letter') ? ' is-invalid' : '' }}" name="cover_letter">


                @if (Session::has('coverletter'))
                    <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                        <strong>Wow !</strong> {{ Session::get('coverletter') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->has('cover_letter'))
                    <div style="color:red">
                        <p class="mb-0">{{ $errors->first('cover_letter') }}</p>
                    </div>
                @endif

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">@lang('messages.close')</button>
                    <button type="submit" class="btn btn-info">@lang('messages.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get references to the main content section and sidebar links
        const mainContent = document.querySelector(".main-content");
        const sidebarLinks = document.querySelectorAll(".sidebar ul li a");

        // Default content for Profile
        const profileContent = `
           <div class="main-content">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>@lang('messages.profile_information')</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil"></i> @lang('messages.edit')
                    </a>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-phone"></i> @lang('messages.phone'):</span>
                    <span>{{ Auth::user()->profile->phone ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-birthday-cake"></i> @lang('messages.date_of_birth')</span>
                    <span>{{ Auth::user()->profile->dob ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-venus-mars"></i> @lang('messages.gender')</span>
                    <span>{{ Auth::user()->profile->gender ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fas fa-globe"></i> @lang('messages.specialization')</span>
                    <span>{{ Auth::user()->profile->specialization ?? "-" }}</span>
                </div>

                <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> @lang('messages.address')</span>
                    <span>{{ Auth::user()->profile->address ?? "-" }}</span>
                </div>
               <div class="info-item">
                    <span><i class="fas fa-map-marker-alt"></i> @lang('messages.country')</span>
                    <span>{{ Auth::user()->profile->country ?? "-" }}</span>
                </div>
                <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.highest_education')</span>
                    <span>{{ Auth::user()->profile->education ?? "-" }}</span>
                </div>
                 <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.diploma')</span>
                    <span>{{ Auth::user()->profile->diploma ?? "-" }}</span>
                </div>
                  <div class="info-item">
                    <span><i class="fa fa-graduation-cap"></i> @lang('messages.certificate')</span>
                    <span>{{ Auth::user()->profile->certification ?? "-" }}</span>
                </div>
                <h2>@lang('messages.skills')</h2>
                <div class="skills">
                    @foreach(explode(',', Auth::user()->profile->skills) as $skill)
                        <div class="skill">{{ trim($skill) }}</div>
                    @endforeach
                </div>
                <h2 style="margin-top: 5px">@lang('messages.bio')</h2>
                <div class="skills">
                    <div class="skill">{{ Auth::user()->profile->bio }}</div>
                </div>
        `;

        // Content for Resume (displayed using an iframe)
        const resumeContent = `
            <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>Resume</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editresumeProfileModal">
                        <i class="bi bi-pencil"></i> @lang('messages.edit')
                    </a>
                </div>
            <iframe src="{{ asset(Auth::user()->profile->resume) }}" width="100%" height="500px" style="border: none;"></iframe>
        `;

        // Content for Attachments (displayed using an iframe or image tags for visual documents)
        const attachmentsContent = `
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0"><strong>Cover Latter</strong></h2>
                    <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editcoverProfileModal">
                        <i class="bi bi-pencil"></i> @lang('messages.edit')
                    </a>
                </div>
            <iframe src="{{ asset(Auth::user()->profile->cover_letter) }}" width="100%" height="500px" style="border: none;"></iframe>
        `;

        // Function to update content
        function updateContent(content) {
            mainContent.innerHTML = content;
        }

        // Show Profile by default on page load
        // updateContent(profileContent);

        // Add click event listeners to sidebar links
        sidebarLinks.forEach(link => {
            link.addEventListener("click", function (e) {
                  if (this.textContent.trim() === "Save Job" || this.textContent.trim() === "Interview" || this.textContent.trim() === "Logout") {
            return;
        }
                e.preventDefault(); // Prevent default anchor behavior

                // Determine content based on clicked link text
                const text = this.textContent.trim();
                if (text === "{{ __('sidebar.profile') }}") {
                    updateContent(profileContent);
                } else if (text === "{{ __('sidebar.resume') }}") {
                    updateContent(resumeContent);
                } else if (text === "{{ __('sidebar.cover_letter') }}") {
                    updateContent(attachmentsContent);
                }
            });
        });

            var countryDropdown = document.getElementById("country");
        var cityDropdown = document.getElementById("city");

        var userCountry = "{{ Auth::user()->profile->country ?? '' }}";
        var userCity = "{{ Auth::user()->profile->city ?? '' }}";

        var config = {
            curl: "https://api.countrystatecity.in/v1/countries",
            ckey: "OXBGdFM1OVU5Nk11eXJtVVptSnVNUkZpQjF4cWhRb0Jra05zbzdNZw==",
        };

        // Fetch Countries and Preselect User's Country
        fetch(config.curl, {
            headers: {
                "X-CSCAPI-KEY": config.ckey,
            },
        })
        .then(response => response.json())
        .then(data => {
            countryDropdown.innerHTML = '<option value="">Select Country</option>'; // Default option

            data.forEach(country => {
                let option = document.createElement("option");
                option.value = country.name; // Store country code instead of name
                option.textContent = country.name;
                countryDropdown.appendChild(option);

                // Preselect user's country
                if (country.name === userCountry) {
                    option.selected = true;
                    fetchCities(country.iso2); // Load cities if country matches
                }
            });
        })
        .catch(error => console.error("Error fetching countries:", error));

        // Fetch Cities when country changes
        countryDropdown.addEventListener("change", function () {
            var selectedCountryCode = this.value;
            if (selectedCountryCode) {
                fetchCities(selectedCountryCode);
            }
        });

        // Function to Fetch and Populate Cities
        function fetchCities(countryCode) {
            fetch(`https://api.countrystatecity.in/v1/countries/${countryCode}/cities`, {
                headers: {
                    "X-CSCAPI-KEY": config.ckey,
                },
            })
            .then(response => response.json())
            .then(cities => {
                cityDropdown.innerHTML = '<option value="">Select City</option>'; // Default option

                cities.forEach(city => {
                    let option = document.createElement("option");
                    option.value = city.name;
                    option.textContent = city.name;
                    cityDropdown.appendChild(option);

                    // Preselect user's city
                    if (city.name === userCity) {
                        option.selected = true;
                    }
                });
            })
            .catch(error => console.error("Error fetching cities:", error));
        }

    });


</script>
