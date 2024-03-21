# API-Dokumentation


## Login

Authentifiziert einen Benutzer mit den angegebenen Anmeldeinformationen.

- **URL:** `/api/login`
- **Methode:** POST
- **Parameter:**
  - `email` (String, erforderlich): Die E-Mail-Adresse des Benutzers.
  - `password` (String, erforderlich): Das Passwort des Benutzers.
- **Erfolgsantwort:**
  - **Statuscode:** 200 OK
  - **Nachricht:** "Authentication successful"
  - **Benutzername:** "Name"
  - **Code:** "200"
  - **Token:** "Ein JWT-Token zur Authentifizierung in weiteren Anfragen."

- **Fehlerantwort:**
  - **Statuscode:** 401 Unauthorized
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
    "code": "200",
    "token": "Bearer 4|uzpkZPYy6jb2LzpBQbeU7X5sYlM1j6Y12iTFnVhycd184b1c"
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

## Teams - NOT UPDATED
Zeigt alle vorhandene Teams an.

- **URL:** `/api/teams`
- **Methode:** GET
- **Erfolgsantwort:**
  - **Statuscode:** 200
  - **Nachricht:** "These are the available Teams"
  - **Code:** "200"
- **Fehlerantwort:**
  - **Statuscode:** 401


### Beispielanfrage

```json
GET /api/teams
Content-Type: application/json


```

### Beispielantwort (Erfolgreiche Anmeldung)

```json
Status: 200 OK

{
    "message": "These are the available Teams",
    "teams": [
        {
            "id": 1,
            "name": "FC Naters",
            "category_id": 1,
            "games": 0,
            "wins": 0,
            "draws": 0,
            "loses": 0,
            "points": 0,
            "goals": 0,
            "goals_conceded": 0,
            "created_at": "2024-03-21T13:38:00.000000Z",
            "updated_at": "2024-03-21T13:38:00.000000Z"
        }
    ]
}
```

### Beispielantwort (Fehlerhafte Anmeldung)

```json
Status: 401 Unauthorized
```