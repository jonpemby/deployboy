<nav class="site-header bg-white border-0 border-b border-grey-lighter">
    <div class="container h-full mx-auto flex justify-between items-center">
        <div class="h-12 flex items-center">
            <a class="inline-block no-underline uppercase font-bold text-grey-dark" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

            <app-navigation
                :links="{{ collect([
                    ['About', '/about'],
                    ['Settings', '/settings', [
                        ['Profile', '#'],
                        ['Help', '#'],
                    ]],
                ])->toJson() }}">
            </app-navigation>
        </div>


    </div>
</nav>
