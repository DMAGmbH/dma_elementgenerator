<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');
/**
 * TYPOlight webCMS
 * Extension DMA Elementgenerator
 * Copyright Dialog- und Medienagentur der ACS mbH  (2010)
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  DMA GmbH
 * @author     Carsten Kollmeier
 * @author     Janosch Skuplik <skuplik@dma.do>
 * @package    DMAElementGenerator
 * @license    LGPL
 * @filesource
 */


$GLOBALS['TL_DCA']['tl_dma_eg'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => false,
		'onsubmit_callback'	=> array
		(		
			array('DMAElementGeneratorCallbacks','element_onsubmit')
		),
		'ondelete_callback'	=> array
		(
			array('DMAElementGeneratorCallbacks','element_ondelete')
		),
		'ctable' => array('tl_dma_eg_fields'),
		'switchToEdit' => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
            'label_callback'          => array('tl_dma_eg', 'listFormFields')
		),

		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['edit'],
				'href'                => 'table=tl_dma_eg_fields',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'attributes'          => 'class="edit-header"'
			),			
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['tl_dma_eg']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
            'toggle' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_content']['toggle'],
                'icon'                => 'visible.gif',
                'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
                'button_callback'     => array('tl_dma_eg', 'toggleIcon')
            ),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_dma_eg']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(),
		'default'                     => '{title_legend},title,category;{settings_legend},template,content,module;{expert_legend:hide},without_label,display_in_divs,class',
	),

	// Subpalettes
	'subpalettes' => array
	(		
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'						=> &$GLOBALS['TL_LANG']['tl_dma_eg']['title'],
			'inputType'					=> 'text',
			'exclude'					=> true,
			'filter'						=> true,
			'eval'						=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'category' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg']['category'],
			'inputType'             => 'text',
			'exclude'				=> true,
			'filter'				=> true,
			'eval'                  => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'template' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['template'],
			'default'                 => 'dma_eg_default',
			'exclude'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_dma_eg','getElementTemplates'),
			'eval'                    => array('tl_class'=>'w50')
		),
		'module' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['module'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		),
		'content' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['content'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr w50','isBoolean'=> true)
		),
		'class' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_dma_eg']['class'],
			'inputType'             => 'text',
			'exclude'					=> true,
			'filter'						=> true,
			'eval'                  => array('tl_class'=>'w50','maxlength'=>255, 'tl_class'=>'clr')
		),
		'without_label' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['without_label'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		),
  		'display_in_divs' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_dma_eg']['display_in_divs'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50','isBoolean'=> true)
		)
	)
);



/**
 * Class tl_dma_eg
 *
 */
class tl_dma_eg extends Backend
{


    /**
     * returns the list output
     * @param array
     * @return string
     */
    public function listFormFields($arrRow)
    {
        return '<div class="cte_type ' . ($arrRow['invisible'] ? 'unpublished' : 'published') . '">'
            . ($arrRow['content'] ? ' ' . $GLOBALS['TL_LANG']['tl_dma_eg']['labelContentelement'] . ' [' . $arrRow['category'] . ']' : '')
            . ($arrRow['module'] ? ' ' . $GLOBALS['TL_LANG']['tl_dma_eg']['labelFrontendmodule'] . ' [' . $arrRow['category'] . ']' : '')
            . '</div>'."\n"
            . '<div class="block">'
            . '<strong>' . $arrRow['title'] . '</strong>' ."\n"
            . '</div>' . "\n";
    }

