<?php

namespace App\Services;

use App\Models\Pokemon;
use Exception;
use GuzzleHttp\Client;

class PokeapiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getPokemonList()
    {
        try {
            $baseUrl = 'https://pokeapi.co/api/v2';
            $endpoint = 'pokemon?limit=1000';

            $response = $this->client->get($baseUrl . '/' . $endpoint);
            $data = $response->getBody()->getContents();
            $result = json_decode($data)->results;

            // Generar listado de todos los pokémones con nombre y URL
            $pokemonList = array_map(function ($item) {
                return new Pokemon($item->name, $item->url);
            }, $result);

            return $pokemonList;
        } catch (Exception $e) {
            return [];
        }
    }

    public function getPokemonData($url)
    {
        try {
            $response = $this->client->get($url);
            $data = $response->getBody()->getContents();
            $result = json_decode($data);

            // Armar array con los resultados de tipos
            $types = array_map(function ($item) {
                return $item->type->name;
            }, $result->types);

            // Armar array con los resultados de habilidades
            $abilities = array_map(function ($item) {
                return $item->ability->name;
            }, $result->abilities);
            
            // Devolver los datos del pokémon solicitado
            return [
                'id' => $result->id,
                'name' => $result->name,
                'frontImage' => $result->sprites->front_default,
                'backImage' => $result->sprites->back_default,
                'types' => $types,
                'height' => $result->height / 10, // La altura viene en decímetros. Se divide por 10 para pasarlo a metros.
                'weight' => $result->weight / 10, // El peso viene en hectogramos. Se divide por 10 para pasarlo a kilogramos.
                'abilities' => $abilities,
            ];
        } catch (\Exception $e) {
            return null;
        }
    }

    public function searchPokemonData($search, $pokemonList, $resultsLimit = 10)
    {
        $searchResults = [];

        // Inyectar los datos en cada uno de los pokémones que coincidan con la búsqueda
        foreach ($pokemonList as $pokemon) {
            if (stristr($pokemon->getName(), $search) !== false) {
                $pokemonData = $this->getPokemonData($pokemon->getUrl());

                $pokemon->setId($pokemonData['id']);
                $pokemon->setFrontImage($pokemonData['frontImage']);
                $pokemon->setBackImage($pokemonData['backImage']);
                $pokemon->setTypes($pokemonData['types']);
                $pokemon->setHeight($pokemonData['height']);
                $pokemon->setWeight($pokemonData['weight']);
                $pokemon->setAbilities($pokemonData['abilities']);

                $searchResults[] = $pokemon;

                if (count($searchResults) == $resultsLimit) {
                    break;
                }
            }
        }

        return $searchResults;
    }
}