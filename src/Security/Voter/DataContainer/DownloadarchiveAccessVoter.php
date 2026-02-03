<?php

namespace Coffeincode\ContaoDownloadarchiveBundle\Security\Voter\DataContainer;

use Coffeincode\ContaoDownloadarchiveBundle\Model\DownloadarchiveModel;

use Contao\CoreBundle\Security\ContaoCorePermissions;
use Contao\CoreBundle\Security\DataContainer\CreateAction;
use Contao\CoreBundle\Security\DataContainer\DeleteAction;
use Contao\CoreBundle\Security\DataContainer\ReadAction;
use Contao\CoreBundle\Security\DataContainer\UpdateAction;
use Contao\CoreBundle\Security\Voter\DataContainer\AbstractDataContainerVoter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;

class DownloadarchiveAccessVoter extends AbstractDataContainerVoter
{
    public function __construct(
        private readonly AccessDecisionManagerInterface $accessDecisionManager
    ) {
    }

    protected function getTable(): string
    {
        return 'tl_downloadarchive';
    }

    protected function hasAccess(TokenInterface $token, UpdateAction|CreateAction|ReadAction|DeleteAction $action): bool
    {
        //var_dump($this);die();
        if (!$this->accessDecisionManager->decide($token, [ContaoCorePermissions::USER_CAN_ACCESS_MODULE], 'downloadarchive')) {
            return false;
        }

        return match (true) {
            $action instanceof CreateAction =>
            $this->accessDecisionManager->decide($token, ['contao_user.downloadarchivep.create']),
            $action instanceof ReadAction,
                $action instanceof UpdateAction =>
            $this->accessDecisionManager->decide($token, ['contao_user.downloadarchives'], $action->getCurrentId()),
            $action instanceof DeleteAction =>
                $this->accessDecisionManager->decide($token, ['contao_user.downloadarchives'], $action->getCurrentId()) &&
                $this->accessDecisionManager->decide($token, ['contao_user.downloadarchivep.delete']),
        };
        // You can also add additional checks/conditions for allowing/disallowing actions here, if your code requires it.
    }
}