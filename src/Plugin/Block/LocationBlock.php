<?php

namespace Drupal\specbee_admin\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Location' Block.
 *
 * @Block(
 *   id = "location_block",
 *   admin_label = @Translation("Location block"),
 *   category = @Translation(""),
 * )
 */
class LocationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
	\Drupal::service('page_cache_kill_switch')->trigger();
	$timeService = \Drupal::service('specbee_admin.time_service');
	$timeData = $timeService->getTime();
	$city = $timeData['city'];
	$country = $timeData['country'];
	$timestamp = $timeData['timestamp'];

    return [
      '#theme' => 'location_block',
      '#city' => $city,
      '#country' => $country,
      '#timestamp' => $timestamp,
    ];
  }

  /**
   * @return int
   */
  public function getCacheMaxAge() {
    return 0;
  }

}