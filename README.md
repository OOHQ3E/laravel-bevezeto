# Laravel telepítése és bevezető

## 1. Laravel használatához szükséges telepítendő elemek

* Composer: <https://getcomposer.org/download/>
* XAMPP (Ezzel letöltődik a php, és a mysql is): <https://www.apachefriends.org/download.html>
* Node.JS: <https://nodejs.org/en/download/current>
  
## 2. Laravel projekt létrehozása

* Nyissunk meg egy terminált egy helyen, ahol létre szeretnénk hozni a projektet.
* Írjuk be az alábbit, hogy létre hozzuk a projektet: ```composer create-project laravel/laravel projekt-neve```, ahol a "projekt-neve" szabadon megadható annak, aminek el szeretnénk nevezni a projektünket.
* Lépjünk be a projekt mappájába a terminálban: ``` cd .\projekt-neve\```
* Beírjuk a következőket:
  * ```npm install```
  * ```php artisan key:generate```

### 2.1 Adatbázis létrehozása

* Nyissuk meg a XAMPP-ot
* Nyissuk meg a Shell-t, jelentkezzünk be (```mysql -u root```, enter)
* ```CREATE DATABASE adatbazis-neve;``` - Annak nevezzük el az adatbázisunkat, aminek szeretnénk, csak meg kell jegyezni a későbbi teendőkhök.

### 2.2 .env

A projekt működéséhez az egyik legszükségesebb dolog a .env fájl, amiben megadhatjuk a projekthez szükséges adatbázis nevét is. Ha nem található egy projektben a .env fájl, akkor a létező .env.example fájlt **másoljuk, majd nevezzük el** azt .env-nek. ***(Ne azt csináljuk, hogy a ".env.example" fájlt nevezzük át ".env"-re, mert amikor felpush-olunk majd a repo-ra, a ".env.example" fájl "törlődni" fog a repo-ról)***

A .env fájlban található egy olyan sor, ami úgy néz ki, hogy "DB_DATABASE=laravel", a "laravel"-t nevezzük át annak, amilyen névvel létre hoztuk az adatbázisunkat.
Itt pedig beállíthatjuk az adatbázishoz a felhasználó nevet és a jelszót (hogy ha van), ha nincs akkor az alap Username:"root" és jelszavat: ""-t adjuk meg

```txt
DB_USERNAME=root
DB_PASSWORD=
```

### 2.3 Tailwind CSS

A Tailwind CSS egy népszerű CSS keretrendszer, amely előre definiált osztályokat biztosít a webalkalmazások stílusának egyszerűsítéséhez és optimalizálásához. Ezek olyan osztályok formájában vannak meghatározva, amik leírják a kívánt vizuális hatást, ahelyett, hogy egyedi CSS stílusokat írnának az egyes elemekre. Például egy bekezdéshez így tudjuk azt megadni azt, hogy a szövege jobbra zárt és félkövér legyen:

```html
<p class="text-right font-bold"> ez egy bekezdés </p>
```

A Tailwind stílus alkalmazása lehetővé teszi a fejlesztők számára a gyors, összehangolt és egységes felület létrehozását, miközben javítja a kinézet gyors alakíthatóságát és skálázhatóságát, azonban ezzel rontva a HTML fájl átláthatóságát. Széles választékban kínál előre elkészített osztályokat a közös UI komponensekhez egy konfigurációs fájlban, mint például gombok, űrlapok, grid rendszerek és tipográfiák, valamint a bonyolultabb elrendezésekhez és pozicionálási feladatokhoz is. Ezzel a konfigurációs fájlal biztosítja a fejlesztőknek, hogy a beépített osztályokat testre szabhassák és, hogy saját egyedi osztályokat is létre hozhassanak.

#### 2.3.1 Tailwind CSS telepítése

* Terminálban megnyitjuk a projektet, és az alábbit írjuk be: ```npm install -D tailwindcss postcss autoprefixer```, és utána pedig azt, hogy ```npx tailwindcss init -p```
* Megnyitjuk a ```./tailwind.config.js``` fájlt, majd annak a ```content []```-részén belülre beillesztjük ezt:
  
 ```js
  "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
