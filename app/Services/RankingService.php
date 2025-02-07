<?php

namespace App\Services;

class RankingService
{
  public static function getRanking($movement)
  {
    $ranking = $movement->personalRecord
      ->groupBy('user_id')
      ->map(fn($records) => $records->sortByDesc('value')->first())
      ->sortByDesc('value')
      ->values();

    $ranking = $ranking->map(function ($record, $index) {
      return [
        'user'     => $record->user->name,
        'value'    => $record->value,
        'date'     => $record->date,
        'position' => $index + 1,
      ];
    });

    $rankingArray = $ranking->toArray();

    $lastPosition = null;
    foreach ($rankingArray as $index => &$record) {
      if (($index + 1) > 1) {
        if ($record['value'] === $rankingArray[$index - 1]['value']) {
          $record['position'] = $rankingArray[$index - 1]['position'];
          $lastPosition = $record['position'];
        } else {
          $record['position'] = $lastPosition !== null ? $index : $index + 1;
        }
      }
    }

    return [ $movement->name =>  collect($rankingArray)];
  }
  public static function getAllMovementsRanking($movements)
  {
    return $movements->mapWithKeys(function ($movement) {
      $ranking = self::getRanking($movement);

      return $ranking;
    });
  }
}
