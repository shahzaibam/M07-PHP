<?php



$fields = [
    'name' => 'required, max:255',
    'lastname' => 'required, max: 255',
    'address' => 'required | min: 10, max:255',
    'zipcode' => 'between: 5,6',
    'username' => 'required | alphanumeric | between: 3,255',
    'email' => 'required | email',
    'password' => 'required | secure',
    'password2' => 'required | same:password'
];




$errors = validate($data, $fields, [
    'required' => 'The %s is required',
    'password2' => ['same'=> 'Please enter the same password again']]
);

echo '<pre>';
print_r($errors);
echo '</pre>';


const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'Please enter the %s',
    'email' => 'The %s is not a valid email address',
    'min' => 'The %s must have at least %s characters',
    'max' => 'The %s must have at most %s characters',
    'between' => 'The %s must have between %d and %d characters',
    'same' => 'The %s must match with %s',
    'alphanumeric' => 'The %s should have only letters and numbers',
    'secure' => 'The %s must have between 8 and 64 characters and contain at least one number, one upper case letter, one lower case letter and one special character',
    'unique' => 'The %s already exists',
];


function validate(array $data, array $fields): array
{
    $errors = [];

    $split = fn($str, $separator) => array_map('trim', explode($separator, $str));

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            $params = [];
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
        }
    }

    return $errors;
}


?>