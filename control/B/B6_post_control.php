<?php

error_reporting(E_ALL);

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include basic_control
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('../basic/class.basic_control.php');

/* user defined includes */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-includes begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-includes end

/* user defined constants */
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-constants begin
// section 10-5-23-115--2536d573:14c1cdb1400:-8000:0000000000001891-constants end

/**
 * require_once('../basic/class.basic_control.php');
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class B6_post_control
    extends basic_control
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute file_name
     *
     * @access private
     * @var String
     */
    private $file_name = null;

    /**
     * Short description of attribute file_source
     *
     * @access private
     * @var String
     */
    private $file_source = null;

    /**
     * Short description of attribute file_size
     *
     * @access private
     * @var Integer
     */
    private $file_size = null;

    /**
     * Short description of attribute file_error
     *
     * @access private
     * @var Integer
     */
    private $file_error = null;

    /**
     * Short description of attribute reader_id
     *
     * @access private
     * @var Integer
     */
    private $reader_id = null;

    /**
     * Short description of attribute author_id
     *
     * @access private
     * @var Integer
     */
    private $author_id = null;

    /**
     * Short description of attribute message_id
     *
     * @access private
     * @var Integer
     */
    private $message_id = null;

    // --- OPERATIONS ---
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_entered_completed()
    {
     $completed = TRUE;
     if ( empty($_POST["message"]))
     { $completed = FALSE; }
     else
     {
     if
     (
     (isset($_GET["reader_id"]) && is_string($_GET["reader_id"]))
     AND
     (isset($_GET["author_id"]) && is_string($_GET["author_id"]))
     )
     {
     $this->reader_id = $_GET["reader_id"];
     $this->author_id = $_GET["author_id"];
     }
     else
     {
     $this->reader_id = $_SESSION['watched_id'];
     $this->author_id = $_SESSION['watch_id'];
     }
     }
     return $completed;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function perform()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.member_message.php');
     
     if( defined('__ROOT_CONTROL__') == FALSE )
     { define('__ROOT_CONTROL__', $this->get_root_control() ); }
     require_once(__ROOT_CONTROL__.'email/class.message_single_mail.php');
     
     $text = htmlspecialchars( $_POST["message"]);
     $is_conform = FALSE;
     
     $this->file_name = $_FILES['userfile']['name'];
     $this->file_source = $_FILES['userfile']['tmp_name'];
     $this->file_size = $_FILES['userfile']['size'];
     $this->file_error = $_FILES['userfile']['error'];
     
     if ( $this->is_mobbing_included( $text ) == FALSE )
     { $is_conform = TRUE; }
     
     if ( $is_conform )
     {
     $message = new member_message();
     $message->set_author_id( $this->author_id );
     $message->set_reader_id( $this->reader_id );
     $message->set_read_stamp( 0 );
     $message->set_text( $this->generate_hyperlink( $text ) );
     $this->message_id = $message->insert();
     $this->add_file();
     $this->insert_news();
     
     $mail = new message_single_mail();
     $mail->set_author_id( $this->author_id );
     $mail->set_receiver_id( $this->reader_id );
     $mail->sent_mail();
     }
     return $is_conform;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_file()
    {
     if( empty( $this->file_name ))
     // nothing to copy
     { ; }
     else
     {
     // something has to copy
     if ( $this->is_image() )
     // an image has been selected
     { $this->add_image(); }
     
     elseif ( $this->is_document() )
     // a document has been selected
     { $this->add_document(); }
     
     elseif ( $this->is_video() )
     // a video has been selected
     { $this->add_video(); }
     
     else
     // something else ?
     { ; }
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_image()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.image.php');
     
     $is_image = FALSE;
     $image = new image();
     $is_image = $image->is_image( $this->file_name );
     return $is_image;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_image()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.image.php');
     require_once(__ROOT_DATA__.'class.message_media.php');
     
     $owner_group = "m";
     
     $image = new image();
     $image->set_owner_group( $owner_group );
     $image->set_owner_id( $this->author_id );
     $image->set_uploader_id( $this->author_id );
     
     $image->set_upload_file_name( $this->file_name );
     $image->set_size( $this->file_size );
     $image->set_file_error( $this->file_error );
     $image->set_header( $image->get_upload_file_name() );
     $image->set_text( "" );
     
     if ( $image->upload_image( $this->file_source ) )
     {
     $message_media = new message_media();
     $message_media->set_message_id( $this->message_id );
     $message_media->set_picture_id( $image->get_id() );
     $message_media->set_document_id( (int)0 );
     $message_media->set_video_id( (int)0 );
     $message_media->insert();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_document()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.document.php');
     
     $is_document = FALSE;
     $document = new document();
     $is_document = $document->is_document( $this->file_name );
     return $is_document;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_document()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.document.php');
     require_once(__ROOT_DATA__.'class.message_media.php');
     
     $owner_group = "m";
     
     $document = new document();
     $document->set_owner_group( $owner_group );
     $document->set_owner_id( $this->author_id );
     $document->set_uploader_id( $this->author_id );
     
     $document->set_upload_file_name( $this->file_name );
     $document->set_size( $this->file_size );
     $document->set_file_error( $this->file_error );
     $document->set_header( $document->get_upload_file_name() );
     $document->set_text( "" );
     
     if ( $document->upload_document( $this->file_source ) )
     {
     $message_media = new message_media();
     $message_media->set_message_id( $this->message_id );
     $message_media->set_picture_id( (int)0 );
     $message_media->set_document_id( $document->get_id() );
     $message_media->set_video_id( (int)0 );
     $message_media->insert();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function is_video()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.video.php');
     
     $is_video = FALSE;
     $video = new video();
     $is_video = $video->is_video( $this->file_name );
     return $is_video;
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function add_video()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.video.php');
     require_once(__ROOT_DATA__.'class.message_media.php');
     
     $owner_group = "m";
     
     $video = new video();
     $video->set_owner_group( $owner_group );
     $video->set_owner_id( $this->author_id );
     $video->set_uploader_id( $this->author_id );
     
     $video->set_upload_file_name( $this->file_name );
     $video->set_size( $this->file_size );
     $video->set_file_error( $this->file_error );
     $video->set_header( $video->get_upload_file_name() );
     $video->set_text( "" );
     
     if ( $video->upload_video( $this->file_source ) )
     {
     $message_media = new message_media();
     $message_media->set_message_id( $this->message_id );
     $message_media->set_picture_id( (int)0 );
     $message_media->set_document_id( (int)0 );
     $message_media->set_video_id( $video->get_id() );
     $message_media->insert();
     }
    }
    /**
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     */
    public function insert_news()
    {
     if( defined('__ROOT_DATA__') == FALSE )
     { define('__ROOT_DATA__', $this->get_root_data() ); }
     require_once(__ROOT_DATA__.'class.news.php');
     
     $news = new news();
     $news->set_receiver_id( $this->reader_id );
     $news->set_uploader_id( $this->author_id );
     $news->set_entity_group("m");
     $news->set_entity_id( (int)0 );
     $news->set_function( (int)500 );
     $news->set_article_id( (int)0 );
     $news->insert();
    }
}?>