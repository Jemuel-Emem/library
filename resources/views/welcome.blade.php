<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BMS</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<style>
    /*===== GOOGLE FONTS =====*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

/*===== VARIABLES CSS =====*/
:root {
  --header-height: 3rem;

  /*========== Colors ==========*/
  --first-color: #069C54;
  --first-color-alt: #048654;
  --title-color: #393939;
  --text-color: #707070;
  --text-color-light: #A6A6A6;
  --body-color: #FBFEFD;
  --container-color: #FFFFFF;

  /*========== Font and typography ==========*/
  --body-font: 'Poppins', sans-serif;
  --biggest-font-size: 2.25rem;
  --h1-font-size: 1.5rem;
  --h2-font-size: 1.25rem;
  --h3-font-size: 1rem;
  --normal-font-size: .938rem;
  --small-font-size: .813rem;
  --smaller-font-size: .75rem;

  /*========== Font weight ==========*/
  --font-medium: 500;
  --font-semi-bold: 600;

  /*========== Margenes ==========*/
  --mb-1: .5rem;
  --mb-2: 1rem;
  --mb-3: 1.5rem;
  --mb-4: 2rem;
  --mb-5: 2.5rem;
  --mb-6: 3rem;

  /*========== z index ==========*/
  --z-tooltip: 10;
  --z-fixed: 100;
}

@media screen and (min-width: 768px){
  :root{
    --biggest-font-size: 4rem;
    --h1-font-size: 2.25rem;
    --h2-font-size: 1.5rem;
    --h3-font-size: 1.25rem;
    --normal-font-size: 1rem;
    --small-font-size: .875rem;
    --smaller-font-size: .813rem;
  }
}

/*========== BASE ==========*/
*,::before,::after{
  box-sizing: border-box;
}

html{
  scroll-behavior: smooth;
}

/*========== Variables Dark theme ==========*/
body.dark-theme{
  --title-color: #F1F3F2;
  --text-color: #C7D1CC;
  --body-color: #1D2521;
  --container-color: #27302C;
}

/*========== Button Dark/Light ==========*/
.change-theme{
  position: absolute;
  right: 1rem;
  top: 1.8rem;
  color: var(--text-color);
  font-size: 1rem;
  cursor: pointer;
}

body{
  margin: var(--header-height) 0 0 0;
  font-family: var(--body-font);
  font-size: var(--normal-font-size);
  background-color: var(--body-color);
  color: var(--text-color);
  line-height: 1.6;
}

h1,h2,h3,p,ul{
  margin: 0;
}

ul{
  padding: 0;
  list-style: none;
}

a{
  text-decoration: none;
}

img{
  max-width: 100%;
  height: auto;
}

/*========== CLASS CSS ==========*/
.section{
  padding: 4rem 0 2rem;
}

.section-title, .section-subtitle{
  text-align: center;
}

.section-title{
  font-size: var(--h1-font-size);
  color: var(--title-color);
  margin-bottom: var(--mb-3);
}

.section-subtitle{
  display: block;
  color: var(--first-color);
  font-weight: var(--font-medium);
  margin-bottom: var(--mb-1);
}

/*========== LAYOUT ==========*/
.bd-container{
  max-width: 960px;
  width: calc(100% - 2rem);
  margin-left: var(--mb-2);
  margin-right: var(--mb-2);
}

.bd-grid{
  display: grid;
  gap: 1.5rem;
}

.l-header{
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  z-index: var(--z-fixed);
  background-color: var(--body-color);
}

