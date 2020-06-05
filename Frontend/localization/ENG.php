<?php

$header = array (
	
	'title' => 'DealMed System',
	'index_button_text' => 'Home',
	'login_button_text' => 'Login',
	'register_button_text' => 'Register',
	'clinic_button_text' => 'Clinic',
	'rooms_button_text' => 'Planner',
	'diseases_button_text' => 'Diseases',
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
	'height_placeholder' => 'Enter Height (m)'

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

$clinic_rooms = array (

	'clinic_rooms_title' => 'Rooms',
	'add_room' => 'Add room',
	'no_information' => 'No information',
	'remove_room_title' => 'Remove room',
	'remove_room_text' => 'Are you sure you want to remove room?',
	'add_room_title' => 'Add room',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Add room',
	'isCabinet_title' => 'Choose whether this is cabinet?',
	'notCabinet' => 'No, it is not',
	'isCabinet' => 'Yes is is'

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

//
//
// OLD
//
//

$my_skin_problems = array (

	'title' => 'My skin problems',
	'add_problem' => 'Add skin problem',
	'add_problem_modal_title' => 'Add skin problem',
	'add_problem_no_information' => 'Select skin problem',
	'modal_close' => 'Cancel',
	'add_problem_modal_submit' => 'Add skin problem',
	'remove_problem_modal_title' => 'Remove skin problem',
	'remove_problem_modal_text' => 'Are you sure you want to remove this problem?',
	'remove_problem_modal_submit' => 'Remove problem',
	'no_information' => 'No problems found!'

);

$skin_problems = array (

	'Atopic Dermatit' => 'Atopic dermatit',
	'Sun Allergy' => 'Sun allergy',
	'Water Allergy' => 'Water allergy'

);

$add_skin_problem = array (

	'SUCCESS' => 'The problem has been successfully added',
	'UNKNOWN' => 'Unknown error occured!'

);

$remove_skin_problem = array (

	'SUCCESS' => 'The problem has been successfully removed',
	'UNKNOWN' => 'Unknown error occured!'

);

$my_vacations = array (

	'my_past_vacations_title' => 'Past vacations',
	'no_information' => 'No information',
	'start_date' => 'Start date',
	'finish_date' => 'Finish date',
	'remove_vacation_title' => 'Remove vacation',
	'remove_current_vacation_text' => 'Are you sure you want to remove current vacation?',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'my_current_vacations_title' => 'Current vacations',
	'remove_future_vacation_text' => 'Are you sure you want to remove future vacation?',
	'my_future_vacations_title' => 'Future vacations',
	'remove_vacationRequest_title' => 'Remove vacation request',
	'remove_denied_vacationRequest_text' => 'Are you sure you want to remove denied vacation request?',
	'my_denied_vacationRequests_title' => 'Denied vacation requests',
	'request_date' => 'Request date',
	'remove_pending_vacationRequest_text' => 'Are you sure you want to remove pending vacation request?',
	'my_pending_vacationRequests_title' => 'Pending vacation requests',
	'add_submit' => 'Send request',
	'add_pending_vacationRequest' => 'Send vacation request',
	'add_vacationRequest_title' => 'Send vacation request',
	'add_pending_vacationRequest_text' => 'Are you sure you want to send vacation request?'

);

$remove_vacation = array (

	'SUCCESS' => 'The vacation has been successfully removed!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_vacationRequest = array (

	'SUCCESS' => 'The vacation has been successfully sent!',
	'UNKNOWN' => 'Unknown error occured'

);

$remove_vacationRequest = array (

	'SUCCESS' => 'The vacation request has been successfully canceled!',
	'UNKNOWN' => 'Unknown error occured'

);

$business_subscriptions = array (

	'business_current_subscriptions_title' => 'Current subscriptions',
	'add_subscription' => 'Add subscription',
	'device_text' => 'Device',
	'no_information' => 'No information',
	'start_date' => 'Start date',
	'finish_date' => 'Finish date',
	'remove_subscription_title' => 'Remove subscription',
	'remove_subscription_text' => 'Are you sure you want to remove subscription? We will not make a refund.',
	'add_subscription_title' => 'Add subscription',
	'edit_subscription_title' => 'Edit subscription',
	'business_past_subscriptions_title' => 'Past subscriptions',
	'modal_close' => 'Cancel',
	'remove_submit' => 'Remove',
	'add_submit' => 'Subscribe',
	'edit_submit' => 'Save changes',
	'no_free_buoys' => "Can't find any free devices!"

);

$remove_subscription = array (

	'SUCCESS' => 'The subscription has been successfully canceled!',
	'UNKNOWN' => 'Unknown error occured'

);

$add_subscription = array (

	'SUCCESS' => 'The subscription has been successfully added!',
	'UNKNOWN' => 'Unknown error occured'

);

$edit_subscription = array (

	'SUCCESS' => 'The subscription has been successfully edited!',
	'UNKNOWN' => 'Unknown error occured'

);

$buoy = array (

	'device_title' => 'Device',
	'battery' => 'Battery level',
	'connection_date' => 'Last connected on',
	'owner' => 'Owner',
	'no_information' => 'No information',
	'fabrication_date' => 'Date of fabrication',
	'latitude' => 'Latitude',
	'longitude' => 'Longitude',
	'air_title' => 'Air data',
	'temperature' => 'Temperature',
	'bad' => 'Bad',
	'good' => 'Good',
	'air_pollution' => 'Air pollution',
	'water_title' => 'Water data',
	'water_pH' => 'Level of pH',
	'water_component' => 'Component',
	'water_content' => 'Water content',
	'weather_title' => 'Weather data',
	'weather_wind_speed' => 'Wind speed'

);

$businesses = array (

	'filter_title' => 'Filtration',
	'filter_active_check' => 'Only with active devices',
	'filter_search_placeholder' => 'Enter to search',
	'filter_submit' => 'Apply settings'

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