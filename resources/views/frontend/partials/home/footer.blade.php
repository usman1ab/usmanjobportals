<section class="mt-5">
    <div class="footer">
        <div class="">
            <div class="row g-0">
                <div class="col-2 d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('backend/assets/images/footer-logo.png') }}" alt="footer-logo" />
                    <div class="footer-lnc">{{ __('footer.copyright') }}</div>
                </div>
                <div class="col-1"></div>

                <div class="col-9">
                    <div class="row g-0">
                        <!-- Company Section -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="title">{{ __('footer.company') }}</div>
                            <div class="body d-flex flex-column align-items-start">
                                <a href="#">{{ __('footer.about_us') }}</a>
                                <a href="#">{{ __('footer.become_partner') }}</a>
                                <a href="#">{{ __('footer.contact_us') }}</a>
                                <a href="#">{{ __('footer.privacy_policy') }}</a>
                                <a href="#">{{ __('footer.terms_conditions') }}</a>
                                <a href="#">{{ __('footer.trust_center') }}</a>
                                <a href="#">{{ __('footer.security_report') }}</a>
                            </div>
                        </div>

                        <!-- Solutions Section -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="title">{{ __('footer.solutions') }}</div>
                            <div class="body d-flex flex-column align-items-start">
                                <a href="#">{{ __('footer.telentra_hr') }}</a>
                            </div>
                        </div>

                        <!-- Resources Section -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="title">{{ __('footer.resources') }}</div>
                            <div class="body d-flex flex-column align-items-start">
                                <a href="#">{{ __('footer.blog') }}</a>
                                <a href="#">{{ __('footer.faqs') }}</a>
                                <a href="#">{{ __('footer.resources_section') }}</a>
                                <a href="#">{{ __('footer.hr_resources') }}</a>
                                <a href="#">{{ __('footer.glossaries') }}</a>
                            </div>
                        </div>

                        <!-- Follow Us Section -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="title">{{ __('footer.follow_us') }}</div>
                            <div class="body d-flex flex-column align-items-start">
                                <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer">{{ __('footer.linkedin') }}</a>
                                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">{{ __('footer.facebook') }}</a>
                                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">{{ __('footer.instagram') }}</a>
                                <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer">{{ __('footer.twitter') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JavaScript Bundle -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!--<script src="{{ asset('external/js/jquery-3.3.1.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/jquery-migrate-3.0.1.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/jquery-ui.js') }}"></script>-->
<!--<script src="{{ asset('external/js/popper.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/bootstrap.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/owl.carousel.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/jquery.stellar.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/jquery.countdown.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/jquery.magnific-popup.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/bootstrap-datepicker.min.js') }}"></script>-->
<!--<script src="{{ asset('external/js/aos.js') }}"></script>-->

<!--<script src="{{ asset('external/js/mediaelement-and-player.min.js') }}"></script>-->

<!--<script src="{{ asset('external/js/main.js') }}"></script>-->

<script>
    function toggleMenu() {
        const nav = document.querySelector('.nav ul');
        nav.classList.toggle('active');
    }
  function toggleLanguageMenu() {
    const dropdownMenu = document.querySelector('.language-dropdown-menu');
    dropdownMenu.style.display = dropdownMenu.style.display === 'none' || dropdownMenu.style.display === '' ? 'block' : 'none';
  }

  // Close dropdown if clicked outside
  document.addEventListener('click', function (event) {
    const dropdown = document.querySelector('.language-dropdown-menu');
    const trigger = document.getElementById('languageDropdown');
    if (!trigger.contains(event.target) && !dropdown.contains(event.target)) {
      dropdown.style.display = 'none';
    }
  });

</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
              var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

              for (var i = 0; i < total; i++) {
                  new MediaElementPlayer(mediaElements[i], {
                      pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                      shimScriptAccess: 'always',
                      success: function () {
                          var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                          for (var j = 0; j < targetTotal; j++) {
                              target[j].style.visibility = 'visible';
                          }
                }
              });
              }
          });
  </script>

</body>
</html>
