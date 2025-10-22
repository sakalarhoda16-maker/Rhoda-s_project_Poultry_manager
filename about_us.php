<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PoultryPro Management</title>
    <style>
        /* Global Styles */
        :root {
            --primary: #1B5E20; /* Dark green */
            --secondary: #FF9800; /* Orange */
            --accent: #FFFFFF; /* White */
            --text: #333333;
            --light-bg: #F5F5F5;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            color: var(--text);
            line-height: 1.6;
            background-color: var(--accent);
        }
        
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        h1, h2, h3, h4 {
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        p {
            margin-bottom: 15px;
        }
        
        .btn {
            display: inline-block;
            background-color: var(--secondary);
            color: var(--accent);
            padding: 12px 25px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: #E65100; /* Darker orange */
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        section {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            font-size: 32px;
            position: relative;
            display: inline-block;
            padding-bottom: 15px;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 3px;
            background-color: var(--secondary);
        }
        
        /* Header */
        header {
            background-color: var(--primary);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }
        
        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--accent);
            text-decoration: none;
        }
        
        .logo span {
            color: var(--secondary);
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin-left: 30px;
        }
        
        .nav-links a {
            text-decoration: none;
            color: var(--accent);
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: var(--secondary);
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(27, 94, 32, 0.8), rgba(27, 94, 32, 0.8)), url('https://images.unsplash.com/photo-1594489573454-3a9e7b2c4ed3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            color: var(--accent);
            text-align: center;
            padding: 100px 0;
        }
        
        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h1 {
            font-size: 48px;
            color: var(--accent);
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
        }
        
        /* About Section */
        .about-content {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
        }
        
        .about-text {
            flex: 1;
            min-width: 300px;
        }
        
        .about-image {
            flex: 1;
            min-width: 300px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .about-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        /* Mission Section */
        .mission {
            background-color: #E8F5E9; /* Very light green */
        }
        
        .mission-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Values Section */
        .values {
            background-color: #E8F5E9; /* Very light green */
        }
        
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .value-card {
            background-color: var(--accent);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
            border-top: 3px solid var(--primary);
        }
        
        .value-card:hover {
            transform: translateY(-5px);
        }
        
        .value-icon {
            font-size: 40px;
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        /* CTA Section */
        .cta {
            text-align: center;
            background-color: var(--primary);
            color: var(--accent);
        }
        
        .cta h2 {
            color: var(--accent);
        }
        
        /* Footer */
        footer {
            background-color: var(--primary);
            color: var(--accent);
            padding: 40px 0;
        }
        
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
        }
        
        .footer-column {
            flex: 1;
            min-width: 200px;
        }
        
        .footer-column h3 {
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: var(--accent);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: var(--secondary);
        }
        
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-links a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--accent);
            transition: background-color 0.3s;
        }
        
        .social-links a:hover {
            background-color: var(--secondary);
        }
        
        .copyright {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Stats Section */
        .stats {
            background-color: var(--primary);
            color: var(--accent);
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }
        
        .stat-item {
            padding: 20px;
        }
        
        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 10px;
        }
        
        .stat-text {
            font-size: 18px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .hero p {
                font-size: 18px;
            }
            
            .section-title h2 {
                font-size: 28px;
            }
            
            .stat-number {
                font-size: 36px;
            }
            
            .footer-content {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">Poultry<span>Pro</span></a>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="#" class="active">About Us</a></li>
                    <li><a href="contact_us.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Leading Poultry Management Solutions</h1>
                <p>With over 15 years of experience in revolutionizing poultry farming through innovative technology and expert guidance.</p>
                <a href="contact_us.php" class="btn">Get In Touch</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">15+</div>
                    <div class="stat-text">Years Experience</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-text">Farms Served</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-text">Client Satisfaction</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-text">Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="section-title">
                <h2>Our Story</h2>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <p>PoultryPro was founded in 2008 with a simple mission: to help poultry farmers maximize their productivity through innovative management solutions. What started as a small consulting firm has grown into a comprehensive poultry management company serving clients across the country.</p>
                    <p>Our founder, John Anderson, grew up on a poultry farm and understood the challenges farmers face daily. After studying agricultural science and technology, he combined his practical experience with cutting-edge research to develop systems that would transform how poultry farms operate.</p>
                    <p>Today, we offer a full range of services from farm management software to nutritional consulting and health management programs. Our team of experts includes veterinarians, nutritionists, software engineers, and agricultural economists who work together to provide holistic solutions for modern poultry farming.</p>
                </div>
                <div class="about-image">
                    <img src="Images/chicken2.jpeg" alt="Modern poultry farm">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission">
        <div class="container">
            <div class="section-title">
                <h2>Our Mission</h2>
            </div>
            <div class="mission-content">
                <p>At PoultryPro, our mission is to empower poultry farmers with innovative tools, knowledge, and support to achieve sustainable and profitable operations while maintaining the highest standards of animal welfare and environmental responsibility.</p>
                <p>We believe that technology and traditional farming wisdom can work together to create a brighter future for the poultry industry. Through continuous research, development, and hands-on farmer education, we're committed to driving the industry forward.</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values">
        <div class="container">
            <div class="section-title">
                <h2>Our Values</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3>Sustainability</h3>
                    <p>We develop solutions that promote environmental stewardship and long-term viability for poultry farms.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-hand-holding-heart"></i>
                    </div>
                    <h3>Animal Welfare</h3>
                    <p>The health and well-being of animals is at the core of everything we do.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Innovation</h3>
                    <p>We continuously research and implement cutting-edge technologies to improve poultry management.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Partnership</h3>
                    <p>We work closely with farmers to understand their needs and develop tailored solutions.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Education</h3>
                    <p>We empower farmers through training and knowledge sharing to ensure their success.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-medal"></i>
                    </div>
                    <h3>Excellence</h3>
                    <p>We strive for the highest standards in all our products, services, and interactions.</p>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <footer>
        <div class="container">
            </div>
            <div class="copyright">
                <p>&copy; 2025 PoultryPro Management. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>