/*========== NAV ==========*/
.nav{
  max-width: 1024px;
  height: var(--header-height);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

@media screen and (max-width: 768px){
  .nav__menu{
    position: fixed;
    top: -100%;
    left: 0;
    width: 100%;
    padding: 1.5rem 0 1rem;
    text-align: center;
    background-color: var(--body-color);
    transition: .4s;
    box-shadow: 0 4px 4px rgba(0,0,0,.1);
    border-radius: 0 0 1rem 1rem;
    z-index: var(--z-fixed);
  }
}

.nav__item{
  margin-bottom: var(--mb-2);
}

.nav__link, .nav__logo, .nav__toggle{
  color: var(--text-color);
  font-weight: var(--font-medium);
}

.nav__logo:hover{
  color: var(--first-color);
}

.nav__link{
  transition: .3s;
}

.nav__link:hover{
  color: var(--first-color);
}

.nav__toggle{
  font-size: 1.3rem;
  cursor: pointer;
}

/* Show menu */
.show-menu{
  top: var(--header-height);
}

/* Active menu */
.active-link{
  color: var(--first-color);
}

/* Change background header */
.scroll-header{
  box-shadow: 0 2px 4px rgba(0,0,0,.1);
}

/* Scroll top */
.scrolltop{
  position: fixed;
  right: 1rem;
  bottom: -20%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: .3rem;
  background: rgba(6,156,84,.5);
  border-radius: .4rem;
  z-index: var(--z-tooltip);
  transition: .4s;
  visibility: hidden;
}

.scrolltop:hover{
  background-color: var(--first-color-alt);
}

.scrolltop__icon{
  font-size: 1.8rem;
  color: var(--body-color);
}

/* Show scrolltop */
.show-scroll{
  visibility: visible;
  bottom: 1.5rem;
}

/*========== HOME ==========*/
.home__container{
  height: calc(100vh - var(--header-height));
  align-content: center;
}

.home__title{
  font-size: var(--biggest-font-size);
  color: var(--first-color);
  margin-bottom: var(--mb-1);
}

.home__subtitle{
  font-size: var(--h1-font-size);
  color: var(--title-color);
  margin-bottom: var(--mb-4);
}

.home__img{
  width: 300px;
  justify-self: center;
}

/*========== BUTTONS ==========*/
.button{
  display: inline-block;
  background-color: var(--first-color);
  color: #FFF;
  padding: .75rem 1rem;
  border-radius: .5rem;
  transition: .3s;
}

.button:hover{
  background-color: var(--first-color-alt);
}

/*========== ABOUT ==========*/
.about__data{
  text-align: center;
}

.about__description{
  margin-bottom: var(--mb-3);
}

.about__img{
  width: 280px;
  border-radius: .5rem;
  justify-self: center;
}

/*========== SERVICES ==========*/
.services__container{
  row-gap: 2.5rem;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
}

.services__content{
  text-align: center;
}

.services__img{
  width: 64px;
  height: 64px;
  fill: var(--first-color);
  margin-bottom: var(--mb-2);
}

.services__title{
  font-size: var(--h3-font-size);
  color: var(--title-color);
  margin-bottom: var(--mb-1);
}

.services__description{
  padding: 0 1.5rem;
}


/*========== CONTACT ==========*/
.contact__container{
  text-align: center;
}

.contact__description{
  margin-bottom: var(--mb-3);
}

/*========== FOOTER ==========*/
.footer__container{
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  row-gap: 2rem;
}

.footer__logo{
  font-size: var(--h3-font-size);
  color: var(--first-color);
  font-weight: var(--font-semi-bold);
}

.footer__description{
  display: block;
  font-size: var(--small-font-size);
  margin: .25rem 0 var(--mb-3);
}

.social-icons {
  margin-left: 100px;
}

.footer__title{
  font-size: var(--h2-font-size);
  color: var(--title-color);
  margin-bottom: var(--mb-2);
}

.footer__link{
  display: inline-block;
  color: var(--text-color);
  margin-bottom: var(--mb-1);
}

.footer__link:hover{
  color: var(--first-color);
}

.footer__copy{
  text-align: center;
  font-size: var(--small-font-size);
  color: var(--text-color-light);
  margin-top: 3.5rem;
}

.material-icons.md-dark {
  color: rgba(65, 204, 111, 0.89);
}

/*========== MEDIA QUERIES ==========*/
@media screen and (min-width: 576px){
  .home__container,
  .about__container,
  .app__container{
    grid-template-columns: repeat(2,1fr);
    align-items: center;
  }

  .about__data, .about__initial,
  .app__data, .app__initial,
  .contact__container, .contact__initial{
    text-align: initial;
  }

  .about__img, .app__img{
    width: 380px;
    order: -1;
  }


  .contact__container{
    grid-template-columns: 1.75fr 1fr;
    align-items: center;
  }
  .contact__button{
    justify-self: center;
  }
}

@media screen and (min-width: 768px){
  body{
    margin: 0;
  }

  .section{
    padding-top: 8rem;
  }

  .nav{
    height: calc(var(--header-height) + 1.5rem);
  }
  .nav__list{
    display: flex;
  }
  .nav__item{
    margin-left: var(--mb-5);
    margin-bottom: 0;
  }
  .nav__toggle{
    display: none;
  }

  .change-theme{
    position: initial;
    margin-left: var(--mb-2);
  }

  .home__container{
    height: 100vh;
    justify-items: center;
  }

  .services__container,
  .menu__container{
    margin-top: var(--mb-6);
  }

  .menu__container{
    grid-template-columns: repeat(3, 210px);
    column-gap: 4rem;
  }
  .menu__content{
    padding: 1.5rem;
  }
  .menu__img{
    width: 130px;
  }

  .app__store{
    margin: 0 var(--mb-1) 0 0;
  }
}

@media screen and (min-width: 960px){
  .bd-container{
    margin-left: auto;
    margin-right: auto;
  }

  .home__img{
    width: 500px;
  }

  .about__container,
  .app__container{
    column-gap: 7rem;
  }
}

/* For tall screens on mobiles y desktop*/
@media screen and (min-height: 721px) {
    .home__container {
        height: 640px;
    }
}
</style>

<script>
    /*==================== SHOW MENU ====================*/
const showMenu = (toggleId, navId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId)

    // Validate that variables exist
    if(toggle && nav){
        toggle.addEventListener('click', ()=>{
            // We add the show-menu class to the div tag with the nav__menu class
            nav.classList.toggle('show-menu')
        })
    }
}
showMenu('nav-toggle','nav-menu')

