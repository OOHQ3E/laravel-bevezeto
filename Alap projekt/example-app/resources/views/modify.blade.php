@extends("layouts.app")
@section("content")

    <div class="text-center w-1/3 m-10">
        <form action="/termek/modify/{{$termek->id}}" method="POST" class="m-auto px-10 py-5 bg-gray-100 rounded-lg form-input">
            @csrf
            <div class="text-left w-11/12 m-auto">
                <label for="megnevezes" class="my-6 font-semibold text-left">Termék megnevezése:</label>
                <input type="text" value="{{$termek->megnevezes}}" class="my-5 w-full text-xl rounded-md" name="megnevezes" required>
            </div>
            <div class="text-left w-11/12 m-auto">
                <label for="tipus" class="my-6 font-semibold text-left">Termék típusa:</label>
                <input type="text" value="{{$termek->tipus}}" class="my-5 w-full text-xl rounded-md" name="tipus" required>
            </div>
            <div class="text-left w-11/12 m-auto">
                <label for="ar" class="my-6 font-semibold text-left">Termék ára:</label>
                <input type="number" value="{{$termek->ar}}" class="my-5 w-full text-xl rounded-md" name="ar" required>
            </div>

            <div class="text-gray-50 flex flex-wrap justify-center gap-2">
                <button type="submit" class="bg-green-500 rounded-full w-1/4 text-center p-3 my-2">
                    <span>Termék módosítása</span>
                </button>

                <button type="reset" class="bg-orange-500 rounded-full w-1/4 text-center p-3 my-2">
                    <span>Adatok törlése</span>
                </button>

                <button onclick="location.href='{{ asset('/') }}'" type="button" class="bg-red-500 w-1/4 rounded-full text-center p-3 my-2">
                    <span>Mégsem</span>
                </button>
            </div>

        </form>

    </div>
