<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_languagepacks
 *
 * @copyright   Copyright (C) 2020 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var  $this  LanguagepackViewNewpack */

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

HTMLHelper::_('behavior.keepalive');
HTMLHelper::_('behavior.formvalidator');

Factory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(task)
	{
		if (task == 'release.cancel' || document.formvalidator.isValid(document.getElementById('adminForm')))
		{
			Joomla.submitform(task);
		}
	}
");
?>

<div class="languages">
    <h1>
		<?php echo Text::sprintf('COM_LANGUAGE_PACK_NEWPACK_CREATE_RELEASE') ?>
    </h1>
    <form action="<?php echo Route::_('index.php?option=com_languagepack&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
		<?php echo $this->form->renderField('id'); ?>
	    <?php echo $this->form->renderField('release_name'); ?>
        <button type="submit" class="btn btn-primary" onclick="Joomla.submitbutton('release.save')">
            <?php echo Text::_('JSUBMIT'); ?>
        </button>
        <button type="submit" class="btn btn-primary" onclick="Joomla.submitbutton('release.cancel')">
		    <?php echo Text::_('JCANCEL'); ?>
        </button>

        <input type="hidden" name="langId" value="<?php echo $this->langId; ?>" />
        <input type="hidden" name="task" value="" />
	    <?php echo HTMLHelper::_('form.token'); ?>
    </form>
</div>
