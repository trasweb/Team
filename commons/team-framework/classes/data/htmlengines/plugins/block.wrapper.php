<?php
/**
New Licence bsd:
Copyright (c) <2012>, Manuel Jesus Canga Muñoz
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the trasweb.net nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS 'AS IS' AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL Manuel Jesus Canga Muñoz BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

*/

/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     smarty_block_wrapper
 * Type:     block
 * Name:     wrapper
 * Purpose:  output a wrapper "tag"
 * -------------------------------------------------------------
 */

function smarty_block_wrapper($params, $content, Smarty_Internal_Template $template, &$repeat)
{

	$out = '';
	if($repeat) { //open tag
		$out = '<div';

        $wrapper = 'wrapper';
        $params['class'] = $params['class']?? '';
        $params['class'] = $wrapper.' '.$params['class'];

        if(isset($params['wrapper'])) {
            $params['class'] = \team\Filter::apply('\team\gui\wrappers\\'.$params['wrapper'], $params['class']);
            unset($params['wrapper']);
        }


        foreach($params as $attr => $value) {
				$out .= " {$attr}='{$value}'";
		}

		$out .= '>';
	}else {//close tag
		$out = trim($content).'</div>';
	}

	return $out;
}
