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

require_once('innomatic/tpl/Template.php');

/**
 * PHP based template engine.
 *
 * This class provides a fast and very powerful (as powerful as PHP itself)
 * template engine. Templates are standard PHP files, so that PHP is used
 * for one of its best achieved goals: templating HTML (and not only) files.
 *
 * The class provides a method for setting template variables, that during
 * parsing phase gets extracted to the local scope of the PHP template file.
 *
 * Multiple templates are supported.
 *
 * @author Alex Pagnoni <alex.pagnoni@innoteam.it>
 * @copyright Copyright 2012 Innoteam S.r.l.
 * @since 1.1
 */
class PHPTemplate implements Template
{
    private $_file;
    private $_vars;

    /**
     * Constructor.
     *
     * @access public
     * @since 1.1
     * @param string $file full path of the template.
     */
    public function __construct($file)
    {
        $this->_file = $file;
    }

    /**
     * Sets a variable and its value.
     *
     * The variable will be extracted to the local scope of the template with
     * the same name given as parameter to the method. So setting a variable
     * named "title" will result in a $title variable available to the template.
     *
     * The value can be a string, a number or a PhpTemplate instance. In the
     * latter case, the variable content will be the result of the whole parsed
     * template of the PhpTemplate instance.
     *
     * The proper method for setting arrays is setArray().
     *
     * @access public
     * @since 1.1
     * @param string $name Name of the variable.
     * @param string|number|PhpTemplate $value variable content.
     * @see setArray()
     */
    public function set($name, $value)
    {
        $this->_vars[$name] = $value instanceof PhpTemplate ? $value->parse()
            : $value;
    }

    /**
     * Returns the current value of a variable.
     *
     * @access public
     * @since 1.1
     * @param string $name Name of the variable.
     * @return string Variable value.
     * @see getArray()
     */
    public function get($name)
    {
        if (isset ($this->_vars[$name])) {
            return $this->_vars[$name];
        }
        return false;
    }

    /**
     * Sets an array by reference as variable.
     *
     * This method is similar to the set() one, with the difference that it
     * takes arrays by reference and that it doesn't support passing a
     * PhpTemplate as value.
     *
     * @access public
     * @since 1.1
     * @param string $name Array name.
     * @param array $value Array.
     * @see get()
     */
    public function setArray($name, &$value)
    {
        $this->_vars[$name] = &$value;
    }

    /**
     * Returns the current value of a variable stored as array.
     *
     * @access public
     * @since 1.1
     * @param string $name Name of the array.
     * @return string Array.
     * @see get()
     */
    public function &getArray($name)
    {
        if (isset ($this->_vars[$name])) {
            return $this->_vars[$name];
        }
        return false;
    }

    /**
     * Parses the template.
     *
     * This method parses the template and returns it parsed.
     *
     * @access public
     * @since 1.1
     * @return string
     */
    public function parse()
    {
        if (!file_exists($this->_file)) {
            return "";
        }

        if (is_array($this->_vars)) {
            extract($this->_vars);
        }
        
        ob_start();
        include($this->_file);
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }
}