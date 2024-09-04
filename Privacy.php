<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/privacy.css">
</head>
<body>
  <header class="HPrivacy">
          
    <h1 class="Privacy-h">Privacy Policy Information</h1>

  </header>

    <nav class="navBar">
    <?php if(!isset($_SESSION['userid'])) { ?>
    <a href="./login.php"> <button class="LOG-img">Login</button></a>
    <?php } ?>
        <ul class="nav">
          <li><a class="link" href="./index.php">Home</a></li>
          <li><a class="link" href="./Pages/menu.php">Menu</a></li>
          <li><a class="link" href="../Pages/event.php">Events </a></li>
            <li><a class="link" href="../Pages/promotion.php">Promotions </a></li>
          <li><a class="link" href="./Pages/reservation.php">Reservation</a></li>
          <li><a class="link" href="./Pages/contact.php">Contact</a></li>
          <li><a class="link" href="./about.php">About</a></li>
          <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') : ?>
      <li><a class="link" href="./Admin_dashboard/admindashboard.php">Admin Dashboard</a></li>
      <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] == 'Staff') : ?>
        <li><a class="link" href="./staff/staffdashboard.php">Staff Dashboard</a></li>
        <?php endif ; ?>
        </ul>
      </nav>

      <p class="privasy-p">Effective Date: [Insert Date] <br>

At The Gallery Café, we value your privacy and are committed to protecting your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or interact with our services. By using our website, you agree to the practices described in this policy. <br>

1. Information We Collect <br>

We collect information that you voluntarily provide to us when you use our website or services. This includes:<br>

Personal Information: Name, email address, phone number, mailing address, and other contact details when you create an account, make a reservation, or contact us.
Payment Information: Payment details when you place an order or make a reservation online. We use secure payment gateways to process payments, and we do not store your full credit card information.
Technical Data: IP address, browser type, operating system, and other technical details collected through cookies and similar technologies to enhance your experience on our website.
Order and Reservation Details: Information related to your meal orders, reservations, and participation in special events or promotions.<br>
2. How We Use Your Information<br>

We use the information we collect for the following purposes:

To Provide Services: Process your reservations, pre-orders, and purchases, and manage your account.
To Communicate with You: Send you confirmations, updates, and promotional materials, respond to inquiries, and provide customer support.
To Improve Our Services: Analyze usage patterns and preferences to improve our website, menu offerings, and customer experience.
To Comply with Legal Obligations: Fulfill our legal and regulatory responsibilities.
3. Sharing Your Information

We do not sell or rent your personal information to third parties. However, we may share your information with:

Service Providers: Third-party vendors who help us operate our website, process payments, or provide services on our behalf. These vendors are contractually obligated to protect your information.
Legal Requirements: If required by law, we may disclose your information to comply with legal processes, respond to government requests, or protect our rights and safety.
4. Cookies and Tracking Technologies

Our website uses cookies and similar tracking technologies to enhance your experience. Cookies are small text files stored on your device that help us remember your preferences, understand how you use our site, and personalize content. You can manage your cookie preferences through your browser settings, but disabling cookies may affect the functionality of our website.

5. Data Security

We take the security of your information seriously. We implement appropriate technical and organizational measures to protect your personal data from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.

6. Your Rights

You have the right to:

Access Your Information: Request a copy of the personal data we hold about you.
Correct Your Information: Update or correct any inaccuracies in your personal data.
Delete Your Information: Request the deletion of your personal data, subject to certain legal exceptions.
Opt-Out of Communications: Unsubscribe from our promotional emails by following the instructions provided in the emails.
To exercise any of these rights, please contact us using the contact information provided below.

7. Third-Party Links

Our website may contain links to third-party websites, including social media platforms, event pages, or external services. We are not responsible for the privacy practices or content of these third-party sites. We encourage you to review their privacy policies before sharing any personal information.

8. Changes to This Privacy Policy

We may update this Privacy Policy from time to time to reflect changes in our practices, legal requirements, or operational needs. We will notify you of any significant changes by posting the revised policy on our website and updating the effective date.

9. Contact Us

If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:</p>
</body>
</html>