<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supreme Student Council</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap');

    * {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-decoration: none;
        transition: .2s linear;
    }

    body {
        zoom: 80%;
    }

    section {
        padding: 2rem 18%;
    }

    .header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 9%;
        z-index: 1;
        background: #FFFFFF;
        box-shadow: 0px 2px 4px rgba(0, 73, 30);
    }

    .header .logo span {
        margin-left: 0.5rem;
        font-weight: bold;
        display: inline-block;
        vertical-align: middle;
        color: #00491E;
        font-size: 1.5rem;
    }

    .header .navbar #Close {
        display: none;
        position: absolute;
        top: 4rem;
        right: 2rem;
        cursor: pointer;
        font-size: 3rem;
        color: #000000;
    }

    .header .navbar a {
        font-size: 1.3rem;
        margin-right: 2rem;
        color: #00491E;
    }

    .header .navbar a:hover {
        color: #FFC600;
    }

    .header #Menu {
        display: none;
        cursor: pointer;
        font-size: 2.5rem;
        color: #000000;
    }

    .home {
        display: flex;
        margin-top: 1rem;
        flex-wrap: wrap;
        gap: 1.5rem;
        min-height: 120vh;
        align-items: center;
        justify-content: center;
        background: #E9ECEF;
    }

    .home .content {
        flex: 1 1 40rem;
        padding-top: 6.5rem;
    }

    .home #content .title {
        font-size: 4rem;
        color: #00491E;
        padding-top: 3rem;
    }

    .home #content .title span {
        color: #919F02;
    }

    .home #content .description {
        font-size: 1.5rem;
        font-weight: lighter;
        color: #00491E;
    }

    .home #content .btn {
        margin-top: 3rem;
        display: inline-block;
        padding: .9rem 3rem;
        font-size: 1.5rem;
        color: #FFFFFF;
        background: #02681E;
        cursor: pointer;
    }

    .home .image {
        flex: 1 1 20rem;
    }

    .about_us {
        display: flex;
        flex-wrap: wrap;
        min-height: 120vh;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
    }

    .about_us #content .title {
        font-size: 3rem;
        color: #00491E;
    }

    .about_us #content .title span {
        color: #919F02;
    }

    .about_us #content .description {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.8;
        padding: 0.5rem 0;
        color: #00491E;
        text-align: justify;
        letter-spacing: -0.5px;
    }

    .aims {
        display: flex;
        flex-wrap: wrap;
        min-height: 120vh;
        align-items: center;
        justify-content: center;
        background: #E9ECEF;
    }

    .aims #content .title {
        font-size: 3rem;
        color: #00491E;
    }

    .aims #content .title span {
        color: #919F02;
    }

    .aims #content .description {
        font-size: 1rem;
        font-weight: 500;
        line-height: 1.8;
        padding: 0.5rem 0;
        color: #00491E;
        text-align: justify;
        letter-spacing: -0.5px;
    }

    @media (max-width:991px) {
        html {
            font-size: 55%;
        }

        .header {
            padding: 2rem;
        }

        section {
            padding: 2rem;
        }
    }

    @media (max-width:768px) {
        .header .navbar {
            position: fixed;
            top: 0;
            right: -105%;
            width: 30rem;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(50px);
            transform: .5s;
            height: 100%;
            display: flex;
            flex-flow: column;
            justify-content: center;
            z-index: 1200;
        }

        .header .navbar.active {
            right: 0;
        }

        .header .navbar #Close {
            display: block;
        }

        .header .navbar a {
            display: block;
            margin: 1rem 0;
            text-align: center;
            font-size: 3rem;
        }

        .header #Menu {
            display: inline-block;
        }

        .home .content {
            padding-top: 9.5rem;
        }

        .home .content .title {
            font-size: 4rem;
        }

        .home .image .img {
            width: 368px;
        }
    }

    @media (max-width:450px) {
        html {
            font-size: 50%;
        }
    }
    </style>
</head>

