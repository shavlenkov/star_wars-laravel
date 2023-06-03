<div class="block">
    <nav class="nav">
        <a class="nav__link" href="{{ route('people.index') }}">People</a>
        <a class="nav__link" href="{{ route('planets.index') }}">Planets</a>
        <a class="nav__link" href="{{ route('films.index') }}">Films</a>
        <a class="nav__link" href="{{ route('species.index') }}">Species</a>
        <a class="nav__link" href="{{ route('starships.index') }}">Starships</a>
        <a class="nav__link" href="{{ route('vehicles.index') }}">Vehicles</a>
    </nav>

    <div class="align-right">
        <p class="align-right__text"> @if(Auth::user()->isAdmin() == 1) <i class="fa-solid fa-star"></i> @endif {{ Auth::user()->getFullName() }}</p>
        <a class="align-right__text" href="{{ route('get.signout') }}">Sign Out</a>
    </div>


</div>

<style>

    .block {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }


    .nav {
        display: flex;
        justify-content: center;
        height: 70px;
        align-items: center;
        margin: 0 auto;
    }

    .nav__link {
        color: #3b3b3b;
        text-decoration: none;
        margin-right: 20px;
    }

    .nav__link:not(.active):hover {
        color: #000;
    }

    .active:hover {
        color: #e36e00;
    }

    .active {
        color: #ff8921;
    }

    .align-right {
        display: flex;
    }

    .align-right__text {
        margin-right: 10px;
    }


</style>

<script>
        // Получаем все ссылки в навигационной панели
        var links = document.querySelectorAll('.nav__link');

        // Перебираем ссылки
        links.forEach(function(link) {
            // Проверяем, совпадает ли текущий URL со значением атрибута href ссылки

            if (`${window.location}`.indexOf(link.getAttribute('href')) >= 0 ) {
                // Добавляем класс 'active' к активной ссылке
                link.classList.add('active');
            }
        });

</script>
