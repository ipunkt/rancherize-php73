<?php namespace RancherizePhp72;

use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\AlpineDebugImageBuilder;
use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\PhpFpmMaker;
use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;
use RancherizePhp72\PhpVersion\Php73;

/**
 * Class Php70Provider
 * @package RancherizePhp70
 */
class Php73Provider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container[Php73::class] = function($c) {
			return new Php73( $c[AlpineDebugImageBuilder::class] );
		};
	}

	/**
	 */
	public function boot() {
		/**
		 * @var PhpFpmMaker $fpmMaker
		 */
		$fpmMaker = $this->container[PhpFpmMaker::class];

		$fpmMaker->addVersion( $this->container[Php73::class] );
	}
}