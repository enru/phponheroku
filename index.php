<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <title>PHP on Heroku</title>
        <meta name="generator" content="Organic" />
        <meta name="author" content="Neill Russell (enru)" />
        <meta name="company" content="enru technology" />
        <meta name="email" content="n@enru.co.uk" />
        <meta name="date" content="2013-02-13" />
        <meta name="venue" content="The Internets" />
        <script type="text/javascript" src="/slippy/src/jquery.min.js"></script>
        <script type="text/javascript" src="/slippy/src/jquery.history.js"></script>
        <script type="text/javascript" src="/slippy/src/slippy.js"></script>
        <link type="text/css" rel="stylesheet" href="/slippy/src/slippy.css"/>
        <link type="text/css" rel="stylesheet" href="/slippy/src/slippy-pure.css"/>
        <script type="text/javascript" src="/highlighter/scripts/shCore.js"></script>
        <script type="text/javascript" src="/highlighter/scripts/shBrushBash.js"></script>
        <script type="text/javascript" src="/highlighter/scripts/shBrushPhp.js"></script>
        <script type="text/javascript" src="/highlighter/scripts/shBrushPlain.js"></script>
        <script type="text/javascript" src="/highlighter/scripts/shBrushSql.js"></script>
        <script type="text/javascript" src="/highlighter/scripts/shBrushXml.js"></script>
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shCore.css"/>
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shThemeDefault.css"/>
        <script type="text/javascript">
            $(function() {
                $(".slide").slippy({
                    // settings go here
                    // possible values are:
                    //  - animLen, duration for default animations (0 = disabled)
                    //  - animInForward, receives a slide and animates it
                    //  - animInRewind, receives a slide and animates it
                    //  - animOutForward, receives a slide and animates it
                    //  - animOutRewind, receives a slide and animates it
                    //  - baseWidth, defines the base for img resizing, if you don't want only
                    //    full-width images, specify this as the pixel width of a slide so that
                    //    images are scaled properly (default is 620px wide)
                    //  - ratio, defines the width/height ratio of the slides, defaults to 1.3 (620x476)
                    //  - margin, the fraction of screen to use as slide margin, defaults to 0.15
                });
                SyntaxHighlighter.all();
            });
        </script>
        <!-- Custom style for this deck -->
        <style type="text/css">
            .slide.nofooter {
                border: 0;
                background: 0;
            }
        </style>
    </head>
    <body>

        <div class="layout" data-name="default">
            <content></content>
            <div class="footer">
                <span class="left">Neill Russell</span>
                <span class="left">Blog <a href="http://www.enru.co.uk/blog/">www.enru.co.uk/blog</a></span>
                <span class="right">Twitter <a href="http://twitter.com/enru">@enru</a></span>
                <hr class="defloat" />
            </div>
        </div>

        <div class="layout nofooter" data-name="alt">
            <content></content>
        </div>

        <div class="slide">
            <h1>PHP on Heroku</h1>
        </div>

        <div class="slide">
            <h1>Heroku</h1>
            <p class="incremental">Heroku is a Platform As A Service (PAAS)</p>
            <p class="incremental">Supports many languages</p>
            <p> facebook </p>
        </div>


        <div class="slide">
            <h1>the Heroku way</h1>
            <p><a href="http://12factor.net">The Twelve-Factor App</a></p>
            <p>&quot;a methodology for building software-as-a-service apps&quot;</p>
        </div>

        <div class="slide">
            <h1>Setting up a Heroku Environment</h1>
        </div>

        <div class="slide">
            <h1>Deploying to Heroku</h1>
        </div>

        <div class="slide">
            <h1>Heroku Config</h1>
        </div>

        <div class="slide">
            <h1>Local Config &amp; Enviroment</h1>
        </div>          

        <div class="slide">
            <h1>Postgres DB Addon</h1>
        </div>          

        <div class="slide">
            <h1>contecting to Postgres with PDO</h1>
        </div>          

        <div class="slide">
            <h1>Logs</h1>
        </div>          

        <div class="slide">
            <h1>Buildpacks</h1>
        </div>          

        <div class="slide">
            <h1>THE END</h1>
        </div>          

        <div class="slide">
            <h1>Syntax Highlighting</h1>
            <pre class="brush: php">
                function foo($var) {
                    // this is some php code as an example
                    $foo = new Class("meh");
                    $foo->bar();
                }
            </pre>
        </div>

        <div class="slide">
            <h1>Incremental Slides</h1>
            <p>Hit next</p>
            <p class="incremental">Every "next slide" action builds up the slide</p>
            <p class="incremental">element..</p>
            <p class="incremental">by..</p>
            <p class="incremental">element.</p>
            <p class="incremental">For every element that has the incremental class on the slide.</p>
            <p class="incremental">That's it for now, enjoy!</p>
        </div>

    </body>
</html>
