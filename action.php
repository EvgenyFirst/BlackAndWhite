<?php
	$msg_box = ""; // в этой переменной будем хранить сообщения формы
	$errors = array(); // контейнер для ошибок
	// проверяем корректность полей
	if($_POST['user_name'] == "") 	 $errors[] = "Поле 'Text' не заполнено!";
	if($_POST['text_comment'] == "") $errors[] = "Поле 'Textarea' не заполнено!";
	


	// если форма без ошибок
	if(empty($errors)){		
		// собираем данные из формы
		$message  = " 
			<ul style='border: 1px solid #ccc'>
				<li style='
				list-style: circle;
				font-weight: bold;'> Text: 
				</li>                                                                                                                                     
			</ul>" . $_POST['user_name'] . "<br/>";
		$message .= " 
			<ul style='border: 1px solid #ccc'>
				<li style='
				list-style: circle;
				font-weight: bold;'> Select: 
				</li>                                                                                                                                     
			</ul>" . $_POST['user_email'] . "<br/>";
		$message .= "
			<ul style='border: 1px solid #ccc'>
				<li style='
				list-style: circle;
				font-weight: bold;'> Sed ut perspiciatis unde omnis iste natus: 
				</li>                                                                                                                                     
			</ul>" . $_POST['text_comment_1'];
		$message .= "
			<ul style='border: 1px solid #ccc'>
				<li style='
				list-style: circle;
				font-weight: bold;'> Lorem ipsum dolor sit amet, consectetur: 
				</li>                                                                                                                                     
			</ul>"
			. $_POST['text_comment_2'];
		$message .= "
			<ul style='border: 1px solid #ccc'>
				<li style='
				list-style: circle;
				font-weight: bold;'> Textarea: 
				</li>                                                                                                                                     
			</ul>" . $_POST['text_comment'];		
		send_mail($message); // отправим письмо
		// выведем сообщение об успехе
		$msg_box = "<span style='color: green;'>Сообщение успешно отправлено!</span>";
	}else{
		// если были ошибки, то выводим их
		$msg_box = "";
		foreach($errors as $one_error){
			$msg_box .= "<span style='color: red;'>$one_error</span><br/>";
		}
	}

	// делаем ответ на клиентскую часть в формате JSON
	echo json_encode(array(
		'result' => $msg_box
	));
	
	
	// функция отправки письма
	function send_mail($message){
		// почта, на которую придет письмо
		$mail_to = "my@mail.ru"; 
		// тема письма
		$subject = "Письмо с обратной связи";
		
		// заголовок письма
		$headers= "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
		$headers .= "From: Тестовое письмо <no-reply@test.com>\r\n"; // от кого письмо
		
		// отправляем письмо 
		mail($mail_to, $subject, $message, $headers);
	}
	
