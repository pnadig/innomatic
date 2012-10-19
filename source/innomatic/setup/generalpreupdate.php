<?php
/**
 * Innomatic
 *
 * LICENSE 
 * 
 * This source file is subject to the new BSD license that is bundled 
 * with this package in the file LICENSE.
 *
 * @copyright  1999-2012 Innoteam S.r.l.
 * @license    http://www.innomatic.org/license/   BSD License
 * @link       http://www.innomatic.org
 * @since      Class available since Release 5.0
*/

/*
if (file_exists(InnomaticContainer::instance('innomaticcontainer')->getHome()
                . 'WEB-INF/db/innomatic_root.xml.old')) {
      @copy(InnomaticContainer::instance('innomaticcontainer')->getHome()
           . 'WEB-INF/db/innomatic_root.xml.old',
           InnomaticContainer::instance('innomaticcontainer')->getHome()
           . 'WEB-INF/db/innomatic_root.xml.old2' );
}
if (file_exists(InnomaticContainer::instance('innomaticcontainer')->getHome()
                . 'WEB-INF/db/innomatic_root.xml')) {
    @copy(InnomaticContainer::instance('innomaticcontainer')->getHome()
          . 'WEB-INF/db/innomatic_root.xml',
          InnomaticContainer::instance('innomaticcontainer')->getHome()
          . 'WEB-INF/db/innomatic_root.xml.old' );
}
*/

chmod(
    InnomaticContainer::instance('innomaticcontainer')->getHome()
    . 'WEB-INF/temp/pids', 0777
);