<?php
/**
 * Created By Conversoft Generator
 * https://conversoft.rocks
 * https://github.com/conversoft
 * @author Thomas Lonnemann <thomas@conversoft.rocks>
 **/

array_insert($GLOBALS['BE_MOD'], 1, [
    'Dma' => [
        'Dma_elementgenerator' => [
            'tables' => ['tl_dmadma_elementgenerator'],
            'icon' => 'system/themes/default/images/form.gif',
        ],
    ],
]);

array_insert($GLOBALS['FE_MOD'], 2, [
    'Dma' => [
        'Dma_elementgenerator' => 'Dma\\Dma_elementgenerator\\Modules\\ModuleDmaDma_elementgenerator',
    ],
]);
/**
 * Content elements
 */
$GLOBALS['TL_CTE']['dma']['Dma_elementgenerator'] = "Dma\\Dma_elementgenerator\\Elements\\ElementDmaDma_elementgenerator";
/**
 * HOOKS
 */
// $GLOBALS['TL_HOOKS']['activateAccount'][] = array('Dma\Dma_elementgenerator\Hooks\\ActivateAccount', 'activateAccount');
// $GLOBALS['TL_HOOKS']['activateRecipient'][] = array('Dma\Dma_elementgenerator\Hooks\\ActivateRecipient', 'activateRecipient');
// $GLOBALS['TL_HOOKS']['addComment'][] = array('Dma\Dma_elementgenerator\Hooks\\AddComment', 'addComment');
// $GLOBALS['TL_HOOKS']['addCustomRegexp'][] = array('Dma\Dma_elementgenerator\Hooks\\AddCustomRegexp', 'addCustomRegexp');
// $GLOBALS['TL_HOOKS']['addLogEntry'][] = array('Dma\Dma_elementgenerator\Hooks\\AddLogEntry', 'addLogEntry');
// $GLOBALS['TL_HOOKS']['checkCredentials'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CheckCredentials', 'checkCredentials');
// $GLOBALS['TL_HOOKS']['closeAccount'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CloseAccount', 'closeAccount');
// $GLOBALS['TL_HOOKS']['colorizeLogEntries'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ColorizeLogEntries', 'colorizeLogEntries');
// $GLOBALS['TL_HOOKS']['compileDefinition'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CompileDefinition', 'compileDefinition');
// $GLOBALS['TL_HOOKS']['compileFormFields'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CompileFormFields', 'compileFormFields');
// $GLOBALS['TL_HOOKS']['createDefinition'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CreateDefinition', 'createDefinition');
// $GLOBALS['TL_HOOKS']['createNewUser'][] = array('Dma\\Dma_elementgenerator\\Hooks\\CreateNewUser', 'createNewUser');
// $GLOBALS['TL_HOOKS']['executePreActions'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ExecutePreActions', 'executePreActions');
// $GLOBALS['TL_HOOKS']['executePostActions'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ExecutePostActions', 'executePostActions');
// $GLOBALS['TL_HOOKS']['formValidate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\FormValidate', 'formValidate');
// $GLOBALS['TL_HOOKS']['generateFrontendUrl'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GenerateFrontendUrl', 'generateFrontendUrl');
// $GLOBALS['TL_HOOKS']['generatePage'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GeneratePage', 'generatePage');
// $GLOBALS['TL_HOOKS']['getAllEvents'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetAllEvents', 'getAllEvents');
// $GLOBALS['TL_HOOKS']['getAttributesFromDca'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetAttributesFromDca', 'getAttributesFromDca');
// $GLOBALS['TL_HOOKS']['getContentElement'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetContentElement', 'getContentElement');
// $GLOBALS['TL_HOOKS']['getImage'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetImage', 'getImage');
// $GLOBALS['TL_HOOKS']['getPageIdFromUrl'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetPageIdFromUrl', 'getPageIdFromUrl');
// $GLOBALS['TL_HOOKS']['getPageLayout'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetPageLayout', 'getPageLayout');
// $GLOBALS['TL_HOOKS']['getSearchablePages'][] = array('Dma\\Dma_elementgenerator\\Hooks\\GetSearchablePages', 'getSearchablePages');
// $GLOBALS['TL_HOOKS']['importUser'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ImportUser', 'importUser');
// $GLOBALS['TL_HOOKS']['initializeSystem'][] = array('Dma\\Dma_elementgenerator\\Hooks\\InitializeSystem', 'initializeSystem');
// $GLOBALS['TL_HOOKS']['isVisibleElement'][] = array('Dma\\Dma_elementgenerator\\Hooks\\IsVisibleElement', 'isVisibleElement');
// $GLOBALS['TL_HOOKS']['listComments'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ListComments', 'listComments');
// $GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('Dma\\Dma_elementgenerator\\Hooks\\LoadDataContainer', 'loadDataContainer');
// $GLOBALS['TL_HOOKS']['loadFormField'][] = array('Dma\\Dma_elementgenerator\\Hooks\\LoadFormField', 'loadFormField');
// $GLOBALS['TL_HOOKS']['loadLanguageFile'][] = array('Dma\\Dma_elementgenerator\\Hooks\\LoadLanguageFile', 'loadLanguageFile');
// $GLOBALS['TL_HOOKS']['outputBackendTemplate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\OutputBackendTemplate', 'outputBackendTemplate');
// $GLOBALS['TL_HOOKS']['outputFrontendTemplate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\OutputFrontendTemplate', 'outputFrontendTemplate');
// $GLOBALS['TL_HOOKS']['parseBackendTemplate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ParseBackendTemplate', 'parseBackendTemplate');
// $GLOBALS['TL_HOOKS']['parseFrontendTemplate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ParseFrontendTemplate', 'parseFrontendTemplate');
// $GLOBALS['TL_HOOKS']['parseTemplate'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ParseTemplate', 'parseTemplate');
// $GLOBALS['TL_HOOKS']['parseWidget'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ParseWidget', 'parseWidget');
// $GLOBALS['TL_HOOKS']['postDownload'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PostDownload', 'postDownload');
// $GLOBALS['TL_HOOKS']['postLogin'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PostLogin', 'postLogin');
// $GLOBALS['TL_HOOKS']['postLogout'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PostLogout', 'postLogout');
// $GLOBALS['TL_HOOKS']['postUpload'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PostUpload', 'postUpload');
// $GLOBALS['TL_HOOKS']['prepareFormData'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PrepareFormData', 'prepareFormData');
// $GLOBALS['TL_HOOKS']['printArticleAsPdf'][] = array('Dma\\Dma_elementgenerator\\Hooks\\PrintArticleAsPdf', 'printArticleAsPdf');
// $GLOBALS['TL_HOOKS']['processFormData'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ProcessFormData', 'processFormData');
// $GLOBALS['TL_HOOKS']['removeOldFeeds'][] = array('Dma\\Dma_elementgenerator\\Hooks\\RemoveOldFeeds', 'removeOldFeeds');
// $GLOBALS['TL_HOOKS']['removeRecipient'][] = array('Dma\\Dma_elementgenerator\\Hooks\\RemoveRecipient', 'removeRecipient');
// $GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ReplaceInsertTags', 'replaceInsertTags');
// $GLOBALS['TL_HOOKS']['reviseTable'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ReviseTable', 'reviseTable');
// $GLOBALS['TL_HOOKS']['setNewPassword'][] = array('Dma\\Dma_elementgenerator\\Hooks\\SetNewPassword', 'setNewPassword');
// $GLOBALS['TL_HOOKS']['storeFormData'][] = array('Dma\\Dma_elementgenerator\\Hooks\\StoreFormData', 'storeFormData');
// $GLOBALS['TL_HOOKS']['validateFormField'][] = array('Dma\\Dma_elementgenerator\\Hooks\\ValidateFormField', 'validateFormField');

//$GLOBALS['TL_HOOKS']['csModifyTemplate'][] = array('Dma\\Dma_elementgenerator\\\Hooks\\CsModifyTemplate', 'csModifyTemplate');
