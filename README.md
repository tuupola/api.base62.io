Demo api for encoding and decoding base62 data. Based on [Slim API Skeleton](https://github.com/tuupola/slim-api-skeleton).

## Usage

If you have [Vagrant](https://www.vagrantup.com/) installed start the virtual machine.

``` bash
$ cd app
$ vagrant up
```

Now you can access the development api at [https://192.168.50.55/encode](https://192.168.50.55/encode) and [https://192.168.50.55/decode](https://192.168.50.55/decode).


### Encode

```
$ curl https://api.base62.io/encode \
    --request POST \
    --include \
    --header "Content-Type:application/json" \
    --data '{"data": "Hello world!"}'

HTTP/1.1 200 OK
Content-Type: application/json

{
    "encoded": "T8dgcjRGuYUueWht"
}
```

### Decode

```
$ curl https://api.base62.io/decode  \
    --request POST \
    --include \
    --header "Content-Type:application/json"  \
    --data '{"data": "T8dgcjRGuYUueWht"}'

HTTP/1.1 200 OK
Content-Type: application/json

{
    "decoded": "Hello world!"
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.