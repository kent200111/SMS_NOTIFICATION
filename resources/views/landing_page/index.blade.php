<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Updates</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        display: flex;
        flex-direction: column;
        width: 100%;
        min-height: 100vh;
        background-image: url('{{ asset('images/green.jpg') }}');
        /* Using the asset() function */
        background-size: cover;
        background-position: center;
    }


    .top-right-links {
        position: absolute;
        top: 20px;
        right: 20px;
        display: flex;
        gap: 20px;
    }

    .top-right-links a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 60vh;
        width: 80%;
        max-width: 600px;
        padding: 50px 50px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        border-radius: 20px;
        position: relative;
        margin-top: 80px;
        margin-left: 50px;
        margin-bottom: 50px;
        margin: 80px auto;
    }

    .content {
        width: 100%;
        margin-bottom: 20px;
    }

    .container img {
        max-width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 5vw;
        text-transform: uppercase;
        text-align: center;
        line-height: 1;
        text-shadow: 2px 2px 0 #ffffff;
        color: rgb(139, 199, 139);
        /* font-family: 'Palatino Bold'; */
        font-family: 'League Gothic', sans-serif;
    }

    p {
        text-align: justify;
        /* color: #fff; */
        color: #000;
    }

    .login-signup-button:hover {
        color: #4cac74;
    }


    .footer-links {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .footer-link {
        color: #000;
        /* Text color */
        text-decoration: none;
        font-size: 14px;
    }

    .footer-link:hover {
        color: white;
    }

    /* Modal CSS Design */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 90%;
        max-width: 800px;
        border-radius: 10px;
        /* overflow-y: scroll; */
    }

    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
    }

    .tab {
        overflow: hidden;
        border-bottom: 1px solid #ccc;
        margin-bottom: 10px;
    }

    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    .tab button.active {
        border-bottom: 2px solid #2ecc71;
    }

    .tab button:hover {
        background-color: #ddd;
    }

    .tabcontent {
        display: none;
        padding: 20px 0;
    }


    .modal-footer {
        text-align: right;
        margin-top: 10px;
    }

    .modal-footer button {
        border: none;
        outline: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 20px;
    }

    .modal-footer button.accept {
        background-color: #2ecc71;
    }

    .modal-footer button.decline {
        background-color: #e74c3c;
    }
    </style>

</head>

