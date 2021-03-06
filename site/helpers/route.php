<?php

/**
 * @package     Firedrive
 * @author      Giovanni Mansillo
 * @license     GNU General Public License version 2 or later; see LICENSE.md
 * @copyright   Firedrive
 */
defined('_JEXEC') or die;

/**
 * Firedrive Component Route Helper
 *
 * @static
 * @since   5.2.1
 */
abstract class FiredriveHelperRoute
{

	/**
	 * Get the URL route for a docment from a document ID, document category ID and language
	 *
	 * @param   integer $id       The id of the document
	 * @param   integer $catid    The id of the document's category
	 * @param   mixed   $language The id of the language being used.
	 *
	 * @return  string  The link to the document
	 *
	 * @since   1.5
	 */
	public static function getDocumentRoute($id, $catid, $language = 0)
	{
		// Create the link
		$link = 'index.php?option=com_firedrive&view=document&id=' . $id;

		if ($catid > 1)
		{
			$link .= '&catid=' . $catid;
		}

		if ($language && $language !== '*' && JLanguageMultilang::isEnabled())
		{
			$link .= '&lang=' . $language;
		}

		return $link;
	}

	/**
	 * Get the URL route for a document category from a document category ID and language
	 *
	 * @param   mixed $catid    The id of the document's category either an integer id or an instance of JCategoryNode
	 * @param   mixed $language The id of the language being used.
	 *
	 * @return  string  The link to the document
	 * @since   5.2.1
	 */
	public static function getCategoryRoute($catid, $language = 0)
	{
		if ($catid instanceof JCategoryNode)
		{
			$id = $catid->id;
		}
		else
		{
			$id = (int) $catid;
		}

		if ($id < 1)
		{
			$link = '';
		}
		else
		{
			// Create the link
			$link = 'index.php?option=com_firedrive&view=category&id=' . $id;

			if ($language && $language !== '*' && JLanguageMultilang::isEnabled())
			{
				$link .= '&lang=' . $language;
			}
		}

		return $link;
	}

}
