<?php 

// Створюю підключення
$db = new DB('localhost', 'root', '', 'blog');

// Глобальні настройки
$global = new GlobalSettings('Sentra');
$global->setSocial('behance', 'https://github.com/AndrewVozniak', 'linkendin', 'twitter', 'facebook');

// Глобальні Функції
$functions = new GlobalFunctions($db);


// Contact Us Form
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
	$db->SendContacts( $_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'] );
}

?>