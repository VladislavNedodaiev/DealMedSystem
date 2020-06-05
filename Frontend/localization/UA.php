<?php

$header = array (
	
	'title' => 'DealMed System',
	'index_button_text' => 'Головна сторінка',
	'login_button_text' => 'Вхід',
	'register_button_text' => 'Реєстрація',
	'clinic_button_text' => 'Клініка',
	'rooms_button_text' => 'Планування',
	'diseases_button_text' => 'Захворювання',
	'symptoms_button_text' => 'Симптоматика',
	'doctors_button_text' => 'Медичні працівники',
	'clients_button_text' => 'Клієнти',
	'logout_button_text' => 'Вийти'
	
);

$footer = array (

	'up' => 'Вгору',
	'author_text' => 'Автор сайту',
	'author' => 'Владислав Недодаєв'

);

$login = array (

	'title' => 'Вхід в систему',
	'email_placeholder' => 'Введіть ваш email',
	'password_placeholder' => 'Введіть ваш пароль',
	'submit_text' => 'Вхід',
	'register_text' => "Не зареєстровані",
	'register' => 'Зареєструватися'

);

$authorize = array (

	'SUCCESS' => 'Авторизацію проведено успішно',
	'UNVERIFIED' => 'Акаунт не верифіковано, перевірте вашу електронну пошту для верифікації',
	'WRONG_PASSWORD' => 'Ви ввели неправильний пароль',
	'NOT_FOUND' => "Користувача з такою електронною поштою не знайдено",
	'DB_ERROR' => 'Сталася помилка при зверненні до бази даних',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$logout = array (

	'SUCCESS' => 'Ви успішно вийшли з профіля',
	'NO_LOGIN' => 'Ви не авторизовані в системі'

);

$register = array (

	'title' => 'Створення профілю',
	'nickname_placeholder' => "Введіть ім'я користувача/бізнеса",
	'email_placeholder' => 'Введіть ваш email',
	'password_placeholder' => 'Введіть ваш пароль',
	'repeat_password_placeholder' => 'Повторіть ваш пароль',
	'submit_text' => 'Реєстрація',
	'login_text' => 'Вже маєте акаунт',
	'login' => 'Увійти'
	
);

$registration = array (

	'SUCCESS' => 'Пітверджувальний лист надіслано, перевірте вашу електронну пошту, щоб верифікувати акаунт',
	'EMAIL_REGISTERED' => 'Акаунт з такою електронною поштою вже зареєстровано',
	'NICKNAME_REGISTERED' => "Акаунт з таким ім'ям вже зареєстровано",
	'EMAIL_UNSENT' => "Підтверджувальний лист не було надіслано, спробуйте зареєструватися пізніше",
	'DB_ERROR' => 'Сталася помилка при зверненні до бази даних',
	'INCORRECT_EMAIL' => 'Неправильний формат email',
	'DIFFERENT_PASSWORDS' => 'Паролі, які Ви ввели - не співпадають',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$edit_profile = array (

	'edit_profile_title' => 'Редагування',
	'save_button_text' => 'Зберегти зміни',
	'cancel_button_text' => 'Скасувати зміни',
	'title_placeholder' => 'Введіть назву клініки',
	'address_placeholder' => 'Введіть адресу',
	'first_name_placeholder' => "Введіть ім'я",
	'second_name_placeholder' => 'Введіть прізвище',
	'third_name_placeholder' => 'Введіть по батькові',
	'phone_placeholder' => 'Введіть номер телефону',
	'description_placeholder' => 'Біографія (не більше 3000 символів)',
	'user_private' => 'Ця інформація буде прихована',
	'room_title_placeholder' => 'Введіть назву приміщення',
	'x_placeholder' => 'Введіть X позицію (м)',
	'y_placeholder' => 'Введіть Y позицію (м)',
	'width_placeholder' => 'Введіть ширину (м)',
	'height_placeholder' => 'Введіть довжину (м)',
	'disease_title_placeholder' => 'Введіть назву захворювання',
	'immunity_placeholder' => 'Введіть стійк. організму (0.00 до 1.00)',
	'disease_description_placeholder' => 'Введіть опис',
	'symptom_title_placeholder' => 'Введіть назву',
	'symptom_description_placeholder' => 'Введіть опис'

);

$clinic_profile = array (

	'show_rooms' => 'Планування',
	'show_doctors' => 'Мед. персонал',
	'show_clients' => 'Клієнти',
	'show_diseases' => 'Захворювання',
	'register_date' => 'Реєстрація',
	'email' => 'Електронна пошта',
	'address' => 'Адреса',
	'title' => 'Клініка',
	'phone' => 'Номер телефону',
	'no_information' => 'Інформація відсутня'

);

$save_clinic_profile = array (
	
	'SUCCESS' => 'Зміни були застосовані',
	'DB_ERROR' => 'Сталася помилка при зверненні до бази даних',
	'UNKNOWN' => 'Сталася невідома помилка',
	'PHOTO_ERROR' => 'Сталася помилка під час збереження зображення'
	
);

$doctor_profile = array (

	'title' => 'Медичний працівник',
	'show_specializations' => 'Спеціалізації',
	'birthday' => 'Дата народження',
	'cabinet' => 'Кабінет',
	'first_name' => "Ім'я",
	'second_name' => "Прізвище",
	'third_name' => "По батькові",
	'gender' => 'Гендер',
	'female' => 'Жінка',
	'male' => 'Чоловік',
	'phone' => 'Номер телефону',
	'description' => 'Біографія',
	'no_information' => 'Інформація відсутня'

);

$save_doctor_profile = array (
	
	'SUCCESS' => 'Зміни були застосовані',
	'DB_ERROR' => 'Сталася помилка при зверненні до бази даних',
	'UNKNOWN' => 'Сталася невідома помилка',
	'PHOTO_ERROR' => 'Сталася помилка під час збереження зображення'
	
);

$client_profile = array (

	'title' => 'Клієнт',
	'show_histories' => 'Історія хвороб',
	'birthday' => 'Дата народження',
	'first_name' => "Ім'я",
	'second_name' => "Прізвище",
	'third_name' => "По батькові",
	'gender' => 'Гендер',
	'female' => 'Жінка',
	'male' => 'Чоловік',
	'phone' => 'Номер телефону',
	'no_information' => 'Інформація відсутня'

);

$save_client_profile = array (
	
	'SUCCESS' => 'Зміни були застосовані',
	'DB_ERROR' => 'Сталася помилка при зверненні до бази даних',
	'UNKNOWN' => 'Сталася невідома помилка',
	'PHOTO_ERROR' => 'Сталася помилка під час збереження зображення'
	
);

$clinic_doctors = array (

	'clinic_doctors_title' => 'Медичний персонал',
	'add_doctor' => 'Додати лікаря',
	'no_information' => 'Інформація відсутня',
	'remove_doctor_title' => 'Видалити лікаря',
	'remove_doctor_text' => 'Ви впевнені, що хочете видалити лікаря?',
	'add_doctor_title' => 'Додати лікаря',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати лікаря'

);

$remove_doctor = array (

	'SUCCESS' => 'Ви успішно видалили лікаря!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_doctor = array (

	'SUCCESS' => 'Ви успішно додали лікаря!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$clinic_clients = array (

	'clinic_clients_title' => 'Клієнти клініки',
	'add_client' => 'Додати клієнта',
	'no_information' => 'Інформація відсутня',
	'remove_client_title' => 'Видалити клієнта',
	'remove_client_text' => 'Ви впевнені, що хочете видалити клієнта?',
	'add_client_title' => 'Додати клієнта',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати клієнта'

);

$remove_client = array (

	'SUCCESS' => 'Ви успішно видалили клієнта!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_client = array (

	'SUCCESS' => 'Ви успішно додали клієнта!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$room = array (

	'title' => 'Назва',
	'x' => 'X Позиція (м)',
	'y' => 'Y Позиція (м)',
	'width' => 'Ширина (м)',
	'height' => 'Довжина (м)'

);

$clinic_rooms = array (

	'clinic_rooms_title' => 'Приміщення клініки',
	'add_room' => 'Додати приміщення',
	'no_information' => 'Інформація відсутня',
	'remove_room_title' => 'Видалити приміщення',
	'remove_room_text' => 'Ви впевнені, що хочете видалити приміщення?',
	'add_room_title' => 'Додати приміщення',
	'edit_room_title' => 'Редагувати приміщення',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати приміщення',
	'isCabinet_title' => 'Чи є приміщення кабінетом?',
	'notCabinet' => 'Ні, це не кабінет',
	'isCabinet' => 'Так, це кабінет'
	
);

$remove_room = array (

	'SUCCESS' => 'Ви успішно видалили приміщення!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_room = array (

	'SUCCESS' => 'Ви успішно додали приміщення!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$edit_room = array (

	'SUCCESS' => 'Ви успішно відредагували приміщення!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$disease = array (

	'title' => 'Назва',
	'immunity' => 'Імунітет до захворювання',
	'description' => 'Опис'

);

$clinic_diseases = array (

	'clinic_diseases_title' => 'Захворювання клініки',
	'add_disease' => 'Додати захворювання',
	'no_information' => 'Інформація відсутня',
	'remove_disease_title' => 'Видалити захворювання',
	'remove_disease_text' => 'Ви впевнені, що хочете видалити захворювання?',
	'add_disease_title' => 'Додати захворювання',
	'edit_disease_title' => 'Редагувати захворювання',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати захворювання',
	'isAirSpread_title' => 'Чи передається пов.-крап. шляхами?',
	'notAirSpread' => 'Ні, не передається',
	'isAirSpread' => 'Так, передається'
	
);

$remove_disease = array (

	'SUCCESS' => 'Ви успішно видалили захворювання!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_disease = array (

	'SUCCESS' => 'Ви успішно додали захворювання!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$edit_disease = array (

	'SUCCESS' => 'Ви успішно відредагували захворювання!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$connection = array (

	'title' => 'Має прохід до'

);

$room_connections = array (

	'room_connections_title' => 'Входи та виходи кімнати',
	'add_connection' => 'Додати прохід',
	'no_information' => 'Інформація відсутня',
	'remove_connection_title' => 'Видалити прохід',
	'remove_connection_text' => 'Ви впевнені, що хочете видалити прохід?',
	'add_connection_title' => 'Додати прохід',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати прохід'
	
);

$remove_connection = array (

	'SUCCESS' => 'Ви успішно видалили прохід!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_connection = array (

	'SUCCESS' => 'Ви успішно додали прохід!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$symptom = array (

	'title' => 'Назва',
	'description' => 'Опис'

);

$clinic_symptoms = array (

	'clinic_symptoms_title' => 'Симптоми захворювань',
	'add_symptom' => 'Додати симптом',
	'no_information' => 'Інформація відсутня',
	'remove_symptom_title' => 'Видалити симптом',
	'remove_symptom_text' => 'Ви впевнені, що хочете видалити симптом?',
	'add_symptom_title' => 'Додати симптом',
	'edit_symptom_title' => 'Редагувати симптом',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати симптом'
	
);

$remove_symptom = array (

	'SUCCESS' => 'Ви успішно видалили симптом!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_symptom = array (

	'SUCCESS' => 'Ви успішно додали симптом!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$edit_symptom = array (

	'SUCCESS' => 'Ви успішно відредагували симптом!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$specialization = array (

	'title' => 'Спеціалізація'

);

$doctor_specializations = array (

	'doctor_specializations_title' => 'Спеціалізації лікаря',
	'add_specialization' => 'Додати спеціалізацію',
	'no_information' => 'Інформація відсутня',
	'remove_specialization_title' => 'Видалити спеціалізацію',
	'remove_specialization_text' => 'Ви впевнені, що хочете видалити спеціалізацію?',
	'add_specialization_title' => 'Додати спеціалізацію',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати спеціалізацію'
	
);

$remove_specialization = array (

	'SUCCESS' => 'Ви успішно видалили спеціалізацію!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_specialization = array (

	'SUCCESS' => 'Ви успішно додали спеціалізацію!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$feature = array (

	'title' => 'Симптом'

);

$disease_features = array (
	
	'disease_features_title' => 'Симптоми',
	'add_symptom' => 'Додати симптом',
	'no_information' => 'Інформація відсутня',
	'remove_symptom_title' => 'Видалити симптом',
	'remove_symptom_text' => 'Ви впевнені, що хочете видалити симптом?',
	'add_symptom_title' => 'Додати симптом',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Додати симптом'

);

$remove_feature = array (

	'SUCCESS' => 'Ви успішно видалили симптом хвороби!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_feature = array (

	'SUCCESS' => 'Ви успішно додали симптом хвороби!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

return array (

	'header' => $header,
	'footer' => $footer,
	'login' => $login,
	'authorize' => $authorize,
	'logout' => $logout,
	'register' => $register,
	'registration' => $registration,
	'edit_profile' => $edit_profile,
	'clinic_profile' => $clinic_profile,
	'save_clinic_profile' => $save_clinic_profile,
	'doctor_profile' => $doctor_profile,
	'save_doctor_profile' => $save_doctor_profile,
	'client_profile' => $client_profile,
	'save_client_profile' => $save_client_profile,
	'clinic_doctors' => $clinic_doctors,
	'remove_doctor' => $remove_doctor,
	'add_doctor' => $add_doctor,
	'clinic_clients' => $clinic_clients,
	'remove_client' => $remove_client,
	'add_client' => $add_client,
	'room' => $room,
	'clinic_rooms' => $clinic_rooms,
	'remove_room' => $remove_room,
	'add_room' => $add_room,
	'edit_room' => $edit_room,
	'disease' => $disease,
	'clinic_diseases' => $clinic_diseases,
	'remove_disease' => $remove_disease,
	'add_disease' => $add_disease,
	'edit_disease' => $edit_disease,
	'connection' => $connection,
	'room_connections' => $room_connections,
	'remove_connection' => $remove_connection,
	'add_connection' => $add_connection,
	'symptom' => $symptom,
	'clinic_symptoms' => $clinic_symptoms,
	'remove_symptom' => $remove_symptom,
	'add_symptom' => $add_symptom,
	'edit_symptom' => $edit_symptom,
	'specialization' => $specialization,
	'doctor_specializations' => $doctor_specializations,
	'remove_specialization' => $remove_specialization,
	'add_specialization' => $add_specialization,
	'feature' => $feature,
	'disease_features' => $disease_features,
	'remove_feature' => $remove_feature,
	'add_feature' => $add_feature
	
);

?>