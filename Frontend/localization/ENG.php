<?php

$header = array (
	
	'title' => 'DealMed System',
	'index_button_text' => 'Home',
	'login_button_text' => 'Login',
	'register_button_text' => 'Register',
	'clinic_button_text' => 'Clinic',
	'rooms_button_text' => 'Planner',
	'diseases_button_text' => 'Diseases',
	'symptoms_button_text' => 'Symptoms',
	'doctors_button_text' => 'Doctors',
	'clients_button_text' => 'Clients',
	'logout_button_text' => 'Logout'
	
);

$footer = array (

	'up' => 'Go Up',
	'author_text' => 'Developer and author',
	'author' => 'Vladyslav Nedodaiev'

);

$login = array (

	'title' => 'Login',
	'email_placeholder' => 'Enter your email',
	'password_placeholder' => 'Enter your password',
	'submit_text' => 'Login',
	'register_text' => "Don't have an account yet",
	'register' => 'Create account'

);

$authorize = array (

	'SUCCESS' => 'Logged in successfully',
	'UNVERIFIED' => 'Account is unverified, check your email to verify',
	'WRONG_PASSWORD' => 'Wrong password entered',
	'NOT_FOUND' => "No user with such email",
	'DB_ERROR' => 'Database error occured',
	'UNKNOWN' => 'Unknown error occured'

);

$logout = array (

	'SUCCESS' => 'You have successfully logged out',
	'NO_LOGIN' => 'You are not logged in'

);

$register = array (

	'title' => 'Create new profile',
	'nickname_placeholder' => 'Enter name of user/business',
	'email_placeholder' => 'Enter your email',
	'password_placeholder' => 'Enter your password',
	'repeat_password_placeholder' => 'Repeat your password',
	'submit_text' => 'Register',
	'login_text' => 'Already have an account',
	'login' => 'Login'
	
);

$registration = array (

	'SUCCESS' => 'The confirmation email has been sent, check your email to verify your account',
	'EMAIL_REGISTERED' => 'Account with the same email is already registered',
	'NICKNAME_REGISTERED' => 'Account with the same nickname is already registered',
	'EMAIL_UNSENT' => "The confirmation email hasn't been sent, try registering again later",
	'DB_ERROR' => 'Database error occured',
	'INCORRECT_EMAIL' => 'Incorrect email format',
	'DIFFERENT_PASSWORDS' => 'The passwords you have entered are different',
	'UNKNOWN' => 'Unknown error occured'

);

$edit_profile = array (

	'edit_profile_title' => 'Edit',
	'save_button_text' => 'Save',
	'cancel_button_text' => 'Cancel',
	'title_placeholder' => 'Enter title',
	'address_placeholder' => 'Enter address',
	'first_name_placeholder' => 'Enter first name',
	'second_name_placeholder' => 'Enter second name',
	'third_name_placeholder' => 'Enter third name',
	'phone_placeholder' => 'Enter phone number',
	'description_placeholder' => 'Biography (up to 3000 characters)',
	'user_private' => 'This information will be hidden',
	'room_title_placeholder' => 'Enter room title',
	'x_placeholder' => 'Enter X position (m)',
	'y_placeholder' => 'Enter Y position (m)',
	'width_placeholder' => 'Enter Width (m)',
	'height_placeholder' => 'Enter Height (m)',
	'disease_title_placeholder' => 'Enter disease title',
	'immunity_placeholder' => 'Enter immunity (0.00 to 1.00)',
	'disease_description_placeholder' => 'Enter description',
	'symptom_title_placeholder' => 'Enter title',
	'symptom_description_placeholder' => 'Enter description'

);

$clinic_profile = array (

	'show_rooms' => 'Planner',
	'show_doctors' => 'Doctors',
	'show_clients' => 'Clients',
	'show_diseases' => 'Diseases',
	'register_date' => 'Registered',
	'email' => 'Email',
	'address' => 'Address',
	'title' => 'Title',
	'phone' => 'Phone',
	'no_information' => 'No information'

);

$save_clinic_profile = array (
	
	'SUCCESS' => 'Changes saved successfully',
	'DB_ERROR' => 'Database error occured',
	'UNKNOWN' => 'Unknown error occured',
	'PHOTO_ERROR' => 'Error occured while saving photo'
	
);

$doctor_profile = array (

	'title' => 'Doctor',
	'show_specializations' => 'Specializations',
	'birthday' => 'Birthday',
	'cabinet' => 'Cabinet',
	'first_name' => "First name",
	'second_name' => "Second name",
	'third_name' => "Third name",
	'gender' => 'Gender',
	'female' => 'Female',
	'male' => 'Male',
	'phone' => 'Phone',
	'description' => 'Biography',
	'no_information' => 'No information'

);

$save_doctor_profile = array (
	
	'SUCCESS' => 'Changes saved successfully',
	'DB_ERROR' => 'Database error occured',
	'UNKNOWN' => 'Unknown error occured',
	'PHOTO_ERROR' => 'Error occured while saving photo'
	
);

$client_profile = array (

	'title' => 'Client',
	'show_histories' => 'Diseases history',
	'birthday' => 'Birthday',
	'first_name' => "First name",
	'second_name' => "Second name",
	'third_name' => "Third name",
	'gender' => 'Gender',
	'female' => 'Female',
	'male' => 'Male',
	'phone' => 'Phone',
	'no_information' => 'No information'

);

