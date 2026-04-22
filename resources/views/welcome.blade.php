<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Product Catalgoue Backend') }}</title>
        <style>
            .mainDiv{
                display: flex;
                justify-content: center;
                align-items: center;
                border: 2px solid black;
                height: 90vh;
                flex-direction: column;
            }
        </style>
    </head>
    
    <body>
        <div class="mainDiv">
            <div>
                <h1>Product Catalogue Management System Backend</h1>
            </div>
            <div>
                <h2>Routes</h2>
                <ul>
                    <li>Products - /api/get-products</li>
                    <li>Product Filters - /api/get-filters</li>
                </ul>
            </div>
        </div>
    </body>
</html>
