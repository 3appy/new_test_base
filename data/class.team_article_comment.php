<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.team_article_comment.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 27.01.2015, 16:13:33 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include generated_team_article_comment
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('generated/class.generated_team_article_comment.php');

/* user defined includes */
// section -64--88--78-25-1362e296:147f7ea7a9e:-8000:0000000000001687-includes begin
// section -64--88--78-25-1362e296:147f7ea7a9e:-8000:0000000000001687-includes end

/* user defined constants */
// section -64--88--78-25-1362e296:147f7ea7a9e:-8000:0000000000001687-constants begin
// section -64--88--78-25-1362e296:147f7ea7a9e:-8000:0000000000001687-constants end

/**
 * Short description of class team_article_comment
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class team_article_comment
    extends generated_team_article_comment
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_text()
    {
     return str_replace("\n","<br />", parent::get_text() );
    }
}?>