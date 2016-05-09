<?php
/**
 * Wizard helper by jaredhoyt (forked by prilka).
 *
 * Creates links, outputs step numbers for views, and creates dynamic progress menu as the wizard is completed.
 *
 * PHP version 5
 *
 * Comments and bug reports welcome at jaredhoyt AT gmail DOT com
 *
 * Licensed under The MIT License
 *
 * @writtenby		jaredhoyt, prilka
 * @lastmodified	Date: Nov 8, 2012
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */ 
class WizardHelper extends AppHelper {
	public $helpers = array('Session','Html');
	public $output = null;
/**
 * undocumented function
 *
 * @param string $key optional key to retrieve the existing value
 * @return mixed data at config key (if key is passed)
 */
	public function config($key = null) {
		if ($key == null) {
			return $this->Session->read('Wizard.config');
		} else {
			$wizardData = $this->Session->read('Wizard.config.'.$key);
			if (!empty($wizardData)) {
				return $wizardData;
			} else {
				return null;
			}
		}
	}
/**
 * undocumented function
 *
 * @param string $title 
 * @param string $step 
 * @param string $htmlAttributes 
 * @param string $confirmMessage 
 * @param string $escapeTitle 
 * @return string link to a specific step
 */
	public function link($title, $step = null, $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true) {
		if ($step == null) {
			$step = $title;
		}
		$wizardAction = $this->config('wizardAction');
		
		return $this->Html->link($title, $wizardAction.$step, $htmlAttributes, $confirmMessage, $escapeTitle);
	}
/**
 * Retrieve the step number of the specified step name, or the active step
 *
 * @param string $step optional name of step
 * @param string $shiftIndex optional offset of returned array index. Default 1
 * @return string step number. Returns false if not found
 */
	public function stepNumber($step = null, $shiftIndex = 1) {
		if ($step == null) {
			$step = $this->config('activeStep');
		}
		
		$steps = $this->config('steps');
		
		if (in_array($step, $steps)) {
			return array_search($step, $steps) + $shiftIndex;
		} else {
			return false;
		}
	}
	
	/**
	 * Get the total step count.
	 *
	 * @return int
	 */
	public function stepCount()	{
		return count((array)$this->config('steps'));
	}	
/**
 * Returns a set of html elements containing links for each step in the wizard. 
 *
 * @param string $titles 
 * @param string $attributes pass a value for 'wrap' to change the default tag used
 * @param string $htmlAttributes 
 * @param string $confirmMessage 
 * @param string $escapeTitle 
 * @return string
 */
	public function progressMenu($titles = array(), $attributes = array(), $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true) {
		$wizardConfig = $this->config();
		extract($wizardConfig);	
		
		$attributes = array_merge(array('wrap' => 'div', 'container' => null, 'containerAttr' => '', 'useDelim' => false, 'innerHTML' => null), $attributes);
		extract($attributes);
		
		$incomplete = null;

		if(!empty($container)) {
		    $this->output .= "<$container";
		    if(!empty($containerAttr)) {
		    	
		    	if(is_array($containerAttr)) {
		    		foreach($containerAttr as $k => $v) {
		    			if(is_array($v)) {
		    				$v = implode(' ', $v);
		    			}
		    			$this->output .= " $k=\"$v\"";		
		    		}	
		    	}
		    	else {		    	
			        $this->output .= " $containerAttr";
		    	}
		    }
		    $this->output .= ">";
		}
		
		$i = 0;
		$last = count($steps)-1;
		$open = false;
		foreach ($steps as $title => $step) {
			$title = empty($titles[$step]) ? $step : $titles[$step];
			
			$isFirst = $i == 0;
			$isLast = $i == $last;
			
			$class = 'step' . ($i+1);			
			
			if($isFirst)
			    $class .= ' first';
			elseif($isLast)
			    $class .= ' last';
			$class .= " $step";	
			
			if ($step == $activeStep)
				$open = true;					
			
			if (!$incomplete) {
				if ($step == $expectedStep) {
					$incomplete = true;
					$class .= ' expected';
				} else {
					$class .= ' complete';
				}
				if ($step == $activeStep) {
					$class .= ' active';
				}
				$element = $this->Html->link($title, array('action' => $wizardAction, $step), $htmlAttributes, $confirmMessage, $escapeTitle);
				if(!empty($innerHTML))
					$element = sprintf($innerHTML, $element);
				$this->output .= "<$wrap class='step $class'>$element</$wrap>";				
			} else {
				$this->output .= "<$wrap class='step $class incomplete'><span class=\"text\">" . (empty($innerHTML) ? $title : sprintf($innerHTML, $title)) . "</span></$wrap>";				
			}
			
			if($useDelim && !$isLast) {
			    $delimClass = $open ? 'incomplete' : 'complete';			    
			    $this->output .= "<$wrap class='delim $delimClass'>";
			}			
			
			$i++;
		}
		
		if(!empty($container))
		    $this->output .= "</$container>";
		
		return $this->output;
	}
	
/**
 * Returns a set of html elements containing links for each step in the wizard.
 * Default containter / element-wrapper = 'ul' / 'li'
 *
 * @see progressMenu()
 * 
 * @param string $titles
 * @param string $attributes pass a value for 'wrap' to change the default tag used
 * @param string $htmlAttributes
 * @param string $confirmMessage
 * @param string $escapeTitle
 * @return string
 */
    public function progressMenuList($titles = array(), $attributes = array(), $htmlAttributes = array(), $confirmMessage = false, $escapeTitle = true)
    {
        $attributes = array_merge(array('wrap' => 'li', 'container' => 'ul'), $attributes);
        return $this->progressMenu($titles, $attributes, $htmlAttributes, $confirmMessage, $escapeTitle);
    }	
}
