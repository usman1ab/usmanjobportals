
<!--====== Start Left Sidebar Section======-->
<section id="left-sidebar-area">
    <!--   Left Sidebar  -->
          <div id="left-sidebar-section">


              <aside>
                <div class="left-sidebar" id="wrapper-sidebar">
                  <ul>
                    <li><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="material-icons">home</i>@lang('message.dashboard')</a></li>
                    <li><a  class="{{ request()->routeIs('adminEmployers') || request()->routeIs('adminEditEmp') ? 'active' : '' }}" href="{{ url('/dashboard/employers') }}"><i class="material-icons">supervisor_account</i>@lang('validation.all_companies')</a></li>
                    <li><a  class="{{ request()->routeIs('adminStaff') || request()->routeIs('adminEditStaff') ? 'active' : '' }}" href="{{ url('/dashboard/companies/staff') }}"><i class="material-icons">supervisor_account</i>@lang('messages.staff')</a></li>
                    <li><a  class="{{request()->routeIs('adminCanTrash') || request()->routeIs('adminEditCan') || request()->routeIs('adminCandidates') ? 'active' : '' }}" href="{{ url('/dashboard/candidates') }}"><i class="material-icons">person</i>@lang('message.candidate')</a></li>
                    <li><a class="{{  request()->routeIs('adminTestiEdit') || request()->routeIs('adminTestimonial') || request()->routeIs('adminTestimonials') ? 'active' : '' }}" href="{{ route('adminTestimonials') }}"><i class="material-icons">comment</i>@lang('message.testominal')</a></li>
                    <li><a class="{{ request()->routeIs('adminEditCat') || request()->routeIs('adminCategory')? 'active' : '' }}" href="{{ route('adminCategory') }}"><i class="material-icons">format_align_center</i>@lang('message.category')</a></li>
                    <li><a class="{{ request()->routeIs('adminPostCreate') || request()->routeIs('adminPosts') || request()->routeIs('adminPostEdit') || request()->routeIs('adminPostShow') || request()->routeIs('adminPostTrash') ? 'active' : '' }}" href="{{ url('/dashboard/posts') }}"><i class="material-icons">collections</i>@lang('message.post')</a></li>
                    <li><a class="{{  request()->routeIs('adminShow') || request()->routeIs('adminEdit') || request()->routeIs('adminJobTrash') || request()->routeIs('adminJobs') || request()->routeIs('adminEdit') || request()->routeIs('adminShow') || request()->routeIs('adminCreate')   ? 'active' : '' }}" href="{{ url('/dashboard/jobs') }}"><i class="material-icons">business_center</i>@lang('message.job')</a></li>
                    <li><a class="{{  request()->routeIs('applicants')   ? 'active' : '' }}" href="{{ route('applicants') }}"><i class="material-icons">supervisor_account</i>@lang('message.applicant')</a></li>
                    <li><a class="{{  request()->routeIs('intervi')   ? 'active' : '' }}" href="{{ route('intervi') }}"><i class="material-icons">business_center</i>@lang('message.interview')</a></li>
                    <li><a class="{{  request()->routeIs('dashboard.settings')   ? 'active' : '' }}" href="{{ route('dashboard.settings') }}"><i class="material-icons">settings</i>@lang('message.setting')</a></li>
                    </ul>
                </div>
              </aside>
          </div>
    <!--   Left Sidebar  -->
    </section>
  <!--====== End Left Sidebar Section======-->
