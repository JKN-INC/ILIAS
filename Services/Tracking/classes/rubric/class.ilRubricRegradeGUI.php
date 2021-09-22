<?php
/* Copyright (c) 1998-2010 ILIAS open source, Extended GPL, see docs/LICENSE */


/**
 * name table
 *
 * @author Adam MacDonald <adam.macdonald@cpkn.ca>
 * @version $Id$
 *
 * @ingroup Services
 */
class ilLPRubricCardConfirmationGUI
{
    public function __construct(ilTemplate $tpl)
    {
        global $lng,$ilCtrl;
        $this->lng=$lng;
        $this->tpl=$tpl;
        $this->ctrl=$ilCtrl;
    }

    public function confirmRegrade()
    {
        require_once('./Services/Utilities/classes/class.ilConfirmationGUI.php');
        $conf = new ilConfirmationGUI();
        $conf->setFormAction($this->ctrl->getFormAction($this));
        ilUtil::sendQuestion($this->lng->txt('rubric_regrade_warning'));
        $conf->setFormAction($this->ctrl->getFormAction($this));
        $conf->addHiddenItem('user_id',$_POST['user_id']);
        $conf->setConfirm($this->lng->txt('rubric_regrade'), 'regradeUser');
        $conf->setCancel($this->lng->txt('cancel'), 'cancelRegrade');
        $this->tpl->setContent($conf->getHTML());
    }
}

?>
