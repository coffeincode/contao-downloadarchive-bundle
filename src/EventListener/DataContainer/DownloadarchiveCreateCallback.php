<?php
declare(strict_types=1);

namespace Coffeincode\ContaoDownloadarchiveBundle\EventListener\DataContainer;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveitemModel;
use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;
use Contao\BackendUser;
use Contao\CoreBundle\Monolog\ContaoContext;
use Contao\DataContainer;
use Contao\FilesModel;
use Contao\Model\Collection;
use Contao\StringUtil;
use Contao\Input;
use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;
use Contao\Folder;

class DownloadarchiveCreateCallback
{

    private $db;
    //this is dependency-injected
    private LoggerInterface $logger;


    public function __construct(Connection $db, LoggerInterface $logger)
    {
        $this->db = $db;
        $this->logger = $logger;

    }

    public function __invoke(string $table, int $id, array $row, DataContainer $dc): void
    {
        if (Input::get('act') !== 'create') {
            return;
        }


        $user = BackendUser::getInstance();
        //var_dump($user);
        //die();
        if ($user->isAdmin) {
            return;
        }

        $ids = StringUtil::deserialize($user->downloadarchives, true);
        $ids[] = (int) $id;
        $ids = array_values(array_unique($ids));

        $this->db->update('tl_user', ['downloadarchives'=>serialize($ids)],['id'=>$user->id]);


        // keep session in sync
        $user->downloadarchives = $ids;
    }
}