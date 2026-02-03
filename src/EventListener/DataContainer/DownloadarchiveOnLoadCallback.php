<?php

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Contao\BackendUser;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

#[AsCallback(table: 'tl_downloadarchive', target: 'config.onload_callback')]
class DownloadarchiveOnLoadCallback
{
    public function __construct(
        private readonly TokenStorageInterface $tokenStorage,
    ) {
    }

    public function __invoke(DataContainer $dc): void
    {

        $user = $this->tokenStorage->getToken()?->getUser();

        if (!$user instanceof BackendUser || $user->isAdmin) {
            return;
        }

        // Set root IDs
        if (!$user->downloadarchives || !\is_array($user->downloadarchives)) {
            $root = [0];

        } else {
            $root = $user->downloadarchives;

        }

        $GLOBALS['TL_DCA']['tl_downloadarchive']['list']['sorting']['root'] = $root;
    }
}