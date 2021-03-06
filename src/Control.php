<?php
/**
 *
 * Part of the QCubed PHP framework.
 *
 * @license MIT
 *
 */

namespace QCubed\Bootstrap;

use QCubed\Project\Control\ControlBase as QControl;
use QCubed\Project\Control\FormBase as QForm;

/**
 * Class Control
 *
 * Base bootstrap control. Set your QControl to inherit from this control if you want bootstrap functionality
 * across all your controls.
 *
 * The implementation passes off most of its functionality to a trait. 2 reasons: You can make a single control
 * into a bootstrap control this way without having to make all your controls have the bootstrap functionality.
 *
 * The following properties come from the trait
 *
 * @property-write string $ValidationError string to display on validation error
 * @property-write string $Warning string to display on warning
 * @property-write boolean $Display True to display the control
 * @property-write string $LabelCssClass Css class for the label
 * @property-write string $HorizontalClass Css class to use for horizontal display
 *
 *
 *
 * @package QCubed\Bootstrap
 */
abstract class Control extends QControl
{
    use ControlTrait;    // Pass off most functionality to the trait.

    /**
     * Control constructor.
     * @param QControl|QForm $objParent
     * @param null $strControlId
     */
    public function __construct($objParent, $strControlId = null)
    {
        parent::__construct($objParent, $strControlId);

        Bootstrap::loadJS($this);
        /*

        if ($this instanceof \QCubed\Control\TextBoxBase ||
            $this instanceof \QCubed\Project\Control\ListBox) {
            $this->addCssClass(Bootstrap::FormControl);
        }
        */
    }
}
