<!DOCTYPE html>
<html>
    <head>
        <title>Permission Denied!</title>

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
                    <h2 align="center" style="color:#FF0000;">Permission Denied!</h2>  
                    <p align="center">
                        <strong>Sorry! Your Trial Period Has Been Expired! Please Re-New!<br/>
                        Many Many Thanks <br/>
                        <a href="{{ config('app.companyFullUrl')  }}" style="color:white" target="_blank">{{ config('app.companyFullUrl')  }}</a> <br/>
                        Contact: Rana Asim Sarwar (0322-4120161, 0332-4324458) | Sohail Mumtaz (0323-4181787)<stront>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
