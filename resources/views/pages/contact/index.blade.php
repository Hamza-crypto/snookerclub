<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,900&amp;display=swap">
    <title>Contact | snookerNpool</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/front/css/contact/style.css') }}" >

</head>


<body data-new-gr-c-s-check-loaded="14.1070.0" data-gr-ext-installed="" cz-shortcut-listen="true">


@include('includes.navbar')

<div class="maincontent">
    <div class="contacthe">CONTACT US</div>
</div>
<div class="content">
    <div class="c-form">
        <h2>WE'RE READY, LET'S TALK.</h2>
        <div>
            <div class="contact-form-wrapper d-flex justify-content-center">
                <form action="#" class="contact-form">
                    <div>
                        <input type="text" class="form-control rounded border-white mb-3 form-input" id="name" placeholder="Your Name" required>
                    </div>
                    <div>
                        <input type="email" class="form-control rounded border-white mb-3 form-input" placeholder="Email Address" required>
                    </div>
                    <div>
                        <textarea id="message" class="form-control rounded border-white mb-3 form-text-area" rows="5" cols="30" placeholder="Message" required></textarea>
                    </div>
                    <div class="submit-button-wrapper">
                        <input type="submit" value="Send Message">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="contact-info">
        <h2>CONTACT INFO</h2>
        <div class="cont-inf">
            <h3>Address</h3>
            <P>18, Av Omar Ibn Al Khattab Agdal - Rabat</P>
            <h3>Email Us</h3>
            <p>contact@snookernpool.com</p>
            <h3>Call Us</h3>
            <p>(+212) 6 21 30 78 78</p>
            <h3>Follow Us</h3>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-whatsapp"></a>

        </div>
    </div>
</div>






<footer>


    <nav class="navbar navbar-expand-lg footer" id="footer">
        <div class="container-fluid">
            <!--<a class="navbar-brand" id="footerlogo" href="#">Logo</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link footernav active" aria-current="page" href="#">Contact</a>
                    <a class="nav-link footernav" href="#">Privacy Policy</a>
                    <a class="nav-link footernav" href="#">Terms of service</a>
                </div>
            </div>
        </div>
    </nav>
    <p id="footer-text">18, Av Omar Ibn Al Khattab Agdal - Rabat | Phone: (+212) 6 21 30 78 78 | Email: contact@snookernpool.com <br><br> Copyright © 2022 Snookernpool</p>
    <!-- <div class="copyright">© 2022 - SNOOKERNPOOL</div> -->
</footer>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>


</html>
