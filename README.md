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