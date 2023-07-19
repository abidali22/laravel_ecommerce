<!DOCTYPE html>
<html>
    <head>
        <title>Wrong Connection Name!</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body style="background-color: #2A3F54; color: #ffffff;">
        <div class="container">
            <div class="content">
                <div class="title">
                    <h2 align="center" style="color:#FF0000;">Wrong Connection Name!</h2>   
                    <p align="center">
                        <strong>Sorry! You are typing wrong connection name. Please click on "Go Back" link and type the correct connection name. Thanks.<br/>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Go Back
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
