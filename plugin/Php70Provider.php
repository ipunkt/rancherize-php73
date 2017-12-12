<?php namespace RancherizePhp70;

use Rancherize\Blueprint\Infrastructure\Service\Maker\PhpFpm\PhpFpmMaker;
use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;
use RancherizePhp70\PhpVersion\Php72;

/**
 * Class Php70Provider
 * @package RancherizePhp70
 */
class Php70Provider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container[Php72::class] = function() {
			return new Php72();
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