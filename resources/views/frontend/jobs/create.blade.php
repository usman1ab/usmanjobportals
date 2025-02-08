@extends('layouts.main')
@include('../frontend/profile/style')
@section('content')
<div style="height: 50px;"></div>

<div class="site-section bg-light">
    <div class="containe">
        <div class="profile-body">
            <!-- Sidebar -->
            @include('../frontend/profile/sidebar')

            <!-- Main Content -->
            <div class="main-content">
                <form action="{{ route('job.store') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h3>@lang('validation.create_job')</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">@lang('validation.title'):</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}">
                                @if ($errors->has('title'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('title') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="position">@lang('validation.position'):</label>
                                <input type="text" name="position" value="{{ old('position') }}" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}">
                                @if ($errors->has('position'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('position') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="specialization">@lang('validation.specialization'):</label>
                                <input type="text" name="specialization" value="{{ old('specialization') }}" class="form-control{{ $errors->has('specialization') ? ' is-invalid' : '' }}">
                                @if ($errors->has('specialization'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('specialization') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="department">@lang('validation.department'):</label>
                                <input type="text" name="department" value="{{ old('department') }}" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}">
                                @if ($errors->has('department'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('department') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="category">@lang('validation.category'):</label>
                                <select name="category" id="category" class="form-control">
                                    @foreach (App\Models\Category::all() as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('category') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="experience">@lang('validation.experience'):</label>
                                <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" value="{{ old('experience') }}">
                                @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="roles">@lang('validation.roles'):</label>
                                <textarea name="roles" id="roles" style="height: 80px" value="{{ old('roles') }}" class="form-control{{ $errors->has('roles') ? ' is-invalid' : '' }}"></textarea>
                                @if ($errors->has('roles'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('roles') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="description">@lang('validation.description'):</label>
                                <textarea name="description" id="description" style="height: 120px" value="{{ old('description') }}" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                                @if ($errors->has('description'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('description') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="education">@lang('validation.education'):</label>
                                <input name="education" id="education" value="{{ old('education') }}" class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}">
                                @if ($errors->has('education'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('education') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="diploma">@lang('validation.diploma'):</label>
                                <input name="diploma" id="diploma" value="{{ old('diploma') }}" class="form-control{{ $errors->has('diploma') ? ' is-invalid' : '' }}">
                                @if ($errors->has('diploma'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('diploma') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="certification">@lang('validation.certification'):</label>
                                <input name="certification" id="certification" value="{{ old('certification') }}" class="form-control{{ $errors->has('certification') ? ' is-invalid' : '' }}">
                                @if ($errors->has('certification'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('certification') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="number_of_vacancy">@lang('validation.number_of_vacancy'):</label>
                                <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}" value="{{ old('number_of_vacancy') }}">
                                @if ($errors->has('number_of_vacancy'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="type">@lang('validation.type'):</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="fulltime">@lang('validation.fulltime')</option>
                                    <option value="partime">@lang('validation.partime')</option>
                                    <option value="remote">@lang('validation.remote')</option>
                                </select>
                                @if ($errors->has('type'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('type') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="gender">@lang('validation.gender'):</label>
                                <select class="form-control" name="gender">
                                    <option value="any">@lang('validation.any')</option>
                                    <option value="male">@lang('validation.male')</option>
                                    <option value="female">@lang('validation.female')</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="salary">@lang('validation.salary'):</label>
                                <select class="form-control" name="salary">
                                    <option value="negotiable">@lang('validation.negotiable')</option>
                                    <option value="2000-5000">2000-5000</option>
                                    <option value="5000-10000">5000-10000</option>
                                    <option value="10000-20000">10000-20000</option>
                                    <option value="30000-500000">50000-500000</option>
                                    <option value="500000-600000">500000-600000</option>
                                    <option value="600000 plus">600000 plus</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="address">@lang('validation.address'):</label>
                                <input type="text" name="address" value="{{ old('address') }}" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">
                                @if ($errors->has('address'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('address') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="country">@lang('validation.country'):</label>
                                <select id="country" name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}">
                                    <option value="">@lang('validation.select_country')</option>
                                </select>
                                @if ($errors->has('country'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('country') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="city">@lang('validation.city'):</label>
                                <select id="city" name="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">
                                    <option value="">@lang('validation.city')</option>
                                </select>
                                @if ($errors->has('city'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('city') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <label for="last_date">@lang('validation.last_date'):</label>
                                <input type="date" name="last_date" value="{{ old('last_date') }}" class="form-control{{ $errors->has('last_date') ? ' is-invalid' : '' }}">
                                @if ($errors->has('last_date'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('last_date') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <button class=" btn btn-dark" type="submit">@lang('validation.post_job')</button>
                            </div>

                            @if (Session::has('message'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    <strong>@lang('validation.message')</strong> {{ Session::get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var countryDropdown = document.getElementById("country");
        var cityDropdown = document.getElementById("city");

        var config = {
            curl: "https://api.countrystatecity.in/v1/countries",
            ckey: "OXBGdFM1OVU5Nk11eXJtVVptSnVNUkZpQjF4cWhRb0Jra05zbzdNZw==",
        };

        // Fetch Countries
        fetch(config.curl, {
            headers: {
                "X-CSCAPI-KEY": config.ckey,
            },
        })
            .then((response) => response.json())
            .then((data) => {
                countryDropdown.innerHTML = '<option value="">Select Country</option>'; // Default option

                data.forEach((country) => {
                    let option = document.createElement("option");
                    option.value = country.name; // Store country name instead of code
                    option.textContent = country.name;
                    countryDropdown.appendChild(option);
                });
            })
            .catch((error) => console.error("Error fetching countries:", error));

        // Fetch Cities when country changes
        countryDropdown.addEventListener("change", function () {
            var selectedCountry = this.value;

            // Find country code by matching name
            fetch(config.curl, {
                headers: {
                    "X-CSCAPI-KEY": config.ckey,
                },
            })
                .then((response) => response.json())
                .then((countries) => {
                    let selectedCountryCode = countries.find(
                        (c) => c.name === selectedCountry
                    )?.iso2;

                    if (!selectedCountryCode) return;

                    // Fetch cities for the selected country
                    fetch(
                        `https://api.countrystatecity.in/v1/countries/${selectedCountryCode}/cities`,
                        {
                            headers: {
                                "X-CSCAPI-KEY": config.ckey,
                            },
                        }
                    )
                        .then((response) => response.json())
                        .then((cities) => {
                            cityDropdown.innerHTML = '<option value="">Select City</option>'; // Default option

                            cities.forEach((city) => {
                                let option = document.createElement("option");
                                option.value = city.name; // Store city name
                                option.textContent = city.name;
                                cityDropdown.appendChild(option);
                            });
                        })
                        .catch((error) =>
                            console.error("Error fetching cities:", error)
                        );
                })
                .catch((error) => console.error("Error fetching country code:", error));
        });
    });
</script>

@endsection
