<?php
/**
 * Innomatic
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.
 *
 * @copyright  1999-2014 Innoteam Srl
 * @license    http://www.innomatic.org/license/   BSD License
 * @link       http://www.innomatic.org
 */
require_once ('scripts_container.php');

$script = \Innomatic\Scripts\ScriptContainer::instance('\Innomatic\Scripts\ScriptContainer');

ob_end_flush();

echo "
                 Innomatic Cloud Applications Platform

                       http://www.innomatic.org



";

if (InnomaticContainer::instance('\Innomatic\Core\InnomaticContainer')->getState() != InnomaticContainer::STATE_SETUP) {
    echo "Innomatic has been already installed.\n";
    $script->cleanExit(1);
}

if (! isset($argv[1]))
    $argv[1] = '';

echo "Starting setup...\n";
if (\Innomatic\Setup\InnomaticSetup::setup_by_config_file($argv[1], true)) {
    echo "Setup successfull.\n";
    $script->cleanExit();
} else {
    echo "ERROR. Setup unsuccessfull.\n";
    $script->cleanExit(1);
}
