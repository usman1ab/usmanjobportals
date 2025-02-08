<style>
    .containe {
        max-width: 1300px;
        margin: 20px auto;
        margin-left:10px;
        padding: 20px;
    }
    .sidebar {
    width: 250px;
    
    height: 100vh; /* Set the height to full viewport */
    /* position: fixed; Make it fixed on the page */
    overflow-y: auto; /* Add scroll if content overflows */
}
    .main-content {
    width: 1000px; 
    width: 100%;
    /* position: fixed; Make it fixed on the page */
    overflow-y: auto; /* Add scroll if content overflows */
}
     .main-contents {
    width: 1000px; /* Set a fixed width */
    /* position: fixed; Make it fixed on the page */
    overflow-y: auto; /* Add scroll if content overflows */
}
    .profile-sidebar {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .profile-sidebar img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
    }

    .profile-sidebar .user-info h1 {
        margin: 0;
        font-size: 20px;
        font-weight: bold;
    }

    .profile-sidebar .user-info p {
        margin: 5px 0;
        color: #666;
        font-size: 14px;
    }

    .profile-body {
        display: grid;
        grid-template-columns: 1fr 5fr;
        gap: 20px;
    }

    .sidebar, .main-content {
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
 .main-contents {
        
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
        margin: 20px 0 0;
        width: 100%;
    }

    .sidebar ul li {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .sidebar ul li i {
        margin-right: 10px;
        color: #555;
    }

    .sidebar ul li a {
        text-decoration: none;
        color: #333;
        
    }

    .main-content h2 {
        font-size: 20px;
        margin-bottom: 15px;
    }
      .main-contents h2 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .info-item span {
        /*font-weight: bold;*/
    }

    .skills {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .skill {
        background: #e9ecef;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 14px;
    }
    /* Dropdown Container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Button */
.dropdown-toggle-btn {
    background-color: #f8f9fa;
    color: #333;
    border: 1px solid #ccc;
    padding: 8px 12px;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    display: flex;
    align-items: center;
    gap: 5px;
}

/* Dropdown Menu */
.dropdown-menu {
    display: none; /* Initially hidden */
    position: absolute;
    top: 100%; /* Position below the button */
    left: 0;
    z-index: 1000; /* Ensure it appears above other elements */
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    min-width: 150px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 0;
    margin-top: 8px;
}

/* Dropdown Item */
.dropdown-item {
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
    display: block;
    font-size: 14px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.dropdown-item:last-child {
    border-bottom: none; /* Remove last border */
}

/* Hover and Active States */
.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #000;
}

/* Display Menu on Button Click */
.dropdown.show .dropdown-menu {
    display: block;
}
.job-card {
    border: 1px solid #ddd;
    padding: 20px;
    border-radius: 8px;
    background-color: #fff;
    margin: 20px auto;
    font-family: Arial, sans-serif;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 1000px; /* Limit width for better visuals */
    transition: transform 0.2s ease-in-out; /* Add hover effect */
}

.job-card:hover {
    transform: scale(1.02); /* Slight zoom on hover */
}

.job-header h2 {
    font-size: 20px;
    margin-bottom: 10px;
    text-align: left;
    color: #333;
    white-space: nowrap; /* Prevent text wrapping */
    overflow: hidden; /* Hide overflow text */
    text-overflow: ellipsis; /* Add ellipsis for overflow text */
    max-width: 50%; /* Adjust width based on your layout */
    font-size: 1.25rem;
}

.job-stats {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

.stat {
    flex: 1 1 150px; /* Allow wrapping and size adjustment */
    text-align: center;
    margin: 0 10px;
}

.stat h3 {
    font-size: 18px;
    margin: 0;
    color: #2c3e50;
    font-weight: bold;
}

.stat p {
    font-size: 14px;
    color: #7f8c8d;
    margin: 5px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
}

.job-footer {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    font-size: 14px;
    color: #555;
    margin-top: 20px;
    gap: 10px;
}

.job-footer span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.job-footer .status {
    padding: 5px 10px;
    border-radius: 12px;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: bold;
}

.job-footer .status.open {
    background-color: #e6f4ea;
    color: #2d8a3a;
}

.job-footer .status.close {
    background-color: #f6dfdb;
    color: #ef280a;
}

.main-contents .card-header{
    padding: 15px;
}
 .job-cards {
      display: flex;
      align-items: center;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-bottom: 10px;
      /*width: 880px;*/
    }
    .profile-picture {
      flex-shrink: 0;
      margin-right: 15px;
    }
    .profile-picture img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 3px solid #55C4CF;
    }
    .user-details {
      flex: 1;
    }
    .user-details h2 {
      margin: 0;
      font-size: 18px;
    }
    .user-details p {
      margin: 2px 0;
      color: #666;
      font-size: 14px;
    }
    .job-title {
      /*font-weight: bold;*/
      margin: 10px 0;
    }
    .status-icons {
      display: flex;
      gap: 15px;
    }
    .status-icons .icon-wrapper {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 14px;
      color: #666;
    }
    .status-icons .shortlisted {
      color: #4caf50;
    }
    .status-icons .interview {
      color: #ffc107;
    }
    .status-icons .selection {
      color: #2196f3;
    }
@media (max-width: 576px) { /* Adjusting for smaller screens */
    .containe {
        padding: 10px;
        margin: 10px;
    }
 
    .profile-body {
        display: flex;
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 15px;
        margin-bottom: 10px;
    }

    .main-content,
    .main-contents {
        width: 100%;
        overflow-x: hidden;
    }

    .profile-sidebar img {
        width: 70px;
        height: 70px;
    }

    .profile-sidebar .user-info h1 {
        font-size: 16px;
    }

    .profile-sidebar .user-info p {
        font-size: 12px;
    }

    .status-icons {
        flex-direction: column;
        align-items: center;
        gap: 6px;
    }

    .status-icons .icon-wrapper {
        font-size: 11px;
    }

    .dropdown-menu {
        min-width: 100%;
    }

    .dropdown-toggle-btn {
        font-size: 12px;
        padding: 6px 8px;
    }

    .job-cards {
        flex-direction: column;
        align-items: center;
        padding: 8px;
    }

    .profile-picture img {
        width: 45px;
        height: 45px;
    }

    .user-details h2 {
        font-size: 14px;
    }

    .user-details p {
        font-size: 12px;
    }

    .job-title {
        font-size: 12px;
    }

 

    .dropdown {
        width: 100%;
    }
}
@media (max-width: 576px) {
    .job-card {
        display: flex;
        flex-direction: column;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        background: #fff;
        margin-bottom: 12px;
    }

    /* Job title (First Row) */
    .job-header {
        text-align: center;
        margin-bottom: 10px;
    }

    .job-header h2 {
        font-size: 16px;
        font-weight: bold;
    }

     /*Job stats (Two stats per row) */
    /*.job-stats {*/
    /*    display: flex;*/
    /*    flex-direction:row;*/
    /*    gap: 10px;*/
    /*    align-items: right;*/
    /*    margin-bottom: 12px;*/
    /*    margin-right: 2px;*/
    /*}*/

    /*.stat {*/
    /*    flex: 0 0 calc(50% - 5px); */
    /*    display: flex;*/
    /*    flex-direction: column;*/
    /*    align-items: center;*/
    /*    background: #f8f9fa;*/
    /*    padding: 8px;*/
    /*    border-radius: 6px;*/
    /*}*/

    /* Job footer (Last Row) */
    .job-footer {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 13px;
        gap: 5px;
    }

    .status {
        font-weight: bold;
        padding: 5px;
    }
}


@media (max-width: 768px) {
    .container {
        width: 100%;
        max-width: 100%;
        padding: 10px;
    }

    .profile-body {
        flex-direction: column;
        gap: 10px;
    }

    .sidebar {
        width: 100%;
        margin-bottom: 15px;
    }

    .main-content {
        width: 100%;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        gap: 5px;
    }

    .info-item span {
        display: block;
        word-wrap: break-word;
    }

    .skills {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
    }

    .skill {
        font-size: 12px;
        padding: 5px;
    }

    .modal-dialog {
        max-width: 90%;
    }
}
@media (max-width: 576px) {
    .profile-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .main-contents {
        width: 100%;
    }

    .job-cards {
        display: grid;
        grid-template-columns: 1fr; /* Each job card takes full width */
        gap: 16px; /* Space between cards */
        width: 100%;
        min-height: 150px;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        background: #fff;
        position: relative;
    }

    .top-buttons {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    .profile-picture img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .user-details {
        text-align: center;
        font-size: 14px;
    }

    .status-icons {
        display: flex;
        flex-direction:row;
        justify-content: center;
        gap: 10px;
    }

   

    .pagination-links {
        text-align: center;
        margin-top: 20px;
    }
}

@media (max-width: 576px) {  
    .profile-body {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .main-content {
        width: 100%;
        padding: 10px;
    }

    .card {
        display: grid;
        grid-template-columns: 1fr; /* Full width on mobile */
        gap: 10px;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .card-header {
        font-size: 16px;
        text-align: center;
    }

    .card-body {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .row {
        flex-direction: column;
        align-items: center;
    }

    .col-md-6 {
        width: 100%;
        text-align: center;
    }

    .card-footer {
        display: flex;
        flex-direction: column;
        gap: 8px;
        text-align: center;
    }

    .card-footer a {
        width: 100%;
        text-align: center;
    }

    .pagination-links {
        text-align: center;
        margin-top: 20px;
    }
}


</style>
