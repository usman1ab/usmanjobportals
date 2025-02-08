


</body>


<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     // Get references to the main content section and sidebar links
    //     const mainContent = document.querySelector(".main-content");
    //     const sidebarLinks = document.querySelectorAll(".sidebar ul li a");

    //     // Default content for Profile
    //     const profileContent = `
    //       <div class="main-content">
    //             <div class="d-flex justify-content-between align-items-center mb-4">
    //                 <h2 class="mb-0"><strong>Profile Information</strong></h2>
    //                 <a class="btn btn-sm btn-info" href="" data-bs-toggle="modal" data-bs-target="#editProfileModal" type="button" >
    //                     <i class="bi bi-pencil"></i> Edit
    //                 </a>
    //             </div>

    //             <div class="info-item">
    //                 <span><i class="fas fa-phone"></i> Phone:</span>
    //                 <span>{{ Auth::user()->profile->phone ?? "-" }}</span>
    //             </div>
    //             <div class="info-item">
    //                 <span><i class="fas fa-birthday-cake"></i> Date of Birth:</span>
    //                 <span>{{ Auth::user()->profile->dob ?? "-" }}</span>
    //             </div>
    //             <div class="info-item">
    //                 <span><i class="fas fa-venus-mars"></i> Gender:</span>
    //                 <span>{{ Auth::user()->profile->gender ?? "-" }}</span>
    //             </div>
    //             <div class="info-item">
    //                 <span><i class="fas fa-globe"></i> Specialization:</span>
    //                 <span>{{ Auth::user()->profile->specialization ?? "-" }}</span>
    //             </div>

    //             <div class="info-item">
    //                 <span><i class="fas fa-map-marker-alt"></i> Address:</span>
    //                 <span>{{ Auth::user()->profile->address ?? "-" }}</span>
    //             </div>

    //             <h2>Skills</h2>
    //             <div class="skills">
    //                 @foreach(explode(',', Auth::user()->profile->skills) as $skill)
    //                     <div class="skill">{{ trim($skill) }}</div>
    //                 @endforeach
    //             </div>
    //             <h2 style="margin-top: 5px">Bio:</h2>
    //             <div class="skills">
    //                 <div class="skill">{{ Auth::user()->profile->bio }}</div>
    //             </div>
    //     `;

    //     // Content for Resume (displayed using an iframe)
    //     const resumeContent = `
    //         <div class="d-flex justify-content-between align-items-center mb-4">
    //                 <h2 class="mb-0"><strong>Resume</strong></h2>
    //                 <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editresumeProfileModal">
    //                     <i class="bi bi-pencil"></i> Edit
    //                 </a>
    //             </div>
    //         <iframe src="{{ asset(Auth::user()->profile->resume) }}" width="100%" height="500px" style="border: none;"></iframe>
    //     `;

    //     // Content for Attachments (displayed using an iframe or image tags for visual documents)
    //     const attachmentsContent = `
    //             <div class="d-flex justify-content-between align-items-center mb-4">
    //                 <h2 class="mb-0"><strong>Cover Latter</strong></h2>
    //                 <a class="btn btn-sm btn-info" href="#" data-bs-toggle="modal" data-bs-target="#editcoverProfileModal">
    //                     <i class="bi bi-pencil"></i> Edit
    //                 </a>
    //             </div>
    //         <iframe src="{{ asset(Auth::user()->profile->cover_letter) }}" width="100%" height="500px" style="border: none;"></iframe>
    //     `;

    //     // Function to update content
    //     function updateContent(content) {
    //         mainContent.innerHTML = content;
    //     }

    //     // Show Profile by default on page load
    //     // updateContent(profileContent);

    //     // Add click event listeners to sidebar links
    //     sidebarLinks.forEach(link => {
    //         link.addEventListener("click", function (e) {
    //               if (this.textContent.trim() === "Save Job" || this.textContent.trim() === "Interview" || this.textContent.trim() === "Logout") {
    //         return;
    //     }
    //             e.preventDefault(); // Prevent default anchor behavior

    //             // Determine content based on clicked link text
    //             const text = this.textContent.trim();
    //             if (text === "Profile") {
    //                 updateContent(profileContent);
    //             } else if (text === "Resume") {
    //                 updateContent(resumeContent);
    //             } else if (text === "Cover Letter") {
    //                 updateContent(attachmentsContent);
    //             }
    //         });
    //     });
        
    // });


</script>



