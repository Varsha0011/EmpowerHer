<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmpowerHer</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> EmpowerHer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#schemes">Schemes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="search-container">
            <input  class="form-control mr-sm-2" type="text" id="prompt" placeholder="What do you want to do?">
            <button  class="btn btn-outline-success my-2 my-sm-0" onclick="searchPage()">Search</button>
            </div>
        </nav>
    </header>


    <!-- for prompt search start..... -->
    <script>
    function searchPage() {
        const query = document.getElementById("prompt").value;

        fetch("http://127.0.0.1:5000/search", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ query: query })
        })
        .then(res => res.json())
        .then(data => {
            window.location.href = data.url;
        })
        .catch(err => console.error("Error:", err));
    }
    </script>
    <!-- for prompt search end...... -->

    <!-- hero section  -->

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 text-content">
                    <h1>A Rural Women Empowerment Hub</h1>
                    <button class="btn"><a href="login.php">Login</a></button>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <img src="images/homepic.png" alt="ruralwomen" class="img-fluid">
                </div>


            </div>
        </div>
    </section>

<!---------- schemes section-------------------->
    <section class="schemes-section" id="schemes">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-12 col-sm-12 schemes">

                    <div class="row row1">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card" data-url="https://www.pmindia.gov.in/hi/government_tr_rec/%E0%A4%AC%E0%A5%87%E0%A4%9F%E0%A5%80-%E0%A4%AC%E0%A4%9A%E0%A4%BE%E0%A4%93-%E0%A4%AC%E0%A5%87%E0%A4%9F%E0%A5%80-%E0%A4%AA%E0%A4%A2%E0%A4%BC%E0%A4%BE%E0%A4%93-%E0%A4%AC%E0%A4%BE%E0%A4%B2/">
                                <img src="images/bbbp.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Beti Bachao Beti Padhao</h4>
                                    <p class="card-text">Beti Bachao Beti Padhao promotes saving and educating the girl child in India.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card" data-url="https://aajeevika.gov.in/about/introduction">
                                <img src="images/dindayalay.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Deendayal Antyodaya Yojana</h4>
                                    <p class="card-text">Deendayal Antyodaya Yojana focuses on uplifting the poor through skill development and self-employment opportunities.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row row2">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card" data-url="https://chhindwara.nic.in/en/scheme/rajiv-gandhi-scheme-for-empowerment-of-adolescent-girlsrgseag-sabla-the-scheme/">
                                <img src="images/sabla.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Sabla Scheme</h4>
                                    <p class="card-text">The Sabla Scheme, empowers adolescent girls through improved nutrition, health, and body awareness.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card" data-url="https://anand.nic.in/schemes/indira-gandhi-national-widow-pension-scheme/">
                                <img src="images/pension.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h4 class="card-title">Pension scheme </h4>
                                    <p class="card-text">Launched by the Ministry of Rural Development, NSAP aids widows aged 18+ below poverty line .</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>Schemes</h3>
                    <h1>Government Schemes for Rural Women</h1>
                    <p>EmpowerHer Projects offers an option for users to explore various government schemes specifically designed to support and empower rural women. These schemes aim to improve their socio-economic status, provide financial assistance, enhance skill development, and promote overall well-being, ensuring that rural women have access to essential resources and opportunities for growth.</p>
                    <button class="btn" onclick="window.location.href='https://mahilakalyan.up.nic.in/en/Citizen2.aspx';">Explore Schemes</button>
                </div>

            </div>
        </div>
    </section>

    <!-- about section  -->

    <section class="about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/about.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 text-content">
                    <h3>About EmpowerHer</h3>
                    <h1>Our Goals.</h1>

                    <p>
        <strong>Empowerment through Education:</strong> Provide educational resources and training programs to help rural women acquire new skills and improve their employability.<br>
        <strong>Financial Independence:</strong> Offer information on various financial schemes, grants, and loans available for women in rural areas to start or expand their businesses.<br>
        <strong>Health and Well-being:</strong> Share resources and information on health, nutrition, and wellness to ensure the holistic development of women.<br>
        <strong>Community Building:</strong> Create a supportive community where women can connect, share experiences, and support each other in their journeys.
    </p>

                </div>
            </div>
        </div>
    </section>

   

    <!-- contact section  -->

    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1>contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>IGDTUW,<br>New Delhi, 110006</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+91 0000000000<br>+91 55555555555</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>EmpowerHer@gmail.com<br>EmpowerHerall@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 05:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form action="contact.php" method="POST" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>

    <!-- footer section  -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo"><i class="bi bi-chat"></i> EmpowerHer</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <ul class="d-flex">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Schemes</a></li>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">contact</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2024_EmpowerHer</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>