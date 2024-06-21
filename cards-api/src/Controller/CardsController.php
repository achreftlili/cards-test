<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CardsController extends AbstractController
{
    const CARDS_CONF = [
        "color" => ['Carreaux', 'Cœur', 'Pique', 'Trèfle'],
        "number" => [1 => 'AS', 2 => '2', 3 => '3', 4 => '4', 5 => '5', 6 => '6', 7 => '7', 8 => '8', 9 => '9', 10 => '10', 11 => 'Valet', 12 => 'Dame', 13 => 'Roi'],
    ];

    #[Route(path: '/sort-cards', name: 'sort_cards', methods: ['POST'])]
    public function sortCards(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['cards']) || !is_array($data['cards'])) {
            return $this->json(['error' => 'Invalid data'], Response::HTTP_BAD_REQUEST);
        }

        $colorOrder = ['Carreaux', 'Cœur', 'Pique', 'Trèfle'];

        usort($data['cards'], function($a, $b) use ($colorOrder) {
            $colorPositionA = array_search($a['color'], $colorOrder);
            $colorPositionB = array_search($b['color'], $colorOrder);

            if ($colorPositionA === $colorPositionB) {
                return $a['number'] <=> $b['number'];
            }

            return $colorPositionA <=> $colorPositionB;
        });

        return $this->json($data['cards']);
    }
    #[Route(path: '/cards', name: 'cards_get')]
    public function getCards(): JsonResponse
    {
        $deck = $this->generateDeck();
        shuffle($deck);
        $randomCards = array_slice($deck, 0, 10);

        return new JsonResponse($randomCards);
    }

    private function generateDeck(): array
    {
        $deck = [];
        foreach (self::CARDS_CONF['color'] as $color) {
            foreach (self::CARDS_CONF['number'] as $number => $name) {
                $deck[] = [
                    'color' => $color,
                    'number' => $number,
                    'name' => $name,
                ];
            }
        }

        return $deck;
    }
}
