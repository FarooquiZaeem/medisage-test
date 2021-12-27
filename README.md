# Medisage Test

## Basic Auth credentials

username: test
password: test

## URLs

`POST /api/students -> list`

`POST /api/students/store -> store`

### Example of store request

```
URL: {baseURL}/api/students/store

Header:
Authorization: Basic dGVzdDp0ZXN0
Accept: application/json

Body:
{
    "name": "Zaeem",
    "phone_number": "9869786333",
    "email": "work.zaeem@gmail.com",
    "country_code": "+91"
}
```
