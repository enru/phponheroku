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
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shCoreRDark.css"/>
        <link type="text/css" rel="stylesheet" href="/highlighter/styles/shThemeRDark.css"/>
        <script type="text/javascript">
            $(function() {
                $(".slide").slippy({
                    ratio: 1.69
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
            html, body {
                background: #fff;
                color: #000;
                font-family: Tahoma,Verdana,sans-serif;
            }
            h1 { text-transform: uppercase; }
            code { 
                font-weight: bold; 
                background-color: lightgrey;
                padding: 4px;
            }
            p { margin: 10px 0; line-height: 1.5; font-size: 18px;}
            .syntaxhighlighter {  padding: 1em 0 !important; }
            ol.twelve-factor { margin-left: 50px; }
            ul.buildpacks li { line-height: 2.5; }
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
            <div class="vcenter">
                <h1>PHP on Heroku</h1>
            </div>
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

            <p>Many others supported through &quot;Buildpacks&quot;</p>
            <p><a href="https://devcenter.heroku.com/articles/third-party-buildpacks">https://devcenter.heroku.com/articles/third-party-buildpacks</a></p>

            <p>facebook announced its partnership with Heroku on Thursday, 15 September 2011.</p> 

		<p><a href="http://developers.facebook.com/blog/post/558/">http://developers.facebook.com/blog/post/558/</a></p>
        </div>

        <div class="slide">
            <h1>other PAAS</h1>
            <div class="vcenter">
                <ul>
                    <li>PagodaBox</li>
                    <li>AppFog</li>
                    <li>fortrabbit</li>
                    <li>Engine Yard Orchestra PHP Platform</li>
                    <li>Red Hat OpenShift Platform</li>
                    <li>dotCloud</li>
                    <li>AWS Elastic Beanstalk</li>
                    <li>cloudControl</li>
                    <li>Windows Azure</li>
                    <li>Zend Developer Cloud</li>
                </ul>
            </div>
        </div>    

        <div class="slide">
            <h1>the Heroku way</h1>
            <p class="incremental">processes (the UNIX model)</p>
            <p class="incremental">Poka-yoke (ポカヨケ) - fail-safing/mistake-proofing </p>
            <p class="incremental">&quot;to eliminate product defects by preventing, correcting, or drawing attention to human errors as they occur&quot;</p>
            <p class="incremental"><a href="http://12factor.net">The Twelve-Factor App</a></p>
            <p class="incremental">&quot;a methodology for building software-as-a-service apps&quot;</p>
            <div class="incremental">
                <ol class="twelve-factor">
                <li>Codebase - One codebase tracked in revision control, many deploys</li>
                <li>Dependencies - Explicitly declare and isolate dependencies</li>
                <li>Config - Store config in the environment</li>
                <li>Backing Services - Treat backing services as attached resources</li>
                <li>Build, release, run - Strictly separate build and run stages</li>
                <li>Processes - Execute the app as one or more stateless processes</li>
                <li>Port binding - Export services via port binding</li>
                <li>Concurrency - Scale out via the process model</li>
                <li>Disposability - Maximize robustness with fast startup and graceful shutdown</li>
                <li>Dev/prod parity - Keep development, staging, and production as similar as possible</li>
                <li>Logs - Treat logs as event streams</li>
                <li>Admin processes - Run admin/management tasks as one-off processes </li>
                </ol>
            </div>

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
            <h1>Processes & Scaling</h1>

            <p>heroku allows you to runs as many processes as you like</p>

            <p>View your running process with <code>heroku ps</code>

            <p>By default, heroku provides one <code>web</code> process and tries to automatically identify your application type.</p>

            <p>Commit a <code>Procfile</code> if you need more control over your processes.</p>

            <pre class="brush: bash">
                $ cat Procfile 
                web: sh boot.sh 
                worker: php queue_runner.php
                clock: php update_feed.php
            </pre>

            <p>Processes are scaled up ad down with <code>heroku ps:scale web=2</code>

        </div>          

        <div class="slide">

            <h1>Heroku Config</h1>

            <p>We can store &amp; display environment variables in heroku using the <code>heroku config</code> command.

            <pre class="brush: bash">
                $ heroku config:add MY_ENV_VAR=abc123
                Setting config vars and restarting pacific-cove-5430... done, v11
                MY_ENV_VAR: abc123
            </pre>

            <p>Storing the application's configuration in the environment makes it very easy to move between development, testing and production platforms.</p>

            <p>It also reduces the risk of exposing confidential settings.</p>

        </div>

        <div class="slide">

            <h1>Local Development</h1>

            <p>Local dev can be done using PHP's dev server.</p>

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
            <h1>Logs</h1>

            <p>heroku provides access to your application logs with <code>heroku logs</code>.</p>

            <p><code>stdout</code> and <code>stderr</code> go to logs.</p>

            <p>Several filters to this command are available <code>heroku logs --source app</code> or <code>heroku logs --ps web</code>.</p>

            <p>Logs can be tailed with <code>heroku logs --tail</code>.</p>

            <p>Logs can be sent to syslogd on another machine.</p>

            <pre class="brush: bash">
                $ heroku drains:add syslog://host1.example.com:514
                Drain syslog://host1.example.com:514 added to myapp
            </pre>

        </div>          

        <div class="slide">

            <h1>Maintenance &amp; 404</h1>

            <p>You can set a default 404 page by adding a <code>ERROR_PAGE_URL</code> variable to your heroku config.</p>

            <p>Putting your app/site into maintenance mode is a simple as:</p>

            <pre class="brush: bash">
                $ heroku maintenance:on
            </pre>

            <p>Visitors are redirected to the default maintenance page or the URL contained in the <code>MAINTENANCE_PAGE_URL</code> env var.</li>

        </div>

        <div class="slide">
            <h1>Postgres DB Addon</h1>

            <p>heroku provides Postgres as a database solution</p>

            <pre class="brush: bash">
                $ heroku addons:add heroku-postgresql:dev
                Adding heroku-postgresql:dev to pacific... done, v69 (free)
                  Attached as HEROKU_POSTGRESQL_TEAL
                Database has been created and is available
            </pre>

            <p>You can find info about your DB with <code>heroku pg:info</code>.</p> 

            <p><code>heroku pg:psql</code> will give you access to your production DB.</p>

            <p>To achieve dev/production parity, you can pull your production DB into your dev DB with <code>heroku db:pull [DATABASE_URL]</code>
            or dump your DB like so:</p>

            <pre class="brush: bash">
                $ heroku pgbackups:capture
                $ curl -o latest.dump `heroku pgbackups:url`
            </pre>


        </div>          

        <div class="slide">

            <h1>connecting to Postgres with a DSN</h1>

            <p>heroku provide a command to get your DB's Data Source Name</p>

            <pre class="brush: bash">
$ heroku pg:credentials DATABASE
Connection info string:
   "dbname=vnb324vndgh23h host=ec2-123-45-678-910.compute-1.amazonaws.com port=6212 user=user1234 password=abcd123 sslmode=require"
            </pre>

            <p>This info is already in your environment.</p>

            <p><a href="https://github.com/enru/dsnfromenv">https://github.com/enru/dsnfromenv</a></p>

            <pre class="brush: php">
require 'enru/dsnfromenv.php';
try {
    $dsn = new enru\DsnFromEnv();
    $dbh = new PDO($dsn->parse());
} 
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
</pre>
        

        </div>          

        <div class="slide">
            <h1>Deploying to Heroku</h1>
            <p>Deploying to heroku is done using git. A simple push is all that is required.</p>
            <pre class="brush: bash">
                $ git push origin master
                Counting objects: 5, done.
                Delta compression using up to 2 threads.
                Compressing objects: 100% (3/3), done.
                Writing objects: 100% (3/3), 4.39 KiB, done.
                Total 3 (delta 1), reused 0 (delta 0)
                -----> PHP app detected
                -----> Bundling Apache version 2.2.22
                -----> Bundling PHP version 5.3.10
                -----> Discovering process types
                       Procfile declares types -> (none)
                       Default types for PHP   -> web
                -----> Compiled slug size: 9.6MB
                -----> Launching... done, v12
                       http://pacific-cove-5430.herokuapp.com deployed to Heroku

                To git@heroku.com:pacific-cove-5430.git
                   ba90ccb..4323b3d  master -> master
            </pre>
        </div>

        <div class="slide">

            <h1>How does heroku know this is php?</h1>

            <p>heroku's buildpack for PHP looks for an <code>index.php</code> file.</p>

            <p>If no Procfile the default process for the PHP buildpack is run, which is: <code>`web: sh boot.sh`</code></p>

            <pre class="brush: bash">
                $ cat boot.sh
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

        </div>

        <div class="slide">
            <h1>Buildpacks</h1>

            <ul class='buildpacks'>
                <li><code>bin/detect</code>: Determines whether to apply this buildpack to an app.</li>
                <li><code>bin/compile</code>: Used to perform the transformation steps on the app.</li>
                <li><code>bin/release</code>: Provides metadata back to the runtime.</li>
            </ul>

            <p>This is how a tailor-made platform can be created - choice of web-server, compiled PHP modules</p>  


            <pre class="brush: bash">
                $ heroku create myapp --buildpack https://github.com/some/buildpack.git
            </pre>

            <p>Set the <code>BUILDPACK_URL</code> to change the buildpack in use.</p> 

            <pre class="brush: bash">
                $ heroku config:add BUILDPACK_URL=https://github.com/some/buildpack.git -a myapp
            </pre>

            <ul>
                <li><a href="https://github.com/heroku/heroku-buildpack-php">php buildpack</a></li>
                <li><a href="https://github.com/klaussilveira/heroku-buildpack-silex">silex buildpack</a></li>
                <li><a href="https://devcenter.heroku.com/articles/third-party-buildpacks">3rd party buildpacks</a></li>
            </ul>
            
        </div>          

        <div class="slide">
            <h1>closing</h1>
            <div class="vcenter">
                <p class="incremental">using a PAAS allows you to focus on development</p>
                <p class="incremental">many free/low-cost plans = cheap to execute ideas</p>
                <p class="incremental">ability to scale is there if/when needed</p>
                <p class="incremental">good engineering principles encouraged</p> 
                <p class="incremental">easy to move app/sites built in this way</p>
            </div>
        </div>
      

        <div class="slide">
            <div class="vcenter">
                <h1>THE END</h1>
            </div>
        </div>          

    </body>
</html>


	