<body>
    <header class="header">
        <a href="#Home" class="logo">
            <span>Central Mindanao University</span>
        </a>
        <nav class="navbar">
            <div class="fas fa-times" id="Close"></div>
            <a href="#AboutUs" class="nav_item">About Us</a>
            <a href="#Aims" class="nav_item">Terms of Use</a>
                        <a href="#privacy" class="nav_item">Privacy Policy</a>
            <a href="{{ route('login') }}" class="nav_item">Login</a>
            <a href="{{ route('register') }}" class="nav_item">Sign Up</a>
        </nav>
        <div class="fas fa-bars" id="Menu"></div>
    </header>
    <section class="home" id="Home">
        <div id="content">
            <h1 class="title">Supreme Student<span> Council</span></h1>
            <br>
            <p class="description">Explore, Connect, Experience: Your Ultimate Events Destination</p>
            <a href="{{ route('login') }}" class="btn">Login</a>
            <a href="{{ route('register') }}" class="btn" style="Background-color: #919f02">Sign Up</a>
        </div>
        <img src="{{ asset('images/sms_logo.png')}}" data-speed="-3" class="move"
            style="max-width: 250px; height: auto;">
    </section>
    <section class="about_us" id="#AboutUs">
        <div id="content">
            <h1 class="title">ABOUT <span>US</span></h1>
            <p class="description">Welcome to the University News and Event SMS Notification System. A project led by
                the IT students from the College of Information Sciences and Computing. Our goal is to enhance
                communication
                and involvement among CMU students by delivering timely updates about campus news and upcoming events
                through SMS notifications.
            </p>
            <p class="description">Our goal is to foster a strong sense of belonging at Central Mindanao University by
                keeping students informed
                about important campus news, events, and activities. We aim to encourage students to participate in
                university events by utilizing
                communication channels that are easily accessible and user-friendly.
            </p>
            <p class="description">We are committed to maintaining the privacy and security of students' personal
                information.
                We adhere to strict data protection practices and only use students' information for the purpose of
                delivering SMS
                notifications related to university news and events.
            </p>
            <p class="description">If you have any questions, suggestions, or feedback about the University News and
                Event SMS Notification System,
                please don't hesitate to reach out to the College of Information Sciences and Computing of Central
                Mindanao University.
                Your input is valuable to us as we strive to improve the system and better serve the Central Mindanao
                University community.
            </p>
        </div>
    </section>
    <section class="aims" id="Aims">
        <div id="content">
            <h1 class="title">TERMS OF <span>USE</span></h1>
            <p class="description">These Terms of Use (Terms) govern your access to and use of the system. By
                registering and using the system,
                you agree to be bound by these Terms. If you do not agree with any part of these Terms, you may not
                access or use the system.
            </p>
            <p class="description">
                Registration and Personal Information: <br>
                1. To use the system, you must fill up the registration form and provide accurate, current, and complete
                information about
                yourself in order to use the system; <br>
                2. You agree to maintain and promptly update your registration information to ensure it remains
                accurate, current, and complete; <br>
                3. By registering for the system, you agree to the collection and use of your personal information
                including your mobile number,
                in order to receive SMS notifications about news updates and upcoming events at Central Mindanao
                University.
            </p>
            <p class="description">
                Use of the System: <br>
                1. The system is intended solely for the purpose of providing news updates and event notifications
                within CMU to registered students; <br>
                2. You agree not to use the system for any unlawful purpose or in any way that violates these Terms;
                <br>
                3. You are solely responsible for maintaining the confidentiality of your account and password and for
                restricting access to your account.
            </p>
            <p class="description">
                SMS Notifications: <br>
                1. By providing your mobile number during registration, you agree to receive SMS notifications from the
                system regarding the upcoming
                events and news updates within Central Mindanao University; <br>
                2. You acknowledge that standard messaging rates may apply, depending on your mobile carrier and plan.
            </p>
            <p class="description">
                Intellectual Property Rights: <br>
                1. The content provided through the system, including but not limited to news updates, event details,
                and SMS notifications, is the property of Central Mindanao University; <br>
                2. You may not modify, reproduce, distribute, or create derivative works based on the content provided
                through
                the system without the express written consent of Central Mindanao University.
            </p>
            <p class="description">
                Termination: <br>
                1. Your access to the system may be suspended or terminated by Central Mindanao University at any time,
                for any reason, and without prior notice; <br>
                2. Upon termination, your right to use the System will immediately cease, and you must cease all use of
                the System and delete any downloaded or
                printed materials obtained from the System. Any information obtained from the System through screenshots
                should be used in compliance with these
                Terms of Use and CMU's policies.
            </p>
            <p class="description">
                Changes to Terms: <br>
                1. Central Mindanao University maintains the right to modify or replace these Terms at any time. If a
                revision is material,
                CMU will provide at least 30 days' notice prior to any new terms taking effect.; <br>
                2. If you keep using the system after any changes are implemented, it implies your agreement to the
                updated Terms.
            </p>
            <p class="description">
                Governing Law: <br>
                1. These Terms will be regulated by and interpreted in accordance with the laws of the Philippines,
                without regard to its conflict of law principles.
            </p>
        </div>
    </section>
    <section class="aims" id="privacy">
        <div id="content">
            <h1 class="title">PRIVACY<span> POLICY</span></h1>
            <p class="description">This Privacy Policy describes how Central Mindanao University (CMU) collects, uses,
                and discloses personal information collected
                from users of the University News and Event SMS Notification System. By registering and using the
                System, you consent to the practices described
                in this Privacy Policy.
            </p>
            <p class="description">
                Information Collection and Use: <br>
                1. We gather personal data, including name, student ID, email address, and mobile number, when you
                register for the system; <br>
                2. We use this information to provide you with SMS notifications about upcoming events and news updates
                within Central Mindanao University; <br>
                3. Your personal information may also be used to communicate with you about system-related matters, such
                as account management and updates.
            </p>
            <p class="description">
                Use of the System: <br>
                1. The system is intended solely for the purpose of providing news updates and event notifications
                within CMU to registered students; <br>
                2. You agree not to use the system for any unlawful purpose or in any way that violates these Terms;
                <br>
                3. You are solely responsible for maintaining the confidentiality of your account and password and for
                restricting access to your account.
            </p>
            <p class="description">
                SMS Notifications: <br>
                1. By providing your mobile number during registration, you agree to receive SMS notifications from the
                System regarding upcoming events and news updates within Central Mindanao University; <br>
                2. We may use third-party service providers to facilitate the delivery of SMS notifications.
                These providers are contractually obligated to protect your personal information and may only
                use it for the purpose of providing the SMS notification service.
            </p>
            <p class="description">
                Information Sharing: <br>
                1. We may share your personal information with authorized personnel within Central Mindanao
                University, including members of the Supreme Student Council and administrative staff, for the
                purpose of managing and operating the system; <br>
                2. We may disclose your personal information if required to do so by
                law or in response to valid requests by public authorities (e.g., law enforcement agencies).
            </p>
            <p class="description">
                Data Security:: <br>
                1. We take reasonable measures to protect the security of your personal information against unauthorized
                access, alteration, disclosure, or destruction; <br>
                2. Despite our efforts to safeguard your personal information, no method of transmission over the
                internet or electronic storage is
                completely secure. Therefore, we cannot guarantee absolute security.
            </p>
            <p class="description">
                Retention of Personal Information: <br>
                1. We retain your personal information for as long as necessary to fulfill the purposes outlined in this
                Privacy Policy,
                unless a longer retention period is required or permitted by law.
            </p>
            <p class="description">
                Your Rights: <br>
                1. You have the right to access, update, or delete your personal information at any time by contacting
                the Supreme Student Council of Central Mindanao University; <br>
                2. You may also have the right to object to or restrict certain processing of your personal information
                in accordance with applicable data protection laws.
            </p>
            <p class="description">
                Changes to Privacy Policy: <br>
                1. We reserve the right to update or modify this Privacy Policy at any time. If we make material changes
                to this Privacy Policy, we will notify you by email or by posting a notice on the system's website prior
                to the changes taking effect.
            </p>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script>
    let navbar = document.querySelector('.header .navbar');
    document.querySelector('#Menu').onclick = () => {
        navbar.classList.add('active');
    };
    document.querySelector('#Close').onclick = () => {
        navbar.classList.remove('active');
    };
    document.addEventListener('mousemove', move);

    function move(e) {
        this.querySelectorAll('.move').forEach(layer => {
            const speed = layer.getAttribute('data-speed');
            const x = (window.innerWidth - e.pageX * speed) / 120;
            const y = (window.innerHeight - e.pageY * speed) / 120;
            layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        const homeLink = document.querySelector('.logo[href="#Home"]');
        homeLink.addEventListener('click', function(event) {
            event.preventDefault();
            const homeSection = document.querySelector('.home');
            homeSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const aboutUsLink = document.querySelector('.nav_item[href="#AboutUs"]');
        aboutUsLink.addEventListener('click', function(event) {
            event.preventDefault();
            const aboutUsSection = document.querySelector('.about_us');
            aboutUsSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const aimsLink = document.querySelector('.nav_item[href="#Aims"]');
        aimsLink.addEventListener('click', function(event) {
            event.preventDefault();
            const aimsSection = document.querySelector('.aims');
            aimsSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    document.addEventListener("DOMContentLoaded", function() {
        const aboutUsLink = document.querySelector('.btn[href="#AboutUs"]');
        aboutUsLink.addEventListener('click', function(event) {
            event.preventDefault();
            const aboutUsSection = document.querySelector('.about_us');
            aboutUsSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    </script>
</body>

</html>