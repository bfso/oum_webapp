# API-Dokumentation


## Login

Authentifiziert einen Benutzer mit den angegebenen Anmeldeinformationen.

- **URL:** `/api/login`
- **Methode:** POST
- **Parameter:**
  - `email` (String, erforderlich): Die E-Mail-Adresse des Benutzers.
  - `password` (String, erforderlich): Das Passwort des Benutzers.
- **Erfolgsantwort:**
  - **Statuscode:** 200
  - **Nachricht:** "Authentication successful"
  - **Benutzername:** "Name"
  - **Code:** "200"
- **Fehlerantwort:**
  - **Statuscode:** 401
  - **Nachricht:** "Invalid credentials"
  - **Code:** "401"


### Beispielanfrage

```json
POST /api/login
Content-Type: application/json

{
    "email": "beispiel@email.com",
    "password": "Passwort123"
}
```

### Beispielantwort (Erfolgreiche Anmeldung)

```json
Status: 200 OK

{
    "message": "Authentication successful",
    "username": "api test",
    "code": "200"

}
```

### Beispielantwort (Fehlerhafte Anmeldung)

```json
Status: 401 Unauthorized

{
    "message": "Invalid credentials",
    "code": "401"

}
```

## ...