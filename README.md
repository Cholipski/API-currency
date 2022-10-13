<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# <center>Innovation Software</center>
### <center>Zadanie rekrutacyjne</center>

## Instalacja

1) Skopiować plik ``.env.example``  oraz usunąć `.example`
2) Zainstalować paczki composer ``composer install``
3) Wygenerować klucz aplikacji poleceniem ``php artisan key:generate``
4) Uruchomić kontener Docker poleceniem ``./vendor/bin/sail up``
5) Wejść do kontenera aplikacji poleceniem ``Docker exec -it {id} bash``
6) Uruchomić polecenie ``php artisan migrate``
7) Uruchomić customowe polecenie artisan do pobrania i uzupełnienia danych dotyczących aktualnego kursu ``php artisan UpdateOrCreateCurrency``


## Wymagania
 - Docker
 - Docker compose
