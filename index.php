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
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shCoreDefault.css"/>
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shCoreRDark.css"/>
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shThemeRDark.css"/>
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
            body, html {
                background: #fff;
                color: #000;
                font-family: Tahoma,Verdana,sans-serif;
            }
            h1 { text-transform: uppercase; }
            code { font-weight: bold; }
            p { margin: 10px 0; }
        </style>
    </head>
    <body>

        <div class="layout" data-name="default">
            <content></content>
            <div class="footer">
                <span class="left">Neill Russell</span>
                <span class="left"><a href="http://www.enru.co.uk">www.enru.co.uk</a></span>
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
            <p class="">Heroku is a Platform As A Service (PAAS)</p>
            <p class="">Supports the following languages:</p>
                <ul>
                    <li>Ruby</li>
                    <li>Java</li>
                    <li>Python</li>
                    <li>Clojure</li>
                    <li>Scala</li>
                    <li>Node.js</li>
                </ul>

            <p>...but supports many others through what it calls &quot;Buildpacks&quot;
            <a href="https://devcenter.heroku.com/articles/third-party-buildpacks">https://devcenter.heroku.com/articles/third-party-buildpacks</a></p>

            <p> facebook announced its partnership with Heroku on Thursday, 15 September 2011 and developers have been able to create PHP facebook apps through facebook's developer centre ever since. <a href="http://developers.facebook.com/blog/post/558/">http://developers.facebook.com/blog/post/558/</a></p>
        </div>


        <div class="slide">
            <h1>the Heroku way</h1>
            <p><a href="http://12factor.net">The Twelve-Factor App</a></p>
            <p>&quot;a methodology for building software-as-a-service apps&quot;</p>
            <p>Poka-yoke (ポカヨケ) - fail-safing/mistake-proofing</p>
            <p>web &amp; workers processes</p>
        </div>

        <div class="slide">

            <h1>Setting up heroku</h1>

            <p><a href="https://api.heroku.com/signup/devcenter">Get an account</a> and grab the <code>heroku toolbelt</code> from <a href="https://toolbelt.heroku.com/">https://toolbelt.heroku.com/</a></p>

            <pre class="brush: bash">
                $ heroku login
                Enter your Heroku credentials.
                Email: enru@example.com
                Password:
                Could not find an existing public key.
                Would you like to generate one? [Yn]
                Generating new SSH public key.
                Uploading ssh public key /Users/enru/.ssh/id_rsa.pub
            </pre>
            
            <p>Once you have logged in and sent a SSH key up to heroku you can create your app 
            with the <code>heroku create</code> command.</p> 

            <pre class="brush: bash">
                $ cd ~/myapp
                $ heroku create
                Creating stark-fog-398... done, stack is cedar
                http://stark-fog-398.herokuapp.com/ | git@heroku.com:stark-fog-398.git
                Git remote heroku added
            </pre>
            
        </div>

        <div class="slide">
            <h1>Deploying to Heroku</h1>
            <p>Deploying to heroku is done using git.</p>
            <p>A simple push is all that is required.</p>
        </div>

        <div class="slide">

            <h1>How does heroku know this is php?</h1>

            <p>heroku's buildpack for PHP looks for an <code>index.php</code> file in the root of the application.</p>

            <p>If found, heroku will start up the default process for the PHP buildpack, which is: <code>web: sh boot.sh</code>

            <p>The contents of <code>boot.sh</code> are:</p>

            <pre class="brush: bash">
                for var in `env|cut -f1 -d=`; do
                echo "PassEnv $var" >> /app/apache/conf/httpd.conf;
                done
                touch /app/apache/logs/error_log
                touch /app/apache/logs/access_log
                tail -F /app/apache/logs/error_log &
                tail -F /app/apache/logs/access_log &
                export LD_LIBRARY_PATH=/app/php/ext
                export PHP_INI_SCAN_DIR=/app/www
                echo "Launching apache"
                exec /app/apache/bin/httpd -DNO_DETACH
            </pre> 

            <p>The default processes for a buildpack can be overridden by committing &amp; deploying your own <code>Procfile</code></p>

        </div>

        <div class="slide">

            <h1>Local Development</h1>

            <p>Local dev can be done using PHP's dev server</p>

            <p>Foreman (part of the heroku toolbelt) can also be used for local development</p>
           
            <p>A local Procfile can be used to get Foreman to run the PHP dev server</p>

            <pre class="brush: bash">
                $ cat Procfile.dev 
                web: php -S localhost:5000 -t . 
                $ foreman start -f Procfile.dev 
                21:32:27 web.1  | started with pid 25937
            </pre>

            <p>Our web app will now be available at <a href="http://localhost:5000">http://localhost:5000/</a></p>

        </div>

        <div class="slide">

            <h1>Heroku Config</h1>

            <p>We can store &amp; display environment variables in heroku using the <code>heroku config</code> command.

            <pre class="brush: bash">
                $ heroku config:add MY_ENV_VAR=abc123
                Setting config vars and restarting pacific-cove-5430... done, v11
                MY_ENV_VAR: abc123
                $
                $ heroku config
                === pacific-cove-5430 Config Vars
                MY_ENV_VAR:                 abc123
            </pre>

            <p>Storing the application's configuration in the environment makes it very easy to move between development, testing and production platforms.</p>

            <p>It also reduces the risk of exposing confidential settings.</p>

        </div>

        <div class="slide">

            <h1>Local Environment Variables</h1>

            <p>Foreman also loads up any variables declared in a .env file into its environment</p> 
            
            <pre class="brush: bash">
                $ echo "STATUS=development" >>.env
            </pre>

            <p>There is an addon that will pull <code>heroku config</code> vars out into a local .env file that into can be used for local development with Foreman</p>
            <p><a href="https://github.com/ddollar/heroku-config">https://github.com/ddollar/heroku-config</a></p>

            <pre class="brush: bash">
                $ cat .env 
                STATUS=development
                MY_ENV_VAR=abc123
            </pre>

        </div>          

        <div class="slide">

            <h1>Accessing ENV vars</h1>

            <p>Environment variables are now accessible to PHP through the <code>getenv()</code> method.</p>

            <pre class="brush: php">
                &lt;?php
                $status = getenv('STATUS');
            </pre>

            <p>This is more reliable than using the super global var <code>$_ENV</code>.</p>

        </div>

        <div class="slide">
            <h1>Postgres DB Addon</h1>
            <pre class="brush: bash">
