<?php

// DataBase
interface IDB {
	public function connect();
}

class DB implements IDB
{
	private $host;
	private $user;
	private $password;
	private $db_name;
	private $db;
	private $result;

	public function __construct($host, $user, $password, $db_name)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->db_name = $db_name;

		$this->db = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

		if ( !$this->db ) {
			echo "<h1>Connection Error! </h1>";
		}
	}

	public function SendContacts($name, $email, $subject, $message) {
		$query = mysqli_query($this->connect(), "INSERT INTO `contact_messages`(`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')");

		if ($query) {
			$this->result = "Повідомлення успішно відправлено!";
		} else {
			$this->result = "Error in Send Contact Message";
		}
	}
	
	public function showResult() {
		if ( $this->result != null OR $this->result != '' OR $this->result != 0) {
			return $this->result;
		}
	}

	public function connect() {
		return $this->db;
	}
}

// Global Settings
class GlobalSettings
{
	private $title;

	// Social
	private $behance;
	private $github;
	private $linkedin;
	private $twitter;
	private $facebook;

	public function __construct($title)
	{
		$this->title = $title;
	}

	public function getTitle() 
	{
		return $this->title;
	}

	public function setSocial($behance, $github, $linkendin, $twitter, $facebook)
	{
		$this->behance = $behance;
		$this->github = $github;
		$this->linkedin = $linkendin;
		$this->twitter = $twitter;
		$this->facebook = $facebook;
	}

	public function getSocial($socialname) {
		return $this->$socialname;
	}

}

// Global Functions
class GlobalFunctions
{
	protected $db;

	public function __construct(IDB $db)
	{
		$this->db = $db;
	}

	public function checkGet($GetName)
	{
		if ( isset($_GET[$GetName]) && !empty($_GET[$GetName])) 
		{
			return $GetName;
		} 

		else 
		{
			echo "<h1><b>Sory but I have some troubles with GET parameter :(</b></h1>";
			die();
		}
	}

	public function getArticle($id) 
	{
		global $article;

		$query = mysqli_query($this->db->connect(), "SELECT * FROM articles WHERE id = " . (int) $id);

		if ($query && mysqli_num_rows($query) != 0) {
			$article = mysqli_fetch_assoc($query);

			return $article;
		} else {
			echo "<h1><b>Ooooops... I couldn't find article :(</b></h1>";
			die;
		}
	}

	public function latestArticles($count)
	{
		global $query;

		$query = mysqli_query($this->db->connect(), "SELECT * FROM articles LIMIT 0," . (int) $count);

		if ($query && mysqli_num_rows($query) != 0) {
			return $query;
		} else {
			echo "<h1><b>Ooooops... I couldn't find articles :(</b></h1>";
			die;
		}
	}

}
?>