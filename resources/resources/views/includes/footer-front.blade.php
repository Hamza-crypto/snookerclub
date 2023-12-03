<footer>


    <nav class="navbar navbar-expand-lg footer" id="footer">
        <div class="container-fluid">
            <!--<a class="navbar-brand" id="footerlogo" href="#">Logo</a>-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link footernav active" aria-current="page" href="{{ route('tournament.contact') }}">Contact</a>
                    <a class="nav-link footernav" href="#">Privacy Policy</a>
                    <a class="nav-link footernav" href="#">Terms of service</a>
                </div>
            </div>
        </div>
    </nav>
    <p id="footer-text">18, Av Omar Ibn Al Khattab Agdal - Rabat | Phone: (+212) 6 21 30 78 78 | Email:
        contact@snookernpool.com <br><br> Copyright © 2022 Snookernpool</p>
    <!-- <div class="copyright">© 2022 - SNOOKERNPOOL</div> -->
</footer>


<!-- Google tag (gtag.js) -->
@if(env('APP_ENV') == 'production')
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-78WVB8NY9B"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-78WVB8NY9B');
    </script>
@endif

