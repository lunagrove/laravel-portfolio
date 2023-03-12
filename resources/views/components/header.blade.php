<header>

    <button class="btn-menu p-2 w-full" id="btn-menu">
        <span class="button-content" tabindex="-1">
        <span class="sr-only">Menu</span>
        <span class="bar" id="bar"></span> </span>
    </button>
    <nav id="main-navigation" class="sm:flex sm:flex-row sm:justify-between md:items-center w-full">

        <ul class="left-menu sm:flex sm:w-2/3 text-lime-200 pl-4 items-baseline">
            <li><a href="/" class="text-xl font-bold uppercase">Home</a></li>
            <li><a href="/projects" class="ml-0 sm:ml-3 md:ml-3 lg:ml-3 text-base font-bold uppercase">Projects</a></li>
            <li><a href="/about" class="ml-0 sm:ml-3 md:ml-3 lg:ml-3 text-base font-bold uppercase">About</a></li>
        </ul>
        <ul class="right-menu sm:flex sm:justify-end sm:w-1/3 sm:text-indigo-600 text-lime-200 pr-4 items-baseline">
            @auth
                <li><span class="hidden lg:block text-base font-bold"> {{ auth()->user()->name }} </span></li>

                <div class="tooltip">
                    <span class="hidden lg:hidden sm:block pt-1 h-6 w-6"><img class="user-icon img-no-outline" src="/images/logged-in-user.png" alt="Logged in user"></span>
                    <span class="tooltip-text">{{ auth()->user()->name }}</span>
                </div>
                
                @if (auth()->user()->isAdmin())
                    <li><a href="/admin" class="ml-4 text-s font-bold uppercase">Admin</a></li>
                @endif
                <li><a href="/logout" class="ml-4 md:ml-3 lg:ml-3 text-base font-bold uppercase">Logout</a></li>
            @else
                <li><a href="/login" class="ml-4 md:ml-3 lg:ml-3 text-base font-bold uppercase">Log In</a></li>
            @endauth
        </ul>

    </nav>
    
</header>
<script>
    const body = document.body;
    const btnMenu = document.getElementById('btn-menu');
    const nav = document.getElementById('main-navigation');
    const tooltip = document.querySelector(".tooltip .tooltip-text");

    btnMenu.addEventListener('click', openMenu);

    btnMenu.addEventListener('mousedown', function(e){
        e.preventDefault();
    });

    function openMenu(){
        body.classList.toggle('show');
        nav.classList.add('activated');
    }

    function removeTransition(e){
        if(e.matches){
            body.classList.remove('show');
            nav.classList.remove('activated');
        }
    }

    document.querySelector(".user-icon").addEventListener("click", function() {
        tooltip.style.opacity = "1";
        setTimeout(function() {
            tooltip.style.opacity = "0";
        }, 3000);
    });
</script>