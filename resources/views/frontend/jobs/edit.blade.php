@extends('layouts.main')

@section('content')
<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 1.5rem;">@lang('validation.edit_the_job') {{ $job->title }}</h1>
    <p class="mb-0 unit-6"><a href="/" style="color: #55C4CF;" >@lang('validation.Home')</a> <span class="sep"> > <a style="color: #55C4CF;" href="{{ route('alljobs') }}">@lang('job.jobs')</a> </span> <span><span class="sep m-0"> ></span> @lang('validation.single_job')</span></p>
  </div>
</div>

<div class="site-section bg-light">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">


                    <form action="{{ route('job.update', [$job->id]) }}" method="post">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>@lang('validation.update_the_job')</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">@lang('validation.title')</label>
                                    <input type="text" name="title" value="{{ $job->title }}" class="form-control">
                                    @if ($errors->has('title'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('title') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="position">@lang('validation.position')</label>
                                    <input type="text" name="position" value="{{ $job->position }}" class="form-control">
                                    @if ($errors->has('position'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('position') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="experience">@lang('validation.experience')</label>
                                    <input type="text" name="experience" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}"  value="{{ $job->experience }}">
                                    @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group mt-3">
                                    <label for="type">@lang('validation.type') </label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="fulltime"{{ $job->type== 'fulltime' ? 'selected':'' }}>@lang('validation.fulltime')</option>
                                        <option value="partime"{{ $job->type== 'partime' ? 'selected':'' }}>@lang('validation.parttime')</option>
                                        <option value="remote"{{ $job->type== 'remote' ? 'selected':'' }}>@lang('validation.remote')</option>

                                    </select>
                                    @if ($errors->has('type'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('type') }}</p>
                                        </div>
                                    @endif

                                </div>
                                <div class="form-group mt-3">
                                    <label for="category">@lang('validation.category')</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach (App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id }}" {{ $cat->id==$job->category_id ? 'selected':'' }}>{{ $cat->name }}</option>

                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('category') }}</p>
                                        </div>
                                    @endif

                                </div>


                                  <div class="form-group mt-3">
                                <label for="description">@lang('validation.education')</label>
                                <input name="education" id="education"  value="{{ $job->education }}" class="form-control"  >


                            </div>
                                  <div class="form-group mt-3">
                                <label for="description">@lang('validation.diploma')</label>
                                <input name="diploma" id="diploma" value="{{$job->diploma }}" class="form-control" >


                            </div>

                                  <div class="form-group mt-3">
                                <label for="description">@lang('validation.certification')</label>
                                <input name="certification" id="certification"  value="{{$job->certification}}" class="form-control" >


                            </div>
                                <div class="form-group mt-3">
                                    <label for="address">@lang('validation.address')</label>
                                    <input type="text" name="address" value="{{ $job->address }}" class="form-control">
                                    @if ($errors->has('address'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('address') }}</p>
                                        </div>
                                    @endif

                                </div>
                                       <div class="form-group mt-3">
                                <label for="address">@lang('validation.country')</label>
                                <select id="country" name="country" class="form-control">
    <option value="">Select Country</option>
</select>
                                @if ($errors->has('country'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('country') }}</p>
                                    </div>
                                @endif

                            </div>
                              <div class="form-group mt-3">
                                <label for="address">@lang('validation.city')</label>
                               <select id="city" name="city" class="form-control">
    <!--<option value="">Select City</option>-->
</select>
                                @if ($errors->has('city'))
                                    <div style="color:red">
                                        <p class="mb-0">{{ $errors->first('city') }}</p>
                                    </div>
                                @endif

                            </div>
                                <div class="form-group mt-3">
                                    <label for="roles">@lang('validation.roles')</label>
                                    <textarea name="roles" id="roles" style="height: 80px" class="form-control" >{{ $job->roles }}</textarea>
                                    @if ($errors->has('roles'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('roles') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mt-3">
                                    <label for="description">@lang('validation.description')</label>
                                    <textarea name="description" id="description" style="height: 120px"  class="form-control" >{{ $job->description }}</textarea>
                                    @if ($errors->has('description'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('description') }}</p>
                                        </div>
                                    @endif

                                </div>


                                <div class="form-group mt-3">
                                    <label for="number_of_vacancy">@lang('validation.number_of_vacancy')</label>
                                    <input type="text" name="number_of_vacancy" class="form-control{{ $errors->has('number_of_vacancy') ? ' is-invalid' : '' }}"  value="{{ $job->number_of_vacancy }}">
                                    @if ($errors->has('number_of_vacancy'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('number_of_vacancy') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group mt-3">
                                    <label for="type">@lang('validation.gender')</label>
                                    <select class="form-control" name="gender">
                                        <option value="any"{{ $job->gender=='any' ? 'selected':'' }}>@lang('validation.any')</option>
                                        <option value="male"{{ $job->gender=='male' ? 'selected':'' }}>@lang('validation.male')</option>
                                        <option value="female"{{ $job->gender== 'female' ? 'selected':'' }}>@lang('validation.female')</option>

                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="type">@lang('validation.salary')</label>
                                    <select class="form-control" name="salary">
                                        <option value="negotiable"{{ $job->salary=='negotiable' ? 'selected':'' }}>@lang('validation.negotiable')</option>
                                        <option value="2000-5000"{{ $job->salary=='2000-5000' ? 'selected':'' }}>2000-5000</option>
                                        <option value="50000-10000"{{ $job->salary=='50000-10000' ? 'selected':'' }}>5000-10000</option>
                                        <option value="10000-20000"{{ $job->salary=='10000-20000' ? 'selected':'' }}>10000-20000</option>
                                        <option value="30000-500000"{{ $job->salary=='30000-500000' ? 'selected':'' }}>50000-500000</option>
                                        <option value="500000-600000"{{ $job->salary=='500000-600000' ? 'selected':'' }}>500000-600000</option>

                                        <option value="600000 plus"{{ $job->salary=='600000 plus' ? 'selected':'' }}>600000 plus</option>
                                    </select>
                                </div>


                                <div class="form-group mt-3">
                                    <label for="status">Status: </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1"{{ $job->status=='1' ? 'selected':'' }}>@lang('job.live')</option>
                                        <option value="0"{{ $job->status=='0' ? 'selected':'' }}>@lang('job.draft')</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('status') }}</p>
                                        </div>
                                    @endif

                                </div>


                                <div class="form-group mt-3">
                                    <label for="last_date">@lang('validation.last_date')</label>
                                    <input type="date" name="last_date" value="{{ $job->last_date }}" class="form-control">
                                    @if ($errors->has('last_date'))
                                        <div style="color:red">
                                            <p class="mb-0">{{ $errors->first('last_date') }}</p>
                                        </div>
                                    @endif

                                </div>

                                <div class="form-group mt-3">
                                    <button class=" btn btn-dark" type="submit">@lang('validation.update_the_job')</button>
                                </div>



                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
</div>
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
