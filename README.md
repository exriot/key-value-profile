# Key-value profile
`Exriot\Profile` is a simple class to manage a file with key-value array data via PHP procedure.
Nothing special.

# License
`Exriot\Profile` is released under the MIT license

# Usage

### Save key-value data on a file
```php
$profile = (new Profile('my-profile.txt'))
               ->read()
               ->set('name', 'exriot')
               ->set('package', 'profile')
               ->save();
```

### Get one of key-value data from a file
```php
$name_value = (new Profile('my-profile.txt'))
               ->read()
               ->get('name', 'default value');
```

### Do something for each key-value data from a file
```php
(new Profile('my-profile.txt'))
    ->read()
    ->map(function(string $value, string $key){
        echo "$key: $value\n";
    });
```