/*==================== REMOVE MENU MOBILE ====================*/
const navLink = document.querySelectorAll('.nav__link')

function linkAction(){
    const navMenu = document.getElementById('nav-menu')
    // When we click on each nav__link, we remove the show-menu class
    navMenu.classList.remove('show-menu')
}
navLink.forEach(n => n.addEventListener('click', linkAction))

/*==================== SCROLL SECTIONS ACTIVE LINK ====================*/
const sections = document.querySelectorAll('section[id]')

function scrollActive(){
    const scrollY = window.pageYOffset

    sections.forEach(current =>{
        const sectionHeight = current.offsetHeight
        const sectionTop = current.offsetTop - 50;
        sectionId = current.getAttribute('id')

        if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
        }else{
            document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
        }
    })
}
window.addEventListener('scroll', scrollActive)

/*==================== CHANGE BACKGROUND HEADER ====================*/
function scrollHeader(){
    const nav = document.getElementById('header')
    // When the scroll is greater than 200 viewport height, add the scroll-header class to the header tag
    if(this.scrollY >= 200) nav.classList.add('scroll-header'); else nav.classList.remove('scroll-header')
}
window.addEventListener('scroll', scrollHeader)

/*==================== SHOW SCROLL TOP ====================*/
function scrollTop(){
    const scrollTop = document.getElementById('scroll-top');
    // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
    if(this.scrollY >= 560) scrollTop.classList.add('show-scroll'); else scrollTop.classList.remove('show-scroll')
}
window.addEventListener('scroll', scrollTop)

/*==================== DARK LIGHT THEME ====================*/
const themeButton = document.getElementById('theme-button')
const darkTheme = 'dark-theme'
const iconTheme = 'bx-sun'

// Previously selected topic (if user selected)
const selectedTheme = localStorage.getItem('selected-theme')
const selectedIcon = localStorage.getItem('selected-icon')

// We obtain the current theme that the interface has by validating the dark-theme class
const getCurrentTheme = () => document.body.classList.contains(darkTheme) ? 'dark' : 'light'
const getCurrentIcon = () => themeButton.classList.contains(iconTheme) ? 'bx-moon' : 'bx-sun'

// We validate if the user previously chose a topic
if (selectedTheme) {
  // If the validation is fulfilled, we ask what the issue was to know if we activated or deactivated the dark
  document.body.classList[selectedTheme === 'dark' ? 'add' : 'remove'](darkTheme)
  themeButton.classList[selectedIcon === 'bx-moon' ? 'add' : 'remove'](iconTheme)
}

// Activate / deactivate the theme manually with the button
themeButton.addEventListener('click', () => {
    // Add or remove the dark / icon theme
    document.body.classList.toggle(darkTheme)
    themeButton.classList.toggle(iconTheme)
    // We save the theme and the current icon that the user chose
    localStorage.setItem('selected-theme', getCurrentTheme())
    localStorage.setItem('selected-icon', getCurrentIcon())
})

