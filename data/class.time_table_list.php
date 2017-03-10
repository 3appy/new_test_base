<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.time_table_list.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 27.12.2016, 23:43:58 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section 10-30--8-95--4612563e:159262a4093:-8000:000000000000272F-includes begin
// section 10-30--8-95--4612563e:159262a4093:-8000:000000000000272F-includes end

/* user defined constants */
// section 10-30--8-95--4612563e:159262a4093:-8000:000000000000272F-constants begin
// section 10-30--8-95--4612563e:159262a4093:-8000:000000000000272F-constants end

/**
 * Short description of class time_table_list
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class time_table_list
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute data_array
     *
     * @access public
     * @var Integer
     */
    public $data_array = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function __construct()
    {
     $this->data_array = array();
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  item
     */
    public function add_item($item)
    {
     $this->data_array[] = $item;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  n
     */
    public function get_item($n)
    {
     return $this->data_array[ $n ];
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  n
     * @param  item
     */
    public function set_item($n, $item)
    {
     $this->data_array[ $n ] = $item;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_item_count()
    {
     return count( $this->data_array );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function permutate()
    {
     $pos_x = $this->find_pos_x();
     $pos_y = $this->find_pos_y( $pos_x );
     
     if(( $pos_x == (int)-1 ) OR ( $pos_y == (int)-1 ))
     { $success = FALSE; }
     else
     {
     $this->switch_pos( $pos_x, $pos_y );
     $this->sort_up_from( $pos_x );
     $success = TRUE;
     }
     return $success;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function find_pos_x()
    {
     // Suche die Position rechts von Positon x, 
     // bei dem die rechte Zahl grösser ist als die Zahl
     
     $pos_x = (int)-1;
     
     if( $this->get_item_count() > (int)1 )
     {
     $last_index = $this->get_item_count() - (int)1;
     $start_index = $last_index - (int)1;
     $found = FALSE;
     
     for ( $n=$start_index; ( $n >= (int)0 AND !($found) ); $n-- )
     {
     if( $this->get_item( $n ) < $this->get_item( $last_index ) )
     {
     $found = TRUE;
     $pos_x = $n;
     }
     else
     { $last_index = $n; }
     }
     }
     return $pos_x;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  pos_x
     */
    public function find_pos_y($pos_x)
    {
     // Suche aus der Menge der Zahlen rechts neben von (x) 
     // die kleinste Zahl, die grösser ist als die Zahl (x).
     
     $pos_y = (int)-1;
     
     if( ( $this->get_item_count() > (int)1 ) AND ( $pos_x >= (int)0 ) )
     {
     $start_index = $this->get_item_count() - (int)1;
     $min_diff = (int)99;
     $found = FALSE;
     
     for ( $n=$start_index; ( $n > $pos_x AND !($found) ); $n-- )
     {
     $diff = $this->get_item( $n ) - $this->get_item( $pos_x );
     if(( $diff > (int)0 ) AND ( $diff < $min_diff ))
     {
     $min_diff = $diff;
     $pos_y = $n;
     }
     }
     }
     return $pos_y;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  pos_x
     * @param  pos_y
     */
    public function switch_pos($pos_x, $pos_y)
    {
      // Vertausche beide Zahlen
     $tmp = $this->get_item( $pos_x );
     $this->set_item( $pos_x, $this->get_item( $pos_y ) );
     $this->set_item( $pos_y, $tmp );
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  pos_x
     */
    public function sort_up_from($pos_x)
    {
     // Sortiere die Menge der Zahlen rechts der 
     // Zielposition in aufsteigender Reihenfolge
     
     $sort = array();
     
     for ( $n=$pos_x + (int)1; $n < $this->get_item_count(); $n++ )
     { $sort[] = $this->get_item( $n ); }
     
     sort( $sort );
     
     for ( $n=$pos_x + (int)1; $n < $this->get_item_count(); $n++ )
     { $this->set_item( $n, $sort[ $n - ( $pos_x + (int)1 ) ] ); }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function get_print()
    {
     $s_list = "";
     for ( $n=0; $n < $this->get_item_count(); $n++ )
     { $s_list .= $this->get_item( $n ) . ' '; }
     $s_list .= '<br />';
     return $s_list;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function my_init()
    {
     $this->add_item( 1 );
     $this->add_item( 2 );
     $this->add_item( 3 );
     $this->add_item( 4 );
     $this->add_item( 5 );
    }
}?>