@extends('layouts.app')
@section("content")
<button class="m-5 p-3 text-lg bg-green-500 text-white rounded-full p-3 text-center" onclick="location.href='{{ asset('create')}}'">
         Új termék hozzáadása
</button>




    <p class="font-bold text-xl m-5">
        Termékek:
    </p>
    @forelse($termekek as $termek)
       <div class="m-10 p-2 bg-gray-100 rounded-lg w-1/4">
           <table class=>
               <thead class="text-center">
               <td class="w-5/6"></td>
               <td class="w-1/3"></td>
               <td class="w-1/3"></td>
               </thead>

               <tbody>
               <tr>
                   <td class="p-3 m-1/3">
                       <ul class="m-1">
                           <li>
                            <span class=" font-bold">
                                Megnevezés: </span> {{ $termek->megnevezes }}
                           </li>
                           <br>
                           <li>
                            <span class="font-bold">
                                Típus:</span> {{ $termek->tipus }}
                           </li>
                           <br>
                           <li>
                            <span class="font-bold">
                                Ár:</span> {{ $termek->ar }} Ft</li>
                       </ul>
                   </td>
               </tr>
               </tbody>
           </table>

          <div>
              <button class="text-center rounded-lg bg-yellow-300 w-1/3 m-1 py-3" onclick="location.href='/termek/modify/{{$termek->id}}'">
                  Módosítás
              </button>
              <form class="text-center rounded-lg bg-red-500 w-1/3 p-3 m-1" action="termek/delete/{{$termek->id}}" method="POST">
                  @csrf
                  {{method_field('DELETE')}}
                  <button class="w-full" name="id" type="submit" value="{{ $termek -> id }}">
                      Törlés
                  </button>
              </form>
          </div>
       </div>
    @empty
        <div class="font-bold text-2xl text-black text-center p-5">
            <h1>Nem található termék az adatbázisban!</h1>
        </div>
    @endforelse

