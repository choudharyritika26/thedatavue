<!-- Google Web Fonts -->
<link rel="preconnect" href="{{ asset('frontend/https://fonts.googleapis.com') }}">
<link rel="preconnect" href="{{ asset('frontend/https://fonts.gstatic.com') }}" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet">

<!-- Icon Font Stylesheet -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link href="{{ asset('frontend/lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">


<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Template Stylesheet -->
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>


<style>
    .floating-buttons {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .floating-buttons .whatsapp-btn,
    .floating-buttons .call-btn {
        display: flex;
        align-items: center;
        /* background-color: rgb(19, 204, 115); */
        padding: 1px;
        border-radius: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .floating-buttons .whatsapp-btn a,
    .floating-buttons .call-btn a {
        color: black;
        text-decoration: none;
    }

    /* .floating-buttons .whatsapp-btn:hover,
    .floating-buttons .call-btn:hover {
        background-color: rgb(19, 204, 115);
    } */
</style>




{{-- progress bar --}}
<style>
    .progresss-containers {
        margin-bottom: 20px;
    }

    .progresss-containers h4 {
        font-size: 18px;
        color: #333;
        margin-bottom: 10px;
    }

    .progresss-bar {
        position: relative;
        width: 100%;
        height: 20px;
        background-color: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
    }

    .progresss-bar span {
        display: block;
        height: 100%;
        background-color: #4caf50;
        /* Default color, can change for each bar */
        text-align: center;
        /* Horizontally center the text */
        color: white;
        line-height: 20px;
        /* Vertically center the text, matching the height of the progress bar */
        font-weight: bold;
        width: 0%;
        /* Start at 0 */
        transition: width 2s ease-in-out;
        /* Animate width over 2 seconds */
    }

    .html .progresss-bar span {
        background-color: #f44336;
        /* Red */
    }

    .css .progresss-bar span {
        background-color: #2196F3;
        /* Blue */
    }

    .javascript .progresss-bar span {
        background-color: #ff9800;
        /* Orange */
    }

    .bootstrap .progresss-bar span {
        background-color: #673ab7;
        /* Purple */
    }

    .php .progresss-bar span {
        background-color: #009688;
        /* Teal */
    }

    .dropdown-menu .dropdown {
        position: relative;
    }

    .dropdown-menu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: 0;
        margin-left: 0.5rem;
        /* Adjust as needed */
    }
</style>

<style>
    /*** copyright Start ***/
    .copyright {
        border-top: 1px solid rgba(134, 30, 30, 0.08);
        background: var(--bs-white) !important;
    }

    /*** copyright end ***/
</style>

<style>
    /*** Service Start ***/
    .service .service-item {
        box-shadow: 0 0 45px rgba(0, 0, 0, 0.3);
    }

    .service .service-item .service-img {
        position: relative;
        overflow: hidden;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .service .service-item .service-img img {
        transition: 0.5s;
    }

    .service .service-item:hover .service-img img {
        transform: scale(1.2);
    }

    /* .service .service-item .service-img::after {
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    top: 0;
    right: 0;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    background: rgba(207, 12, 12, 0.4);
    transition: 0.5s;
} */

    .service .service-item:hover .service-img::after {
        width: 100% !important;
        height: 100% !important;
    }

    .service .service-item .service-content {
        position: relative;
    }

    /* .service .service-item .service-content::after {
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    bottom: 0;
    left: 0;
    border-radius: 10px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    background: var(--bs-dark);
    background-color:#0f1017;
    transition: 0.5s;
    z-index: 1;
} */

    .service .service-item:hover .service-content::after {
        width: 100% !important;
        height: 100% !important;
    }

    .service .service-item .service-content .service-content-inner {
        transition: 0.5s;
    }

    .service .service-item:hover .service-content .service-content-inner {
        position: relative;
        color: var(--bs-dark) !important;
        transition: 0.5s;
        z-index: 2;
    }

    .service .service-item:hover .service-content .service-content-inner a.h4 {
        color: var(--bs-danger) !important;
        transition: 0.5s;
    }

    .service .service-item:hover .service-content .service-content-inner a.h4:hover {
        color: var(--bs-danger) !important;
    }

    /*** Service End ***/
</style>

<style>
    /*** Blog Start ***/
    /* .blog .blog-item .project-img {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
    transition: 0.1s;
}

.blog .blog-item .project-img .blog-plus-icon {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: rgba(207, 12, 12, 0.4);
    transition: 0.5s;
    opacity: 0;
}

.blog .blog-item:hover .project-img .blog-plus-icon {
    opacity: 1;
}

.blog .blog-item .project-img img {
    transition: 0.5s;
}

.blog .blog-item:hover .project-img img {
    transform: scale(1.3);
} */

    .blog .blog-item .project-img {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        transition: 0.1s;
        cursor: pointer;
        /* Make it clear it's clickable */
    }

    .blog .blog-item .project-img .blog-plus-icon {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* background: rgba(207, 12, 12, 0.4); */
        transition: 0.5s;
        opacity: 0;
    }

    .blog .blog-item:hover .project-img .blog-plus-icon {
        opacity: 1;
    }

    .blog .blog-item .project-img img {
        transition: 0.5s;
    }

    .blog .blog-item:hover .project-img img {
        transform: scale(1.3);
    }

    /* New styling for making the whole area clickable */
    .project-link {
        display: block;
        width: 100%;
        height: 100%;
        text-decoration: none;
        /* Removes any link text styles */
    }

    /*** Blog End ***/
</style>

<style>
    .accordion-button:not(.collapsed) {
        color: red;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .125)
    }

    .sliderimg .item {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        /* height: 200px;  */
        /* overflow: hidden;  */
    }

    .sliderimg img {
        max-width: 100%;
        max-height: 100%;
        /* object-fit: cover;  */
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Lightbox2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/lightbox2@2.11.3/dist/css/lightbox.min.css" rel="stylesheet">

<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<style>
    body {
    margin: 0;
    font-family: "Montserrat", 'sans-serif';
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #0a0a0a;
    background-color: #fff;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
}

hr {
    margin: 1rem 0;
    color: inherit;
    background-color: currentColor;
    border: 0;
    opacity: .25
}

hr:not([size]) {
    height: 1px
}

h6,
.h6,
h5,
.h5,
h4,
.h4,
h3,
.h3,
h2,
.h2,
h1,
.h1 {
    margin-top: 0;
    margin-bottom: .5rem;
    font-family: "Montserrat", 'sans-serif';
    font-weight: 500;
    line-height: 1.2;
    color: #102147
}

h1,
.h1 {
    font-size: calc(1.375rem + 1.5vw)
}

@media(min-width: 1200px) {

    h1,
    .h1 {
        font-size: 2.5rem
    }
}

h2,
.h2 {
    font-size: calc(1.325rem + 0.9vw)
}

@media(min-width: 1200px) {

    h2,
    .h2 {
        font-size: 2rem
    }
}

h3,
.h3 {
    font-size: calc(1.3rem + 0.6vw)
}

@media(min-width: 1200px) {

    h3,
    .h3 {
        font-size: 1.75rem
    }
}

h4,
.h4 {
    font-size: calc(1.275rem + 0.3vw)
}

@media(min-width: 1200px) {

    h4,
    .h4 {
        font-size: 1.5rem
    }
}

h5,
.h5 {
    font-size: 1.25rem
}

h6,
.h6 {
    font-size: 1rem
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}



/* .footer {
        background: url({{ asset('frontend/img/purple_and_blue_light_gradient_background.jpg') }}) no-repeat center center !important;
        background: rgb(47, 91, 231) 100% !important;
        background-size: cover !important;      
        width: auto;
    } */

    .footer {
    background: linear-gradient(to bottom, rgba(3, 103, 166,0.3) 0%, rgba(47, 91, 231, 0.7) 100%), rgba(255, 255, 255, 0.9) !important;
}



    .copyright{
        font-family: "Montserrat", 'sans-serif' !important;
    }

</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

