<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_wrapper
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('script', 'com_wrapper/iframe-height.min.js', array('version' => 'auto', 'relative' => true));

?>
<div class="com-wrapper contentpane">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1>
				<?php if ($this->escape($this->params->get('page_heading'))) : ?>
					<?php echo $this->escape($this->params->get('page_heading')); ?>
				<?php else : ?>
					<?php echo $this->escape($this->params->get('page_title')); ?>
				<?php endif; ?>
			</h1>
		</div>
	<?php endif; ?>
	<iframe <?php echo $this->wrapper->load; ?>
		id="blockrandom"
		name="iframe"
		src="<?php echo $this->escape($this->wrapper->url); ?>"
		width="<?php echo $this->escape($this->params->get('width')); ?>"
		height="<?php echo $this->escape($this->params->get('height')); ?>"
		scrolling="<?php echo $this->escape($this->params->get('scrolling')); ?>"
		frameborder="<?php echo $this->escape($this->params->get('frameborder', 1)); ?>"
		<?php if ($this->escape($this->params->get('page_heading'))) : ?>
			title="<?php echo $this->escape($this->params->get('page_heading')); ?>"
		<?php else : ?>
			title="<?php echo $this->escape($this->params->get('page_title')); ?>"
		<?php endif; ?>
		class="com-wrapper__iframe wrapper <?php echo $this->pageclass_sfx; ?>">
		<?php echo Text::_('COM_WRAPPER_NO_IFRAMES'); ?>
	</iframe>
</div>
