<!DOCTYPE html>
<html>
<head>
    <title>Whitesquare</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">

    <link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet">

</head>
<body>

<body>
<div class="wrapper container">

    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li><a href="/">Главная</a></li>
            <li class="active"><a href="/services">Услуги</a></li>
            <li><a href="/portfolio">Портфолио</a></li>
            <li><a href="/contacts">Контакты</a></li>
            <li><a href="/news/">Новости</a></li>
            <li><a href="/registr">Вход</a></li>
            <li><a href="/projects/">Projects</a></li>
            <li><a href="/contact/">Contact</a></li>
        </ul>
    </nav>
    <div class="heading">
        <h1>About us</h1>
    </div>
    <div class="row">
        <aside class="col-md-7">
            <ul class="list-group submenu">
                <li class="list-group-item active">Lorem ipsum</li>
                <li class="list-group-item"><a href="/donec/">Donec tincidunt laoreet</a></li>
                <li class="list-group-item"><a href="/vestibulum/">Vestibulum elit</a></li>
                <li class="list-group-item"><a href="/etiam/">Etiam pharetra</a></li>
                <li class="list-group-item"><a href="/phasellus/">Phasellus placerat</a></li>
                <li class="list-group-item"><a href="/cras/">Cras et nisi vitae odio</a></li>
            </ul>
        </aside>
        <section class="col-md-17">
            <div class="jumbotron">
                <blockquote>
                    <p>
                        &ldquo;Quisque in enim velit, at dignissim est. nulla ul corper, dolor ac pellentesque
                        placerat, justo tellus gravida erat, vel porttitor libero erat.&rdquo;
                    </p>
                    <small>John Doe, Lorem Ipsum</small>
                </blockquote>
            </div>

            <?php include 'application/views/'.$content_view; ?>
            <div class="row">
                <div class="col-md-12">
                    <img src="/images/about-1.png" alt="" class="thumbnail">
                </div>
                <div class="col-md-12">
                    <img src="/images/about-2.png" alt="" class="thumbnail">
                </div>
            </div>

        </section>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
           <div class="col-md-4 sitemap">
                <h3>Sitemap</h3>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/home/">Home</a>
                        <a href="/about/">About</a>
                        <a href="/services/">Services</a>
                    </div>
                    <div class="col-md-12">
                        <a href="/partners/">Partners</a>
                        <a href="/customers/">Support</a>
                        <a href="/contact/">Contact</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 social">
                <h3>Social networks</h3>
                <a href="http://twitter.com/" class="social-icon twitter"></a>
                <a href="http://facebook.com/" class="social-icon facebook"></a>
                <a href="http://plus.google.com/" class="social-icon google-plus"></a>
                <a href="http://vimeo.com/" class="social-icon-small vimeo"></a>
                <a href="http://youtube.com/" class="social-icon-small youtube"></a>
                <a href="http://flickr.com/" class="social-icon-small flickr"></a>
                <a href="http://instagram.com/" class="social-icon-small instagram"></a>
                <a href="/rss/" class="social-icon-small rss"></a>
            </div>
            <div class="col-md-8 footer-logo">
                <a href="/"><img src="images/footer-logo.png" alt="Whitesquare logo"></a>
                <p>
                    Copyright &copy; 2012 Whitesquare. A
                    <a href="http://pcklab.com">pcklab</a> creation
                </p>
            </div>
        </div>
    </div>
</footer>
</body>


</html>