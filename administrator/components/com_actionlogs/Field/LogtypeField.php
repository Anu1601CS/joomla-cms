<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_actionlogs
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Joomla\Component\Actionlogs\Administrator\Field;

defined('_JEXEC') or die;

use Joomla\CMS\Application\ApplicationHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Form\Field\CheckboxesField;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\Component\Actionlogs\Administrator\Helper\ActionlogsHelper;

/**
 * Field to load a list of all users that have logged actions
 *
 * @since  3.9.0
 */
class LogtypeField extends CheckboxesField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  3.9.0
	 */
	protected $type = 'LogType';

	/**
	 * Method to get the field options.
	 *
	 * @return  array  The field option objects.
	 *
	 * @since   3.9.0
	 */
	public function getOptions()
	{
		$db    = Factory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName('extension'))
			->from($db->quoteName('#__action_logs_extensions'));

		$extensions = $db->setQuery($query)->loadColumn();

		$options = array();
		$tmp     = array('checked' => true);

		foreach ($extensions as $extension)
		{
			ActionlogsHelper::loadTranslationFiles($extension);
			$option                                                                            = HTMLHelper::_('select.option', $extension, Text::_($extension));
			$options[ApplicationHelper::stringURLSafe(Text::_($extension)) . '_' . $extension] = (object) array_merge($tmp, (array) $option);
		}

		ksort($options);

		return array_merge(parent::getOptions(), array_values($options));
	}
}