/*==================== SCROLL REVEAL ANIMATION ====================*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '30px',
    duration: 2000,
    reset: true
});

sr.reveal(`.home__data, .home__img,
            .about__data, .about__img,
            .services__content, .menu__content,
            .app__data, .app__img,
            .contact__data, .contact__button,
            .footer__content`, {
    interval: 200
})


</script>
        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">

   <!--========== SCROLL TOP ==========-->
   <a href="#" class="scrolltop" id="scroll-top">
    <i class='bx bx-chevron-up scrolltop__icon'></i>
</a>

<!--========== HEADER ==========-->
<header class="l-header" id="header">
    <nav class="nav bd-container">
        <a href="#" class="nav__logo">City Public Library</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="#home" class="nav__link active-link">Home</a></li>
                <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                <li class="nav__item"><a href="#contact" class="nav__link">Contact us</a></li>
                <li class="nav__item"><a href="{{route('login')}}" class="nav__link">LogIn</a></li>

            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>

<main class="l-main">
    <!--========== HOME ==========-->
    <section class="home" id="home">
        <div class="home__container bd-container bd-grid">
            <div class="home__data">
                <br><br/>
                <h1 class="home__title">A ghost reminder</h1>
                <h2 class="home__subtitle">Some books leave us free <br> and some books make us free.</h2>
                <h2> OPEN ON MONDAY TO FRIDAY <br> FROM 8:00 AM TO 5:00 PM </h2>
            </div>

            <img src="{{asset('images/ghostbook.png')}}" alt="" class="about__img">


        </div>
    </section>

    <!--========== ABOUT ==========-->
    <section class="about section bd-container" id="about">
        <div class="about__container  bd-grid">
            <div class="about__data">
                <span class="section-subtitle about__initial">About us</span>
                <h5 class="section-title about__initial">All about General Trias<br>City Public Library<h5>
                <p class="about__description">HISTORY:
                    The General Trias City Library founded by the Local Government Officials. Inaugurated on April 17,2006 and received the special citation for implementing Best Practice on Environment Management as "MODEL MUNICIPAL LIBRARY" last Septemeber 17, 2007 at the Provincial Capitol,Trece Martirez City.
                    Most library collections was from Malabonian San Diego California U.S.A, purchasing by our local government, book allocation from the National Library of the Philippines and receiving book donations.
                    Year 2009, the library acquired 6 complete computer set with internet connection and free wi-fi and passed the evaluation of PRC Board for Librarian last Feb 22,2012
                    The library was affiliated to the National Library of the Philippines last June 13,2012
                    Today, library continues to perform its share of providing information sources and offered other services.</p>
            </div>

            <img src="{{asset('images/logo1.png')}}" alt="" class="about__img">
        </div>
    </section>

    <!--========== SERVICES ==========-->
    <section class="services section bd-container" id="services">
        <span class="section-subtitle">Services</span>
        <h2 class="section-title">Our amazing services</h2>

            <div class="services__content">
            <i class="material-icons" style="font-size: 100px; margin-left: -100px; margin-top: 20px;">clock</i>
                <h3 class="services__title">Real time availability</h3>
                <p class="services__description">Our system features real-time availability, ensuring you can instantly check if a book is available at a Gneral Trias City Public Library. You will also see the exact quantity of the book currently in stock, providing you with up-to-date information to plan your visit accordingly.</p>
            </div>

            <div class="services__content">
            <i class="material-icons" style="font-size: 100px; margin-left: 100px; margin-top: 20px;">books</i>
                <h3 class="services__title">Borrowing</h3>
                <p class="services__description">Our borrowing system is designed for maximum convenience and efficiency. Once you locate an available book in the library, you can quickly borrow it through our platform. The system will provide a due date and send reminders as the return date approaches.  This seamless process ensures a smooth and user-friendly experience, allowing you to enjoy your reading without unnecessary hassles.</p>
            </div>

            <div class="services__content">
                <div class="services__content">
            <i class="material-icons" style="font-size: 100px; margin-left: 10px; margin-top: 20px;">computer</i>
                <h3 class="services__title">Fast and easy</h3>
                <p class="services__description">To make the process even faster and easier, we offer a QR code feature. Simply scan the QR code to see your identity in the borrow booking, streamlining your experience and saving you valuable time.</p>
            </div>
        </div>
    </section>

    <!--========== CONTACT US ==========-->
    <section class="contact section bd-container" id="contact">
        <div class="contact__container bd-grid">
            <div class="contact__data">
                <span class="section-subtitle contact__initial">Let's talk</span>
                <h2 class="section-title contact__initial">Contact us</h2>
                <p class="contact__description">If you have any concerns, contact us and we will attend you quickly</p>
                <li>library.generaltrias@gmail.com</li>
            </div>
        </div>
    </section>
</main>

<!--========== FOOTER ==========-->
<footer class="footer section bd-container">
    <div class="footer__container bd-grid">
        <div class="footer__content">
            <a class="footer__logo">City Public Library</a>
            <span class="footer__description">Book Borrowing</span>
            <div>
                <a href="https://www.facebook.com/generaltriascitylibrary" class="social-icons"><i class="material-icons" style="font-size: 40px; margin-left: -100px; margin-top: -50px;">facebook</i></a>
            </div>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Information</h3>
            <ul>
                <li><a href="#contact" class="footer__link">Contact us</a></li>
                <li><a href="#services" class="footer__link">Services</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Adress</h3>
            <ul>
                <li>City Public Library</li>
                <li>Poblacion st., General Trias, Philippines, 4107</li>
                <li>(046) 509 4165</li>
            </ul>
        </div>
    </div>

    <p class="footer__copy">&#169; 2024 CPL Group. All right reserved</p>
</footer>

                </div>
            </div>

    </body>
</html>
