<?php

namespace App\Http\Controllers;

use App\Services\PokeapiService;

class IndexController extends Controller
{
    public $pokemonList;

    public function __construct(PokeapiService $pokeapiService)
    {
        // Buscar listado completo de Pokémones en pokeapi.co
        $this->pokemonList = $pokeapiService->getPokemonList();
    }

    public function index(PokeapiService $pokeapiService, $search = null, $resultsLimit = 10)
    {
        // Cargar resultados si se está ejecutando una búsqueda
        // Sino mostrar el formulario en blanco
        $searchResults = empty($search) ? [] : $pokeapiService->searchPokemonData($search, $this->pokemonList, $resultsLimit);

        return view('index', ['search' => $search, 'searchResults' => $searchResults]);
    }

    public function search(PokeapiService $pokeapiService, $search, $resultsLimit = 10)
    {
        // Cargar resultados de la búsqueda
        $searchResults = $pokeapiService->searchPokemonData($search, $this->pokemonList, $resultsLimit);

        return view('includes.cards', ['search' => $search, 'searchResults' => $searchResults]);
    }
}
