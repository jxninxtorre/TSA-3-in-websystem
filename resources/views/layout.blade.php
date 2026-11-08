<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Tasks for Today</title>
    <style>
        * { box-sizing: border-box; }

        :root {
            --cream: #fff8ee;
            --paper: #fffdf8;
            --latte: #e8d3b9;
            --coffee: #6b4a3a;
            --coffee-soft: #9a7b68;
            --pink: #ffc6d3;
            --pink-deep: #f08fa8;
            --matcha: #c5dfa8;
            --matcha-deep: #8fb36a;
            --butter: #ffe9a8;
        }

        body {
            margin: 0;
            font-family: "Quicksand", "Trebuchet MS", "Segoe UI", sans-serif;
            color: var(--coffee);
            min-height: 100vh;
            /* pink gingham tablecloth */
            background-color: #fff0f3;
            background-image:
                repeating-linear-gradient(0deg, rgba(255,198,211,.55) 0 24px, transparent 24px 48px),
                repeating-linear-gradient(90deg, rgba(255,198,211,.55) 0 24px, transparent 24px 48px);
            background-attachment: fixed;
        }

        .wrap { max-width: 800px; margin: 0 auto; padding: 28px 16px 48px; }

        /* cafe sign with awning */
        .banner {
            background: var(--cream);
            border: 3px solid var(--coffee);
            border-radius: 22px;
            box-shadow: 6px 6px 0 var(--coffee);
            margin-bottom: 24px;
            overflow: hidden;
        }
        .awning {
            height: 34px;
            background: repeating-linear-gradient(90deg, var(--pink-deep) 0 36px, var(--cream) 36px 72px);
            border-bottom: 3px solid var(--coffee);
            position: relative;
        }
        .awning::after {
            content: "";
            position: absolute;
            left: 0; right: 0; bottom: -11px;
            height: 12px;
            background:
                radial-gradient(circle at 18px 0, var(--pink-deep) 17px, transparent 18px) 0 0 / 72px 12px repeat-x,
                radial-gradient(circle at 54px 0, var(--cream) 17px, transparent 18px) 0 0 / 72px 12px repeat-x;
        }
        .banner .inner {
            padding: 26px 12px 20px;
            text-align: center;
        }
        .banner h1 {
            margin: 0;
            font-size: 32px;
            letter-spacing: 1px;
        }
        .banner h1 em {
            font-style: normal;
            background: var(--pink);
            padding: 0 10px;
            border-radius: 12px;
        }
        .banner small { display: block; margin-top: 8px; color: var(--coffee-soft); }

        /* nav = little menu tabs */
        nav { display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 24px; }
        nav a {
            flex: 1;
            min-width: 110px;
            text-align: center;
            padding: 9px 12px;
            text-decoration: none;
            font-weight: bold;
            color: var(--coffee);
            background: var(--cream);
            border: 3px solid var(--coffee);
            border-radius: 999px;
            box-shadow: 3px 3px 0 var(--coffee);
            transition: transform .12s ease, box-shadow .12s ease;
        }
        nav a:hover { background: var(--butter); }
        nav a:active { transform: translate(3px, 3px); box-shadow: 0 0 0 var(--coffee); }
        nav a.active { background: var(--matcha); }

        /* menu cards */
        .window {
            background: var(--cream);
            border: 3px solid var(--coffee);
            border-radius: 22px;
            box-shadow: 6px 6px 0 var(--coffee);
            margin-bottom: 24px;
            overflow: hidden;
        }
        .titlebar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 16px;
            font-weight: bold;
            background: var(--matcha);
            border-bottom: 3px solid var(--coffee);
        }
        .titlebar .btns span {
            display: inline-block;
            width: 12px; height: 12px;
            margin-left: 6px;
            font-size: 0;
            border-radius: 50%;
            background: var(--cream);
            border: 2px solid var(--coffee);
        }
        .content {
            margin: 10px;
            padding: 22px;
            background: var(--paper);
            border: 2px dashed var(--latte);
            border-radius: 14px;
        }

        h2 { margin-top: 0; font-size: 24px; }
        h2::after {
            content: "";
            display: block;
            width: 90px; height: 6px;
            margin-top: 8px;
            border-radius: 6px;
            background: repeating-linear-gradient(90deg, var(--pink-deep) 0 12px, var(--pink) 12px 24px);
        }

        /* tables = menu list */
        table { width: 100%; border-collapse: collapse; background: var(--paper); }
        th {
            text-align: left;
            padding: 10px;
            background: var(--butter);
            border-bottom: 3px solid var(--coffee);
        }
        td { padding: 10px; border-bottom: 2px dotted var(--latte); }
        tr:nth-child(even) td { background: #fff4e3; }

        /* sticker badges */
        .badge {
            display: inline-block;
            padding: 2px 12px;
            font-size: 12px;
            font-weight: bold;
            border: 2px solid var(--coffee);
            border-radius: 999px;
            box-shadow: 2px 2px 0 var(--coffee);
        }
        .badge.pending { background: var(--pink); }
        .badge.done    { background: var(--matcha); }

        /* receipt footer */
        footer {
            width: fit-content;
            margin: 0 auto;
            padding: 8px 22px;
            text-align: center;
            font-size: 13px;
            background: var(--cream);
            border: 2px dashed var(--coffee);
            border-radius: 12px;
        }
    </style>
</head>
<body>
<div class="wrap">

    <div class="banner">
        <div class="awning"></div>
        <div class="inner">
            <h1><em>Tasks</em> for Today</h1>
            <small>~ open daily &middot; one small task at a time ~</small>
        </div>
    </div>

    <nav>
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Welcome</a>
        <a href="/tasks" class="{{ request()->is('tasks') ? 'active' : '' }}">Task List</a>
        <a href="/profile" class="{{ request()->is('profile') ? 'active' : '' }}">Profile</a>
        <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a>
    </nav>

    @yield('content')

    <footer>
        thank you, come again! &hearts;<br>
        &copy; Janina Charisse Torre &middot; DC31 &middot; Made with Laravel
    </footer>

</div>
</body>
</html>