$ heroku addons:add heroku-postgresql:dev
Adding heroku-postgresql:dev to sushi... done, v69 (free)
  Attached as HEROKU_POSTGRESQL_RED
Database has been created and is available
</pre>


            <pre class="brush: bash">
$ heroku pg:info
=== HEROKU_POSTGRESQL_RED
Plan         Ika
Status       available
Data Size    82.8 GB
Tables       13
PG Version   9.1.3
Created      2012-02-15 09:58 PDT
=== HEROKU_POSTGRESQL_GRAY
Plan         Ronin
Status       following
Data Size    82.8 GB
</pre>


            <pre class="brush: bash">
$ heroku pg:psql
Connecting to HEROKU_POSTGRESQL_RED... done
psql (9.1.3, server 9.1.3)
SSL connection (cipher: DHE-RSA-AES256-SHA, bits: 256)
Type "help" for help.

rd2lk8ev3jt5j50=> SELECT * FROM users;
</pre>



        </div>          

        <div class="slide">
            <h1>connecting to Postgres with PDO</h1>
            <pre class="brush: bash">
$ heroku pg:credentials DATABASE
Connection info string:
   "dbname=vnb324vndgh23h host=ec2-123-45-678-910.compute-1.amazonaws.com port=6212 user=user1234 password=abcd123 sslmode=require"
            </pre>

            <pre class="brush: php">
require 'vendor/autoload.php';
try {
    $dsn = new enru\DsnFromEnv();
    error_log(var_export($dsn->parse(), true));
    $dbh = new PDO($dsn->parse());
} 
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
</pre>

        </div>          

        <div class="slide">
            <h1>Logs</h1>
        </div>          

        <div class="slide">
            <h1>Processes & Scaling</h1>
        </div>          

        <div class="slide">
            <h1>Buildpacks</h1>
<ul>
<li>
<code>bin/detect</code>: Determines whether to apply this buildpack to an app.</li>

<li>
<code>bin/compile</code>: Used to perform the transformation steps on the app.</li>

<li>
<code>bin/release</code>: Provides metadata back to the runtime.</li>
</ul>

https://devcenter.heroku.com/articles/buildpacks

https://devcenter.heroku.com/articles/buildpack-api

https://github.com/heroku/heroku-buildpack-php

https://github.com/andrewsg/heroku-buildpack-php-foundry

https://github.com/klaussilveira/heroku-buildpack-silex
https://github.com/ryanbrainard/heroku-buildpack-phing
        </div>          

        <div class="slide">
            <h1>closing</h1>
        </div>

        <div class="slide">
            <h1>other PAAS</h1>
    PagodaBox
    AppFog
    fortrabbit
    Engine Yard Orchestra PHP Platform
    Red Hat OpenShift Platform
    dotCloud
    AWS Elastic Beanstalk
    cloudControl
    Windows Azure
    Zend Developer Cloud
            </div>
        </div>          

        <div class="slide">
            <div class="vcenter">
                <h1>THE END</h1>
            </div>
        </div>          

    </body>
</html>
