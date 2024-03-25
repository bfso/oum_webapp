# API-Dokumentation: OUM API v1

Diese API v1 bietet Zugriff auf verschiedene Daten für autorisierte Benutzer.

## Authentifizierung

POST /api/v1/login

Authentifiziert Benutzer und gibt einen Token zurück.

**Request:**
- Method: POST
- Endpoint: /api/v1/login
- Headers: 
  - Content-Type: application/json
- Body:
``` json
  {
    "email": "user@example.com",
    "password": "password"
  }
```

**Response (bei erfolgreicher Authentifizierung):**
- Status: 200 OK
- Body:

``` json
  {
    "message": "Authentication successful",
    "token": "<user_token>",
    "username": "<username>",
    "code": 200
  }
```
**Response (bei fehlgeschlagener Authentifizierung):**
- Status: 401 Unauthorized
- Body:
``` json
  {
    "message": "Invalid credentials",
    "code": 401
  }
```
## Teams

GET /api/v1/teams

Listet alle verfügbaren Teams auf.

**Authorization:**
- Erfordert einen gültigen Token.

***Request:**
- Method: GET
- Endpoint: /api/v1/teams

**Response:**
- Status: 200 OK
- Body:
``` json
  {
    "message": "These are the available Teams",
    "teams": [
      {
            "id": 1,
            "name": "Naters",
            "category_id": 1,
            "games": 0,
            "wins": 0,
            "draws": 0,
            "loses": 0,
            "points": 0,
            "goals": 0,
            "goals_conceded": 0,
            "created_at": "2024-03-25T10:02:54.000000Z",
            "updated_at": "2024-03-25T10:02:54.000000Z"
      },
      {
            "id": 2,
            "name": "Brig",
            "category_id": 1,
            "games": 0,
            "wins": 0,
            "draws": 0,
            "loses": 0,
            "points": 0,
            "goals": 0,
            "goals_conceded": 0,
            "created_at": "2024-03-25T10:02:54.000000Z",
            "updated_at": "2024-03-25T10:02:54.000000Z"
      }
    ],
    "code": 200
  }
```

## Spieler

GET /api/v1/players

Listet alle verfügbaren Spieler auf.

****Authorization:**
- Erfordert einen gültigen Token.

**Request:**
- Method: GET
- Endpoint: /api/v1/players

**Response:**
- Status: 200 OK
- Body:
```json
  {
    "message": "These are the available Players",
    "players": [
      {
            "id": 1,
            "first_name": "mario",
            "last_name": "bozic",
            "player_nr": 9,
            "license_nr": "YNvdtvilqG",
            "image": "1711360989.png",
            "playing_for": 1,
            "created_at": "2024-03-25T10:03:09.000000Z",
            "updated_at": "2024-03-25T10:03:09.000000Z"
      },
      {
            "id": 2,
            "first_name": "luan",
            "last_name": "asani",
            "player_nr": 11,
            "license_nr": "LeOTlK0cZU",
            "image": "1711361038.png",
            "playing_for": 1,
            "created_at": "2024-03-25T10:03:58.000000Z",
            "updated_at": "2024-03-25T10:03:58.000000Z"
      }
    ],
    "code": 200
  }
  ```

GET /v1/players/{id}

Ruft Informationen über einen bestimmten Spieler ab.

**Authorization:**
- Erfordert einen gültigen Token.

**Request:**
- Method: GET
- Endpoint: /v1/players/{id}
  - {id}: Die ID des gewünschten Spielers.

**Response (bei gefundenem Spieler):**
- Status: 200 OK
- Body:
``` json
  {
    "message": "Player found",
    "player": {
        "id": 1,
        "first_name": "mario",
        "last_name": "bozic",
        "player_nr": 9,
        "license_nr": "YNvdtvilqG",
        "image": "1711360989.png",
        "playing_for": 1,
        "created_at": "2024-03-25T10:03:09.000000Z",
        "updated_at": "2024-03-25T10:03:09.000000Z"
    },
    "code": 200
  }

Response (bei nicht gefundenem Spieler):
- Status: 404 Not Found
- Body:
  {
    "message": "Player not found",
    "code": 404
  }
```


#

*Das ist die Dokumentation für die MyAuthApp API v1. Bei weiteren Fragen oder Anpassungswünschen stehe ich gerne zur Verfügung.*
