<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'demo19');
ini_set('display_errors',1);

$connect=mysqli_connect("localhost","root","","demo19");


/*if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}*/



class DB_con
{
 function __construct()
 {
	$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
	$this->dbh=$con;
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 }
 
 public function siteDetails()
 {
	 $result=mysqli_query($this->dbh,"select * from site_details");
	 return $result;
 }

 public function banner()
 {
	 $result=mysqli_query($this->dbh,"select * from banner where status=1");
	 return $result;
 }
 
 public function faq()
 {
	 $result=mysqli_query($this->dbh,"select * from faq where status=1 ");
	 return $result;
 }
 public function gallery()
 {
	 $result=mysqli_query($this->dbh,"select * from gallery where status=1");
	 return $result;
 }
 public function testimonial()
 {
	 $result=mysqli_query($this->dbh,"select * from testimonials where status=1 ");
	 return $result;
 }
 public function news()
 {
	 $result=mysqli_query($this->dbh,"select * from news where status=1");
	 return $result;
 }
 public function blog()
 {
	 $result=mysqli_query($this->dbh,"select * from blog where status=1");
	 return $result;
 }
 public function product()
 {
	 $result=mysqli_query($this->dbh,"select * from products where status=1");
	 return $result;
 }
 public function featured_product()
 {
	 $result=mysqli_query($this->dbh,"select * from products where status=1 and isfeatured=1");
	 return $result;
 }

 
 public function blog_category()
 {
	 $result=mysqli_query($this->dbh,"select * from blogcategory where status=1");
	 return $result;
 }

 public function top_menu()
 {
	 $result=mysqli_query($this->dbh,"select * from menu_management where menu_name=2 order by orderr");
	 return $result;
 }
 public function main_menu()
 {
	 $result=mysqli_query($this->dbh,"select * from menu_management where menu_name=1 order by orderr");
	 return $result;
 }

}



$menu_url='http://localhost/demo19/';
$image_url='http://localhost/demo19/settings/media/';

$fetchdata=new DB_con();

$q1=$fetchdata->siteDetails();
$siteDetails=mysqli_fetch_array($q1);

$banner=$fetchdata->banner();
$faq=$fetchdata->faq();
$gallery=$fetchdata->gallery();
$testimonial=$fetchdata->testimonial();
$testimonial1=$fetchdata->testimonial();
$testimonial2=$fetchdata->testimonial();
$news=$fetchdata->news();
$blog=$fetchdata->blog();
$product=$fetchdata->product();
$featured_product=$fetchdata->featured_product();
$blog_category=$fetchdata->blog_category();
$main_menu=$fetchdata->main_menu();
$top_menu=$fetchdata->top_menu();

?>