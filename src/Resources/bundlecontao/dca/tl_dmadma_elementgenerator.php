<?php
/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
**/

$GLOBALS['TL_DCA']['tl_dmadma_elementgenerator'] = [
    // Config
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
	    'onload_callback' => [
	        ['tl_dmadma_elementgenerator', 'myLoadCallback']
	    ],
	    'onsubmit_callback' => [
	        ['tl_dmadma_elementgenerator', 'mySaveCallback']
	    ]
    ],

    // List
    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['id'],
            'flag' => 12,
            'panelLayout' => 'sort,filter,search,limit'
        ],
        'label' => [
            'fields' => ['id'],
            'format' => '%s',
            'showColumns' => true
        ],
        'global_operations' => [
            'all' => [
                'label ' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            ]
        ],
        'operations' => [
            'edit' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['edit'],
                'href' => 'act=edit',
                'icon' => 'edit.gif'
            ],
            'copy' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['copy'],
                'href' => 'act=copy',
                'icon' => 'copy.gif'
            ],
            'delete' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['delete'],
                'href' => 'act=delete',
                'icon' => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] .
                    '\'))return false;Backend.getScrollOffset()"'
            ],
            'show' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['show'],
                'href' => 'act=show',
                'icon' => 'show.gif'
            ]
        ]
    ],

    // Palettes
    'palettes' => [
        'default' => '{data_legend},title;'
    ],

    // Subpalettes
    'subpalettes' => [
        'trigger' => 'subpalettesfield1,subpalettesfield2'
    ],

    // Fields
    'fields' => [
        'id' => [
            'sql' => "int(10) unsigned NOT NULL auto_increment"
        ],
        'sorting' => [
            'label' => &$GLOBALS['TL_LANG']['MSC']['sorting'],
            'sorting' => true,
            'flag' => 11,
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'"
        ],
        'published' => [
            'sql' => "char(1) NOT NULL default '0'"
        ],
        'title' => [
            'label' => &$GLOBALS['TL_LANG']['tl_dmadma_elementgenerator']['title'],
            'exclude' => true,
            'search' => true,
            'sorting' => true,
            'flag' => 1,
            'inputType' => 'text',
            'eval' => [
                'mandatory' => true,
                'maxlength' => 100,
                'tl_class' => 'long'
            ],
            'sql' => "varchar(100) NOT NULL default ''"
        ]
    ]
];

// use  Dma\Model\Dmadma_elementgeneratorModel;

class tl_dmadma_elementgenerator extends \Backend
{
    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->import('BackendUser', 'User');
    }


    public function myLoadCallback(DataContainer $dc)
    {
    }

    public function mySaveCallback(DataContainer $dc)
    {
        if (!$objRow = $dc->activeRecord) {
            return;
        }
    }

    /**
     * Ändert das Aussehen des Toggle-Buttons.
     * @param $row
     * @param $href
     * @param $label
     * @param $title
     * @param $icon
     * @param $attributes
     * @return string
     */
    public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
    {
        if (strlen(Input::get('tid'))) {
            $this->toggleVisibility(Input::get('tid'), (Input::get('state') == 1), (@func_get_arg(12) ?: null));
            $this->redirect($this->getReferer());
        }

        // Check permissions AFTER checking the tid, so hacking attempts are logged
        if (!$this->User->hasAccess('tl_dmadma_elementgenerator::published', 'alexf')) {
            return '';
        }

        $href .= '&amp;tid=' . $row['id'] . '&amp;state=' . ($row['published'] ? '' : 1);

        if (!$row['published']) {
            $icon = 'invisible.svg';
        }

        return '<a href="' . $this->addToUrl($href) . '" title="' . StringUtil::specialchars($title) . '"' . $attributes . '>' . Image::getHtml($icon, $label, 'data-state="' . ($row['published'] ? 1 : 0) . '"') . '</a> ';
    }

    /**
     * Toggle the visibility of an element
     * @param integer
     * @param boolean
     */
    public function toggleVisibility($intId, $blnVisible, DataContainer $dc = null)
    {
        // Set the ID and action
        Input::setGet('id', $intId);
        Input::setGet('act', 'toggle');

        if ($dc) {
            $dc->id = $intId; // see #8043
            // $objModel = Dmadma_elementgeneratorModel::findById($intId);
        }

//        $this->checkPermission();

        // Check the field access
        // if (!$this->User->hasAccess('tl_dmadma_elementgenerator::published', 'alexf')) {
        //     throw new Contao\CoreBundle\Exception\AccessDeniedException('Not enough permissions to publish/unpublish  item ID ' . $intId . '.');
        // }

        $objVersions = new Versions('tl_dmadma_elementgenerator', $intId);
        $objVersions->initialize();

        // Trigger the save_callback
        if (is_array($GLOBALS['TL_DCA']['tl_dmadma_elementgenerator']['fields']['published']['save_callback'])) {
            foreach ($GLOBALS['TL_DCA']['tl_dmadma_elementgenerator']['fields']['published']['save_callback'] as $callback) {
                if (is_array($callback)) {
                    $this->import($callback[0]);
                    $blnVisible = $this->{$callback[0]}->{$callback[1]}($blnVisible, ($dc ?: $this));
                } elseif (is_callable($callback)) {
                    $blnVisible = $callback($blnVisible, ($dc ?: $this));
                }
            }
        }

        // Update the database
        Database::getInstance()->prepare("UPDATE tl_dmadma_elementgenerator SET tstamp=" . time() . ", published='" . ($blnVisible ? '1' : '') . "' WHERE id=?")
            ->execute($intId);

        $objVersions->create();

    }


    public function myLabelCallback($row, $label, DataContainer $dc, $args)
    {
        $image = $row['admin'] ? 'admin' : 'user';
        $time = \Date::floorToMinute();

        $disabled = $row['start'] !== '' && $row['start'] > $time || $row['stop'] !== '' && $row['stop'] < $time;

        if ($row['disable'] || $disabled) {
            $image .= '_';
        }

        $args[0] = sprintf('<div class="list_icon_new" style="background-image:url(\'%ssystem/themes/%s/icons/%s.svg\')" data-icon="%s.svg" data-icon-disabled="%s.svg">&nbsp;</div>', TL_ASSETS_URL, Backend::getTheme(), $image, $disabled ? $image : rtrim($image, '_'), rtrim($image, '_') . '_');

        return $args;
    }
}
