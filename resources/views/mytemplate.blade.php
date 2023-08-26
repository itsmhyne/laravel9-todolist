<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel &mdash; TodoList</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

        <!-- Styles -->

        <style>
            body {
            font-family: 'Nunito', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            }

            
            .neumorphic-box {
            /* width: 200px;
            height: 200px; */
            background-color: #f0f0f0;
            border-radius: 20px;
            /* display: flex; */
            /* justify-content: center;
            align-items: center; */
            box-shadow: 8px 8px 16px #d1d1d1, -8px -8px 16px #ffffff;
            }
            
            .emboss-box {
            /* width: 200px;
            height: 100px; */
            background-color: #f0f0f0;
            border: 1px solid #d1d1d1;
            border-radius: 8px;
            padding: 10px;
            box-shadow: inset 4px 4px 8px #d1d1d1, inset -4px -4px 8px #ffffff;
            }

            
            .bevel-box {
                /* width: 200px;
                height: 100px; */
                background-color: #f0f0f0;
                border: 1px solid #d1d1d1;
                border-radius: 12px;
                padding: 10px;
                box-shadow: 4px 4px 8px #d1d1d1, -4px -4px 8px #ffffff;
            }
            
            .bevel-btn {
                /* width: 200px;
                height: 100px; */
                background-color: #f0f0f0;
                border: 1px solid #d1d1d1;
                border-radius: 12px;
                padding: 10px;
                box-shadow: 4px 4px 8px #d1d1d1, -4px -4px 8px #ffffff;
            }

            .emboss-btn:hover{
                box-shadow: 4px 4px 8px #d1d1d1, -4px -4px 8px #ffffff;
            }

            .bevel-btn:hover{
                box-shadow: inset 4px 4px 8px #d1d1d1, inset -4px -4px 8px #ffffff;
            }

        </style>
    </head>
    <body class="antialiased">
        <div class="container neumorphic-box col-xl-10 col-xxl-8 px-4 py-5">
            <div class="row g-lg-5 px-5">
                <div class="alert alert-danger" role="alert">
                    A simple primary alert—check it out!
                </div>
            </div>
            <div class="row align-items-center g-lg-5 py-5">
                <div class="col-lg-7 text-center text-lg-start">
                    <h1 class="display-4 fw-bold lh-1 mb-3">Login</h1>
                    <p class="col-lg-10 fs-4">by <a target="_blank" href="https://www.github.com/itsmhyne">M. Hamdan Yusuf</a></p>
                </div>
                <div class="col-md-10 mx-auto col-lg-5">
                    <form class="p-4 p-md-5 bevel-box" method="post" action="/login">
                        <div class="form-floating mb-3">
                            <input name="user" type="text" class="emboss-box w-100" id="user" placeholder="User">
                        </div>
                        <div class="form-floating mb-3">
                            <input name="password" type="password" class="emboss-box w-100" id="password" placeholder="password">
                        </div>
                        <button class="w-100 bevel-btn text-primary" type="submit">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
