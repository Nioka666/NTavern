<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#232323" fill-opacity="1" d="M0,160L48,170.7C96,181,192,203,288,218.7C384,235,480,245,576,245.3C672,245,768,235,864,240C960,245,1056,267,1152,266.7C1248,267,1344,245,1392,234.7L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
    </path>
</svg>
<footer>
    <p>© 2023 Adhim Niokagi</p>
    <!-- <div> 
        <a href="https://facebook.com/nioka666"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
    </div> -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById("sidebar");
        sidebar.classList.toggle("active");
        document.body.classList.toggle("overlay-active");

        var closeBtn = document.querySelector(".close-btn");
        closeBtn.classList.toggle("active");
    }
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        var title = document.querySelector('.navbar-title');
        if (window.pageYOffset > 200) {
            navbar.classList.add('navbar-fade');
            title.classList.add('title-hide');
        } else {
            navbar.classList.remove('navbar-fade');
            title.classList.remove('title-hide');
        }
    });
</script>
</body>
</html>

<!--  Adhim Niokagi
      Github : Nioka666 -->