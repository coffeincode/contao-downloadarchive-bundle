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
        if (! (Input::get('act') == 'create' || Input::get('act') == 'copy' )) {
            return;
        }


        $user = BackendUser::getInstance();
        //no checks for admins
        if ($user->isAdmin) {
            return;
        }
        //make sure the user has permission to create archives

        if (!in_array('create', StringUtil::deserialize($user->downloadarchivep, true))){

            return;
        }

        $ids = StringUtil::deserialize($user->downloadarchives, true);
        $ids[] = (string) $id;
        $ids = array_values(array_unique($ids));

        if ($user->inherit === 'group') {
            foreach ((array) $user->groups as $groupId) {
                $group = $this->db->fetchAssociative('SELECT downloadarchives, downloadarchivep FROM tl_user_group WHERE id=?', [$groupId]);

                if (!$group) {
                    continue;
                }

                $groupPermissions = StringUtil::deserialize($group['downloadarchivep'] ?? null, true);
                if (!\in_array('create', $groupPermissions, true)) {
                    continue;
                }

                $groupIds = StringUtil::deserialize($group['downloadarchives'] ?? null, true);
                $groupIds[] = (string) $id;
                $groupIds = array_values(array_unique($groupIds));

                $this->db->update('tl_user_group', ['downloadarchives' => serialize($groupIds)], ['id' => $groupId]);
            }
        } else {
            $this->db->update('tl_user', ['downloadarchives' => serialize($ids)], ['id' => $user->id]);
        }

        // keep session in sync
        $user->downloadarchives = $ids;
        

    }
    public function copy(int $id, DataContainer $dc): void {

        $this->__invoke('tl_downloadarchive', $id, [], $dc);
    }
}
