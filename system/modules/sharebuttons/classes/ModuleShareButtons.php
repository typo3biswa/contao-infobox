<?php

/**
 * Contao Open Source CMS
 *
 * simple extension to provide a share buttons module
 * 
 * Copyright (C) 2013 Fritz Michael Gschwantner
 * 
 * @package sharebuttons
 * @link    http://www.inspiredminds.at
 * @author  Fritz Michael Gschwantner <fmg@inspiredminds.at>
 * @license GPL-2.0
 */


class ModuleShareButtons extends Module
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'sharebuttons_default';

    /**
     * Generate module
     */
    protected function compile()
    {
        if( $this->sharebuttons_template )
        {
            $this->Template = new FrontendTemplate( $this->sharebuttons_template );
        }

        // add settings to template
        $this->Template->facebook = $this->sharebuttons_facebook;
        $this->Template->twitter = $this->sharebuttons_twitter;
        $this->Template->gplus = $this->sharebuttons_gplus;
        $this->Template->linkedin = $this->sharebuttons_linkedin;
        $this->Template->xing = $this->sharebuttons_xing;
        $this->Template->mail = $this->sharebuttons_mail;
        $this->Template->usetheme = $this->sharebuttons_usetheme;
        $this->Template->theme = $this->sharebuttons_theme;

        if( $this->sharebuttons_usetheme && TL_MODE == 'FE' )
        {
            if( !is_array( $GLOBALS['TL_CSS'] ) ) $GLOBALS['TL_CSS'] = array();
            $GLOBALS['TL_CSS'][] = 'system/modules/sharebuttons/assets/sharebuttons_base.css';
            $GLOBALS['TL_CSS'][] = 'system/modules/sharebuttons/assets/'.$this->sharebuttons_theme.'.css';
        }
    }
}
?>