    /**
     * Return the "toggle visibility" button
     * @param array
     * @param string
     * @param string
     * @param string
     * @param string
     * @param string
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (strlen($this->Input->get('tid')))
        {
            $this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        //if (!$this->User->isAdmin && !$this->User->hasAccess('tl_content::invisible', 'alexf'))
        //{
        //    return '';
        //}

        $href .= '&amp;id='.$this->Input->get('id').'&amp;tid='.$row['id'].'&amp;state='.$row['invisible'];

        if ($row['invisible'])
        {
            $icon = 'invisible.gif';
        }

        return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
    }


    /**
     * Toggle the visibility of an element
     * @param integer
     * @param boolean
     */
    public function toggleVisibility($intId, $blnVisible)
    {
        // Check permissions to edit
        $this->Input->setGet('id', $intId);
        $this->Input->setGet('act', 'toggle');

        // The onload_callbacks vary depending on the dynamic parent table (see #4894)
        //if (is_array($GLOBALS['TL_DCA']['tl_content']['config']['onload_callback']))
        //{
        //    foreach ($GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'] as $callback)
        //    {
        //        if (is_array($callback))
        //        {
        //            $this->import($callback[0]);
        //            $this->$callback[0]->$callback[1]($this);
        //        }
        //    }
        //}

        // Check permissions to publish
        //if (!$this->User->isAdmin && !$this->User->hasAccess('tl_content::invisible', 'alexf'))
        //{
        //    $this->log('Not enough permissions to show/hide content element ID "'.$intId.'"', 'tl_content toggleVisibility', TL_ERROR);
        //    $this->redirect('contao/main.php?act=error');
        //}

        $objVersions = new Versions('tl_dma_eg', $intId);
        $objVersions->initialize();


        // Update the database
        $this->Database->prepare("UPDATE tl_dma_eg SET tstamp=". time() .", invisible='" . ($blnVisible ? '' : 1) . "' WHERE id=?")
                       ->execute($intId);

        $objVersions->create();
        $this->log('A new version of record "tl_dma_eg.id='.$intId.'" has been created'.$this->getParentEntries('tl_dma_eg', $intId), 'tl_dma_eg toggleVisibility()', TL_GENERAL);

        // Trigger the onsubmit_callback
        if (is_array($GLOBALS['TL_DCA']['tl_dma_eg']['config']['onsubmit_callback']))
        {
           foreach ($GLOBALS['TL_DCA']['tl_dma_eg']['config']['onsubmit_callback'] as $callback)
            {
                $this->import($callback[0]);
                $this->$callback[0]->$callback[1]($this);
            }
        }

    }

	/**
	 * Return all dma_eg templates as array
	 * @param object
	 * @return array
	 */
	public function getElementTemplates(DataContainer $dc)
	{
		if (version_compare(VERSION.BUILD, '3.0.0','>='))
		{
			return $this->getTemplateGroup('dma_eg_');
		}

		if(version_compare(VERSION.BUILD, '2.9.0','>='))
		{
			$arrTemplates = array();
			$strPrefix = 'dma_eg_';
			
			// get the standard-template routine
			$arrControllerTemplates = $this->getTemplateGroup($strPrefix);
			foreach ($arrControllerTemplates as $value)
			{
				$arrTemplates[$value] = $value;
			}
			
			// found other theme-templates
			$objTheme = $this->Database->prepare("SELECT templates FROM tl_theme WHERE templates!=?")
									   ->execute('');

			if ($objTheme->numRows > 0)
			{
				while ($objTheme->next())
				{

					$strFolder = TL_ROOT .'/'. $objTheme->templates;
					
					// Find all matching templates
					$arrFiles = preg_grep('/^' . preg_quote($strPrefix, '/') . '/i',  scan($strFolder));
					$arrThemeTemplates = array();
					foreach ($arrFiles as $strTemplate)
					{
						$strName = basename($strTemplate);
						$arrThemeTemplates[] = substr($strName, 0, strrpos($strName, '.'));
					}
					

					natcasesort($arrThemeTemplates);
					$arrThemeTemplates = array_unique($arrThemeTemplates);

					foreach ($arrThemeTemplates as $value)
					{
						$arrTemplates[$value] = str_replace('templates/','',$objTheme->templates) . '/' . $value;
					}
				}
			}
	   	return $arrTemplates;
		}
		else 
		{
			return $this->getTemplateGroup('dma_eg_');
		}	
	}
	
}

?>
