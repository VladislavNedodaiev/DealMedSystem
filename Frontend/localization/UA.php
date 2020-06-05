<?php

$header = array (
	
	'title' => 'DealMed System',
	'index_button_text' => 'Головна сторінка',
	'login_button_text' => 'Вхід',
	'register_button_text' => 'Реєстрація',
	'clinic_button_text' => 'Клініка',
	'rooms_button_text' => 'Планування',
	'diseases_button_text' => 'Захворювання',
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
	'height_placeholder' => 'Введіть довжину (м)'

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

$clinic_rooms = array (

	'clinic_rooms_title' => 'Приміщення клініки',
	'add_room' => 'Додати приміщення',
	'no_information' => 'Інформація відсутня',
	'remove_room_title' => 'Видалити приміщення',
	'remove_room_text' => 'Ви впевнені, що хочете видалити приміщення?',
	'add_room_title' => 'Додати приміщення',
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

//
//
// OLD
//
//

$my_skin_problems = array (

	'title' => "Моє здоров'я",
	'add_problem' => 'Додати хворобу',
	'add_problem_modal_title' => 'Додати хворобу',
	'add_problem_no_information' => 'Оберіть хворобу',
	'modal_close' => 'Скасувати',
	'remove_problem_modal_title' => 'Видалити хворобу',
	'remove_problem_modal_text' => 'Ви впевнені, що хочете прибрати цю хворобу з вашого профілю?',
	'remove_problem_modal_submit' => 'Видалити хворобу',
	'add_problem_modal_submit' => 'Додати',
	'no_information' => 'Не знайдено жодної проблеми!'

);

$skin_problems = array (

	'Atopic Dermatit' => 'Атопічний дерматит',
	'Sun Allergy' => 'Алергія на сонце',
	'Water Allergy' => 'Алергія на воду'

);

$add_skin_problem = array (

	'SUCCESS' => 'Захворювання додано до вашого профілю',
	'UNKNOWN' => 'Сталася невідома помилка!'

);

$remove_skin_problem = array (

	'SUCCESS' => 'Захворювання видалено з вашого профілю',
	'UNKNOWN' => 'Сталася невідома помилка!'

);

$my_vacations = array (

	'my_past_vacations_title' => 'Минулі відпочинки',
	'no_information' => 'Інформація відсутня',
	'start_date' => 'Дата початку',
	'finish_date' => 'Дата завершення',
	'remove_vacation_title' => 'Видалити відпочинок',
	'remove_current_vacation_text' => 'Ви впевнені, що хочете видалити поточний відпочинок?',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'my_current_vacations_title' => 'Поточні відпочинки',
	'remove_future_vacation_text' => 'Ви впевнені, що хочете видалити майбутній відпочинок?',
	'my_future_vacations_title' => 'Майбутні відпочинки',
	'remove_vacationRequest_title' => 'Видалити запит на відпочинок',
	'remove_denied_vacationRequest_text' => 'Ви впевнені, що хочете видалити відхилений запит на відпочинок?',
	'my_denied_vacationRequests_title' => 'Відхилені запити на відпочинок',
	'request_date' => 'Дата запиту',
	'remove_pending_vacationRequest_text' => 'Ви впевнені, що хочете видалити запит на відпочинок, який очікує на відповідь?',
	'my_pending_vacationRequests_title' => 'Запити на відпочинок в очікуванні',
	'add_submit' => 'Надіслати запит',
	'add_pending_vacationRequest' => 'Надіслати запит на відпочинок',
	'add_vacationRequest_title' => 'Надіслати запит на відпочинок',
	'add_pending_vacationRequest_text' => 'Ви впевнені, що хочете надіслати запит на відпочинок?'

);

$remove_vacation = array (

	'SUCCESS' => 'Відпочинок успішно видалено!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_vacationRequest = array (

	'SUCCESS' => 'Запит на відпочинок надіслано!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$remove_vacationRequest = array (

	'SUCCESS' => 'Запит на відпочинок було успішно скасовано!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$business_subscriptions = array (

	'business_current_subscriptions_title' => 'Поточні підписки',
	'add_subscription' => 'Оформити підписку',
	'device_text' => 'Пристрій',
	'no_information' => 'Інформація відсутня',
	'start_date' => 'Дата початку',
	'finish_date' => 'Дата завершення',
	'remove_subscription_title' => 'Скасувати підписку',
	'remove_subscription_text' => 'Ви впевнені, що хочете скасувати дану підписку? Ми не зможемо повернути Вам кошти.',
	'add_subscription_title' => 'Оформлення підписки',
	'edit_subscription_title' => 'Редагування підписки',
	'business_past_subscriptions_title' => 'Попередні підписки',
	'modal_close' => 'Скасувати',
	'remove_submit' => 'Видалити',
	'add_submit' => 'Оформити',
	'edit_submit' => 'Зберегти зміни',
	'no_free_buoys' => 'Не знайдено вільних пристроїв!'

);

$remove_subscription = array (

	'SUCCESS' => 'Підписку скасовано!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$add_subscription = array (

	'SUCCESS' => 'Підписку оформлено!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$edit_subscription = array (

	'SUCCESS' => 'Зміни застосовано!',
	'UNKNOWN' => 'Сталася невідома помилка'

);

$buoy = array (

	'device_title' => 'Пристрій',
	'battery' => 'Рівень заряду батареї',
	'connection_date' => 'Останнє підключення',
	'owner' => 'Власник',
	'no_information' => 'Інформація відсутня',
	'fabrication_date' => 'Дата виробництва',
	'latitude' => 'Широта',
	'longitude' => 'Довгота',
	'air_title' => 'Дані про повітря',
	'temperature' => 'Температура',
	'bad' => 'Погано',
	'good' => 'Добре',
	'air_pollution' => 'Забрудненість повітря',
	'water_title' => 'Дані про воду',
	'water_pH' => 'Рівень pH',
	'water_component' => 'Компонент',
	'water_content' => 'Склад води',
	'weather_title' => 'Дані про погоду',
	'weather_wind_speed' => 'Швидкість вітру'

);

$businesses = array (

	'filter_title' => 'Фільтрація',
	'filter_active_check' => 'Тільки з активними пристроями',
	'filter_search_placeholder' => 'Введіть для пошуку',
	'filter_submit' => 'Застосувати'

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
	'clinic_rooms' => $clinic_rooms,
	'remove_room' => $remove_room,
	'add_room' => $add_room,
	'edit_room' => $edit_room,
	
	'my_skin_problems' => $my_skin_problems,
	'skin_problems' => $skin_problems,
	'add_skin_problem' => $add_skin_problem,
	'remove_skin_problem' => $remove_skin_problem,
	'my_vacations' => $my_vacations,
	'remove_vacation' => $remove_vacation,
	'add_vacationRequest' => $add_vacationRequest,
	'remove_vacationRequest' => $remove_vacationRequest,
	'business_subscriptions' => $business_subscriptions,
	'remove_subscription' => $remove_subscription,
	'add_subscription' => $add_subscription,
	'edit_subscription' => $edit_subscription,
	'buoy' => $buoy,
	'businesses' => $businesses
	
);

?>