# DaiDP STS SDK
User management and Brand tenant

## Download & Install
```bash
composer require phuocdaivl/sts-sdk
```

## Add service provider
Add the service provider to the providers array in the <span style='color:red'>`config/app.php`</span> config file as follows:

```bash
'providers' => [

    ...

    DaiDP\StsSDK\Providers\StsServiceProvider::class,
]
```

Well done.

## User management
Basic use:
```bash
$umSDK = app()->get(\DaiDP\StsSDK\UserManagement\UserManagementInterface::class);
```

### Methods
The following methods are available on the UserManagement instance.

#### register()
Create new account
```bash
$data = [
    'username' => '0766808284',
    'fullname' => 'Phước Đại',
    'email'    => '0766808284@gmail.com',
    'password' => '12345678',
    'confirmpassword' => '12345678'
];
$result = $umSDK->register($data);
```

#### resetPassword()
Set new password for account

```bash
$data = [
    'username' => '0766808284',
    'fullname' => 'Phước Đại',
    'email'    => '0766808284@gmail.com',
    'password' => '12345678',
    'confirmpassword' => '12345678'
];
$phone    = '0766808284';
$password = 'abc123ABC';
$result   = $umSDK->resetPassword($phone, $password);
```