<body>
    <div class="top-right-links">
        <a href="login" class="login-signup-button">Login</a>
        <a href="register" class="login-signup-button">Signup</a>
    </div>

    <div class="container">
        <div class="content">
            <h2>Welcome to university updates!</h2>
            <p style="text-align: center; color: white;">We are excited to introduce you to our platform, designed to
                keep you informed about campus events and news.</p>
            <p style="text-align: center; color: white;">Receive real-time alerts on your phone with just a few clicks.
                Stay connected with us and never miss out on what's happening at Central Mindanao University.</p>
            <p style="text-align: center; color: white;">We're happy to have you join us.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-links">
        <div class="footer-links">
            <a href="#" class="footer-link" onclick="openModal('privacy')">Privacy Policy</a>
            <a href="#" class="footer-link" onclick="openModal('terms')">Terms of Use</a>
            <a href="#" class="footer-link" onclick="openModal('about')">About Us</a>
            <a href="https://www.facebook.com/cmuonessc" class="footer-link">Contact Us</a>
        </div>
    </footer>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'privacy')">Privacy Policy</button>
                <button class="tablinks" onclick="openTab(event, 'terms')">Terms of Use</button>
                <button class="tablinks" onclick="openTab(event, 'about')">About Us</button>
            </div>

            <!-- Tab Content -->
            <div id="privacy" class="tabcontent" style="text-align: justify;">
                <h3>Privacy Policy for University News and Event SMS Notification System</h3>
                <p>This Privacy Policy describes how Central Mindanao University (CMU) collects, uses, and discloses
                    personal information collected from users of the University News and Event SMS Notification System.
                    By registering and using the System, you consent to the practices described in this Privacy Policy.
                </p>
                <h4>Information Collection and Use:</h4>
                <ul>
                    <li>We gather personal data, including name, student ID, email address, and mobile number, when you
                        register for the system.</li>
                    <li>We use this information to provide you with SMS notifications about upcoming events and news
                        updates within Central Mindanao University.</li>
                    <li>Your personal information may also be used to communicate with you about system-related matters,
                        such as account management and updates.</li>
                </ul>
                <h4>SMS Notifications:</h4>
                <ul>
                    <li>By providing your mobile number during registration, you agree to receive SMS notifications from
                        the System regarding upcoming events and news updates within Central Mindanao University.</li>
                    <li>We may use third-party service providers to facilitate the delivery of SMS notifications. These
                        providers are contractually obligated to protect your personal information and may only use it
                        for the purpose of providing the SMS notification service.</li>
                </ul>
                <h4>Information Sharing:</h4>
                <ul>
                    <li>We may share your personal information with authorized personnel within Central Mindanao
                        University, including members of the Supreme Student Council and administrative staff, for the
                        purpose of managing and operating the system.</li>
                    <li>We may disclose your personal information if required to do so by law or in response to valid
                        requests by public authorities (e.g., law enforcement agencies).</li>
                </ul>
                <h4>Data Security:</h4>
                <ul>
                    <li>We take reasonable measures to protect the security of your personal information against
                        unauthorized access, alteration, disclosure, or destruction.</li>
                    <li>Despite our efforts to safeguard your personal information, no method of transmission over the
                        internet or electronic storage is completely secure. Therefore, we cannot guarantee absolute
                        security.</li>
                </ul>
                <h4>Retention of Personal Information:</h4>
                <ul>
                    <li>We retain your personal information for as long as necessary to fulfill the purposes outlined in
                        this Privacy Policy, unless a longer retention period is required or permitted by law.</li>
                </ul>
                <h4>Your Rights:</h4>
                <ul>
                    <li>You have the right to access, update, or delete your personal information at any time by
                        contacting the Supreme Student Council of Central Mindanao University.</li>
                    <li>You may also have the right to object to or restrict certain processing of your personal
                        information in accordance with applicable data protection laws.</li>
                </ul>
                <h4>Changes to Privacy Policy:</h4>
                <ul>
                    <li>We reserve the right to update or modify this Privacy Policy at any time. If we make material
                        changes to this Privacy Policy, we will notify you by email or by posting a notice on the
                        system's website prior to the changes taking effect.</li>
                </ul>
                <h4>Contact Us:</h4>
                <ul>
                    <li>If you have any questions or concerns about this Privacy Policy or our data practices, please
                        contact the Supreme Student Council of Central Mindanao University through their official
                        Facebook account, CMU Supreme Student Council.</li>
                </ul>
                <p>By using the University News and Event SMS Notification System, you acknowledge that you have read
                    and understood this Privacy Policy and agree to the collection, use, and disclosure of your personal
                    information as described herein.</p>
            </div>

            <div id="terms" class="tabcontent" style="text-align: justify;">
                <h3>Terms of Use for University News and Event SMS Notification System</h3>
                <p>Welcome to the University News and Event SMS Notification System, a platform facilitated by the
                    Supreme Student Council of Central Mindanao University (CMU) and the administration. These Terms of
                    Use (Terms) govern your access to and use of the system. By registering and using the system, you
                    agree to be bound by these Terms. If you do not agree with any part of these Terms, you may not
                    access or use the system.</p>
                <h4>Registration and Personal Information:</h4>
                <ul>
                    <li>To use the system, you must fill up the registration form and provide accurate, current, and
                        complete information about yourself in order to use the system.</li>
                    <li>You agree to maintain and promptly update your registration information to ensure it remains
                        accurate, current, and complete.</li>
                    <li>By registering for the system, you agree to the collection and use of your personal information
                        including your mobile number, in order to receive SMS notifications about news updates and
                        upcoming events at Central Mindanao University.</li>
                </ul>
                <h4>Use of the System:</h4>
                <ul>
                    <li>The system is intended solely for the purpose of providing news updates and event notifications
                        within CMU to registered students.</li>
                    <li>You agree not to use the system for any unlawful purpose or in any way that violates these
                        Terms.</li>
                    <li>You are solely responsible for maintaining the confidentiality of your account and password and
                        for restricting access to your account.</li>
                </ul>
                <h4>SMS Notifications:</h4>
                <ul>
                    <li>By providing your mobile number during registration, you agree to receive SMS notifications from
                        the system regarding the upcoming events and news updates within Central Mindanao University.
                    </li>
                    <li>You acknowledge that standard messaging rates may apply, depending on your mobile carrier and
                        plan.</li>
                </ul>
                <h4>Intellectual Property Rights:</h4>
                <ul>
                    <li>The content provided through the system, including but not limited to news updates, event
                        details, and SMS notifications, is the property of Central Mindanao University.</li>
                    <li>You may not modify, reproduce, distribute, or create derivative works based on the content
                        provided through the system without the express written consent of Central Mindanao University.
                    </li>
                </ul>
                <h4>Termination:</h4>
                <ul>
                    <li>Your access to the system may be suspended or terminated by Central Mindanao University at any
                        time, for any reason, and without prior notice.</li>
                    <li>Upon termination, your right to use the System will immediately cease, and you must cease all
                        use of the System and delete any downloaded or printed materials obtained from the System. Any
                        information obtained from the System through screenshots should be used in compliance with these
                        Terms of Use and CMU's policies.</li>
                </ul>
                <h4>Changes to Terms:</h4>
                <ul>
                    <li>Central Mindanao University maintains the right to modify or replace these Terms at any time. If
                        a revision is material, CMU will provide at least 30 days' notice prior to any new terms taking
                        effect.</li>
                    <li>If you keep using the system after any changes are implemented, it implies your agreement to the
                        updated Terms.</li>
                </ul>
                <h4>Governing Law:</h4>
                <ul>
                    <li>These Terms will be regulated by and interpreted in accordance with the laws of the Philippines,
                        without regard to its conflict of law principles.</li>
                </ul>
                <p>If you have any questions about these Terms, please contact the Supreme Student Council of Central
                    Mindanao University through their official Facebook account, CMU Supreme Student Council.</p>
            </div>

            <div id="about" class="tabcontent" style="text-align: justify;">
                <h3>University News and Event SMS Notification System</h3>
                <p>Welcome to the University News and Event SMS Notification System. A project led by the Supreme
                    Student Council of Central Mindanao University (CMU), in collaboration with IT students from the
                    College of Information Sciences and Computing. Our goal is to enhance communication and involvement
                    among CMU students by delivering timely updates about campus news and upcoming events through SMS
                    notifications.</p>
                <h4>Mission Statement:</h4>
                <p>Our goal is to foster a strong sense of belonging at Central Mindanao University by keeping students
                    informed about important campus news, events, and activities. We aim to encourage students to
                    participate in university events by utilizing communication channels that are easily accessible and
                    user-friendly.</p>
                <h4>Features of the System:</h4>
                <ul>
                    <li><strong>SMS Notifications:</strong> Registered students receive SMS notifications directly to
                        their mobile phones, providing them with timely reminders about upcoming events, deadlines, and
                        news updates.</li>
                    <li><strong>User Registration:</strong> Students can easily register for the System by providing
                        their personal information, including their mobile number, ensuring that they stay connected
                        with campus happenings.</li>
                    <li><strong>Centralized Information:</strong> The System serves as a centralized platform for
                        disseminating important information to CMU students, ensuring that everyone has access to the
                        latest news and event details.</li>
                </ul>
                <h4>Our Commitment:</h4>
                <p>The Supreme Student Council and CMU administration are committed to maintaining the privacy and
                    security of students' personal information. We adhere to strict data protection practices and only
                    use students' information for the purpose of delivering SMS notifications related to university news
                    and events.</p>
                <h4>Contact Us:</h4>
                <p>If you have any questions, suggestions, or feedback about the University News and Event SMS
                    Notification System, please don't hesitate to reach out to the Supreme Student Council of Central
                    Mindanao University through their official Facebook account, CMU Supreme Student Council.. Your
                    input is valuable to us as we strive to improve the system and better serve the Central Mindanao
                    University community.</p>
                <p>Thank you for choosing to stay informed with us!</p>
            </div>

            <!-- Modal: Accept and Decline Button -->
            <div class="modal-footer">
                <button class="accept" onclick="accept()">Accept</button>
                <button class="decline" onclick="decline()">Decline</button>
            </div>

        </div>
    </div>


    <script>
    // Open the modal and specify tab
    function openModal(tabName) {
        document.getElementById('myModal').style.display = 'block';
        openTab(event, tabName); // Specified Tab
    }

    // Close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }

    // Accept action
    function accept() {
        alert('Accepted');
    }

    // Decline action
    function decline() {
        alert('Declined');
    }

    // Open the specific tab content
    function openTab(evt, tabName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName('tabcontent');
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = 'none';
        }
        tablinks = document.getElementsByClassName('tablinks');
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(' active', '');
        }
        document.getElementById(tabName).style.display = 'block';
        evt.currentTarget.className += ' active';
    }
    </script>

</body>

</html>