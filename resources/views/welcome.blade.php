@extends('layouts.app')

@section('before-main')

<welcome-header></welcome-header>

@endsection

@section('content')

<div class="container mx-auto">
    <div class="flex mt-4 flex-col md:flex-row justify-center items-center">
        <app-card header="Heroic Deploys" class="md:w-1/3 mb-2">
            Deploy from GitHub to a Digital Ocean server effortlessly. Our service monitors pushes to a branch on your Git repository and painlessly deploys your code to the server and runs a set of scripts that you can customize. Easily integrate our app with an existing server or provision servers through our app that are optimized for your success.
        </app-card>

        <app-card header="Heroic Deploys" class="md:w-1/3 md:mx-2 mb-2">
            Deploy from GitHub to a Digital Ocean server effortlessly. Our service monitors pushes to a branch on your Git repository and painlessly deploys your code to the server and runs a set of scripts that you can customize. Easily integrate our app with an existing server or provision servers through our app that are optimized for your success.
        </app-card>

        <app-card header="Heroic Deploys" class="md:w-1/3 mb-2">
            Deploy from GitHub to a Digital Ocean server effortlessly. Our service monitors pushes to a branch on your Git repository and painlessly deploys your code to the server and runs a set of scripts that you can customize. Easily integrate our app with an existing server or provision servers through our app that are optimized for your success.
        </app-card>
    </div>
</div>

@endsection
