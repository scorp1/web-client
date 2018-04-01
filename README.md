# This programm check Brackets in your string
## For install web-server 
```php
docker-compose up -d
```
## Connect to web-server
```php
telnet localhost 8080
```
## Make a request
```php
POST / HTTP/1.1
Host: site
Content-Type: application/x-www-form-urlencoded
Content-Length: 15

string=()()

```
## Received a response
```php
HTTP/1.1 200 OK
```