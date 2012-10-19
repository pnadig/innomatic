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
require_once ('innomatic/validator/Validator.php');
/**
 * This validator validates strings with a regex.
 * @author Alex Pagnoni <alex.pagnoni@innoteam.it>
 * @copyright Copyright 2012 Innoteam S.r.l.
 * @since 1.0
 */
class RegexValidator extends Validator
{
    public function validate ()
    {
        if (isset($this->_params['pattern'])) {
            if (! preg_match($this->_params['pattern'], $this->_item)) {
                $this->setError('Pattern does not match');
            }
        } else {
            $this->setError('Missing pattern');
        }
    }
}