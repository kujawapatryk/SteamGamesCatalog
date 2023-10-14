# SteamCatalogGames

## Opis projektu
SteamCatalogGames to serwis prezentujący gry z platformy Steam, korzystający z oficjalnego API STEAM. Użytkownicy mają możliwość przeglądania gier, oceniania ich, dodawania do ulubionych, wyszukiwania po nazwie oraz filtrowania według kategorii. Dodatkowo, użytkownicy mogą tworzyć konta z własnymi avatarami.

[Link do wersji live](TUTAJ_WPISZ_LINK)

## Funkcjonalności
- Przeglądanie gier dostępnych na platformie Steam
- Ocenianie gier
- Dodawanie gier do ulubionych
- Wyszukiwanie gier po nazwie
- Filtrowanie gier według kategorii
- Tworzenie konta użytkownika z avatarem

## Dane testowe
- **Użytkownik**:
  - Login: [login_uzytkownika]
  - Hasło: [haslo_uzytkownika]
  
- **Admin**:
  - Login: [login_admina]
  - Hasło: [haslo_admina]

## Technologie
- PHP Laravel
- MySQL MariaDB
- Blade templates

## Instalacja
1. Sklonuj repozytorium na swój lokalny komputer.
2. Zainstaluj zależności za pomocą komendy `composer install`.
3. Skonfiguruj połączenie z bazą danych w pliku `.env`.
4. Uruchom migracje bazy danych za pomocą komendy `php artisan migrate`.
5. Uruchom serwer deweloperski za pomocą komendy `php artisan serve`.
