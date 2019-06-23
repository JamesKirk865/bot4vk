<?php

include "vk_api.php";

const VK_KEY = "bb7dc666dd8d680a4ec105a1720a2036526d1895a7273aa4434c2a5dbb3122080be7c7a5ffdfdd24fddaa"; //токен
const ACCESS_KEY = "f3f4e1c0"; //ключ сообщества
const VERSION = "5.81"; //версия API VK


$vk = new vk_api(VK_KEY, VERSION); // создание экземпляра класса работы с api, принимает токен и версию api
$data = json_decode(file_get_contents('php://input')); //Получает и декодирует JSON пришедший из ВК
if ($data->type == 'confirmation') { //Если vk запрашивает ключ
    exit(ACCESS_KEY); //Завершаем скрипт отправкой ключа
}
$vk->sendOK(); //Говорим vk, что мы приняли callback


$id = $data->object->from_id;
$message = $data->object->text;



if ($data->type == 'message_new') {
	if($message == 'лол') {
		$vk->sendMessage($id, "кек");
		$vk->sendMessage($id, "чебурек"); 
	}
}