$save_client_profile = array (
	
	'SUCCESS' => 'Changes saved successfully',
	'DB_ERROR' => 'Database error occured',
	'UNKNOWN' => 'Unknown error occured',
	'PHOTO_ERROR' => 'Error occured while saving photo'
	
);

$clinic_doctors = array (

	'clinic_doctors_title' => 'Doctors',
	'add_doctor' => 'Add doctor',
	'no_information' => 'No information',
	'remove_doctor_title' => 'Remove doctor',
	'remove_doctor_text' => 'Are you sure you want to remove doctor?',
	'add_doctor_title' => 'Add doctor',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add doctor'

);

$remove_doctor = array (

	'SUCCESS' => 'Doctor has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_doctor = array (

	'SUCCESS' => 'Doctor has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$clinic_clients = array (

	'clinic_clients_title' => 'Clients',
	'add_client' => 'Add client',
	'no_information' => 'No information',
	'remove_client_title' => 'Remove client',
	'remove_client_text' => 'Are you sure you want to remove client?',
	'add_client_title' => 'Add client',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add client'

);

$remove_client = array (

	'SUCCESS' => 'Client has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_client = array (

	'SUCCESS' => 'Client has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$room = array (

	'title' => 'Title',
	'x' => 'X Position (m)',
	'y' => 'Y Position (m)',
	'width' => 'Width (m)',
	'height' => 'Height (m)'

);

$clinic_rooms = array (

	'clinic_rooms_title' => 'Rooms',
	'add_room' => 'Add room',
	'no_information' => 'No information',
	'remove_room_title' => 'Remove room',
	'remove_room_text' => 'Are you sure you want to remove room?',
	'add_room_title' => 'Add room',
	'edit_room_title' => 'Edit room',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add room',
	'isCabinet_title' => 'Choose whether this is cabinet?',
	'notCabinet' => 'No, it is not',
	'isCabinet' => 'Yes, is is'

);

$remove_room = array (

	'SUCCESS' => 'Room has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_room = array (

	'SUCCESS' => 'Room has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$edit_room = array (

	'SUCCESS' => 'Room has been successfully edited!',
	'UNKNOWN' => 'Unknown error occured'

);

$disease = array (

	'title' => 'Title',
	'immunity' => 'Immunity to disease',
	'description' => 'Description'

);

$clinic_diseases = array (

	'clinic_diseases_title' => 'Diseases',
	'add_disease' => 'Add disease',
	'no_information' => 'No information',
	'remove_disease_title' => 'Remove disease',
	'remove_disease_text' => 'Are you sure you want to remove disease?',
	'add_disease_title' => 'Add disease',
	'edit_disease_title' => 'Edit disease',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add disease',
	'isAirSpread_title' => 'Choose whether this is disease is air spread?',
	'notAirSpread' => 'No, it is not',
	'isAirSpread' => 'Yes, is is'

);

$remove_disease = array (

	'SUCCESS' => 'Disease has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_disease = array (

	'SUCCESS' => 'Disease has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$edit_disease = array (

	'SUCCESS' => 'Disease has been successfully edited!',
	'UNKNOWN' => 'Unknown error occured'

);

$connection = array (

	'title' => 'Connect this room to'

);

$room_connections = array (

	'room_connections_title' => 'Connections',
	'add_connection' => 'Add connection',
	'no_information' => 'No information',
	'remove_connection_title' => 'Remove connection',
	'remove_connection_text' => 'Are you sure you want to remove connection?',
	'add_connection_title' => 'Add connection',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add connection'

);

$remove_connection = array (

	'SUCCESS' => 'Connection has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_connection = array (

	'SUCCESS' => 'Connection has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$symptom = array (

	'title' => 'Title',
	'description' => 'Description'

);

$clinic_symptoms = array (

	'clinic_symptoms_title' => 'Symptoms',
	'add_symptom' => 'Add symptom',
	'no_information' => 'No information',
	'remove_symptom_title' => 'Remove symptom',
	'remove_symptom_text' => 'Are you sure you want to remove symptom?',
	'add_symptom_title' => 'Add symptom',
	'edit_symptom_title' => 'Edit symptom',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add symptom'

);

$remove_symptom = array (

	'SUCCESS' => 'Symptom has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_symptom = array (

	'SUCCESS' => 'Symptom has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$edit_symptom = array (

	'SUCCESS' => 'Symptom has been successfully edited!',
	'UNKNOWN' => 'Unknown error occured'

);

$specialization = array (

	'title' => 'Specialization'

);

$doctor_specializations = array (

	'doctor_specializations_title' => 'Specializations',
	'add_specialization' => 'Add specialization',
	'no_information' => 'No information',
	'remove_specialization_title' => 'Remove specialization',
	'remove_specialization_text' => 'Are you sure you want to remove specialization?',
	'add_specialization_title' => 'Add specialization',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add specialization'

);

$remove_specialization = array (

	'SUCCESS' => 'Specialization has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_specialization = array (

	'SUCCESS' => 'Specialization has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

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
	'add_specialization' => $add_specialization
	
);

?>