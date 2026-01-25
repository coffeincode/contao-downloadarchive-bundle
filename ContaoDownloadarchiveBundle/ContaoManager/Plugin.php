<?php


namespace Coffeincode\ContaoDownloadarchiveBundle\ContaoManager;

use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Contao\CoreBundle\ContaoCoreBundle;
use Coffeincode\ContaoDownloadarchiveBundle\ContaoDownloadarchiveBundle;

class Plugin implements BundlePluginInterface {
	public function getBundles(ParserInterface $parser) : array{
		return [
			BundleConfig::create(ContaoDownloadarchiveBundle::class)->setLoadAfter([ContaoCoreBundle::class]),
		];
	}

}
