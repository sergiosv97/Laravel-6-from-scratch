<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
        <div >
            <h1>My site</h1>

            @can('edit_forum')
                <li>
                    <a href="#">edit forum</a>
                </li> 
            @endcan   
            
            @can ('view_reports')
                <li>
                    <a href="/reports">view reports</a>
                </li> 
            @endcan
        </div>
    </body>
</html>
