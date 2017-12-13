<?php namespace RancherizePhp72;

use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\AlpineDebugImageBuilder;
use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\PhpFpmMaker;
use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;
use RancherizePhp72\PhpVersion\Php72;

/**
 * Class Php70Provider
 * @package RancherizePhp70
 */
class Php72Provider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container[Php72::class] = function($c) {
			return new Php72( $c[AlpineDebugImageBuilder::class] );
		};
	}

	/**
	 */
	public function boot() {
		/**
		 * @var PhpFpmMaker $fpmMaker
		 */
		$fpmMaker = $this->container[PhpFpmMaker::class];

		$fpmMaker->addVersion( $this->container[Php72::class] );
	}
}