```

 Így a fájl tartalma hasonlóan fog kinézni:

```js
/** @type {import('tailwindcss').Config} */
export default {
  content: [
  "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
	],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

* Megnyitjuk a ```./resources/css/app.css``` fájlt, majd az alábbiakat írjuk be:

```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

Terminálon belül megnyitjuk a projektet (ha még nincs), és beírjuk az alábbit: ```npm run dev```, egy másik terminálon megnyitjuk szintén a projektet, és beírjuk az alábbit, hogy host-oljuk az alkalmazást: ```php artisan serve``` (Ezeket mindig le kell futtani, amikor elkezdjük a feljesztést, hogy lássuk, hogy mit is készítettünk eddig.)

#### 2.3.2 Tailwind CSS használata

* A ```./resources/views/``` mappán belül létre hozhatunk egy "layouts" nevű mappát, amiben létrehozunk egy új fájlt "app.blade.php" néven.
* Ezen a fájlon belül definiálhatunk olyan dolgokat, amiket felhasználhat az összes nézetünk, legyen ez háttérszín, navbar stb.., de itt megadhatjuk szintén azt, hogy a TailwindCSS-t használja az összes oldalunk
  
A ```./resources/views/layouts/app.blade.php``` fájlba beírhatjuk az alábbit:

```php
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="text-center hover:bg-gray-600 hover:cursor-pointer hover:text-gray-300 bg-gray-500 bg-opacity-75 shadow-2xl p-4 rounded-lg m-auto lg:w-10/12 md:w-10/12 w-full my-5">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <span class="italic">
            Ez a app.blade.php-ból származik
        </span>
    </div>
    
    @yield('content')
</body>
</html>

```

A ```./resources/views/```-on belül a ```welcome.blade.php``` tartalmát kitöröljük, és ha az alábbit beírjuk
```php
@extends('layouts.app')

<div class="hover:bg-gray-600 hover:cursor-pointer hover:text-gray-300 bg-gray-500 bg-opacity-75 shadow-2xl p-4 rounded-lg m-auto lg:w-10/12 md:w-10/12 w-full my-5">
    <p class="text-3xl text-center font-bold underline">
        Ez a welcome.blade.php fájlból származik
    </p>
</div>
```
Ha minden sikerül, akkor az oldalunk az alábbiak szerint fog kinézni:

![Kinézet](https://github.com/OOHQ3E/laravel-bevezeto/blob/main/kinezet.bmp)

Dokumentációt ahhoz, hogy hogyan lehet használni a TailwindCSS-t, és a kinézeteket hogyan használhatjuk, az alábbi oldalon megtalálhatóak: <https://tailwindcss.com/docs/>

#### Fontos tudni valók, amikor githubról letöltjuk a projektet

Amikor githubról letöltitek a projektet akkor az alábbiakat kell tenni, hogy működjön is a projekt:

* Először is a ".env.example" fájlt **kimásoljátok és átnevezitek** ".env"-re. ***(Ne azt csináljuk, hogy a ".env.example" fájlt nevezzük át ".env"-re, mert amikor felpush-olunk majd a repo-ra, a ".env.example" fájl "törlődni" fog a repo-ról)***
* Terminálban megnyitjuk a projektet, és az alábbiakat beírjuk sorrendben:

```BASH
composer install

npm install

php artisan key:generate

(hogy ha pedig már vannak adatbázisban dolgok, amiket létre hoztatok, akkor:)

php artisan migrate
```

## Legfőbbképpen megjegyezendő, hogy nem kell sql fájlokat dobálgatni egymásnak, mert a laravelnek a migration pont ezért van
