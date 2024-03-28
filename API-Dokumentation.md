# API-Dokumentation: OUM API v1

Diese API v1 bietet Zugriff auf verschiedene Daten für autorisierte Benutzer.

## Login

Authentifiziert einen Benutzer und gibt ein Zugriffstoken zurück.

- **URL**
  `/api/v1/login`

- **Methoden**
  `POST`

- **Authentifizierung erforderlich**
  Nein

- **Datenparameter**
  | Parameter | Beschreibung |
  |------------|-----------------------|
  | email | Die E-Mail-Adresse des Benutzers (erforderlich) |
  | password | Das Passwort des Benutzers (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Authentication successful",
      "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
      "username": "Benutzername",
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 401 Unauthorized
  - **Beispielinhalt:**
    ```json
    {
      "message": "Invalid credentials",
      "code": 401
    }
    ```

- **Beispielanforderung**

  ```http
  POST /api/v1/login HTTP/1.1
  Host: example.com
  Content-Type: application/json
  ```

```json
{
  "email": "benutzer@example.com",
  "password": "passwort123"
}
```

- **Beispielantwort:**
  ```json
  {
    "message": "Authentication successful",
    "token": "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9...",
    "username": "Benutzername",
    "code": 200
  }
  ```

## Spieler

Bietet Zugriff auf Spielerdaten.

### Spieler auflisten

Listet alle verfügbaren Spieler auf.

- **URL**
  `/api/v1/players`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK

- **Beispielantwort**
  ```json
  {
    "message": "These are the available Players",
    "players": [
      {
        "id": 1,
        "first_name": "Mario",
        "last_name": "Bozic",
        "player_nr": 9,
        "license_nr": "1MU3Orvl5R",
        "image": "Mario_Bozic_1MU3Orvl5R.png",
        "playing_for": 1,
        "created_at": "2024-03-26T13:36:32.000000Z",
        "updated_at": "2024-03-26T13:36:32.000000Z"
      },
      { ... }
    ],
    "code": 200
  }
  ```

### Spieler anzeigen

Zeigt die Daten eines einzelnen Spielers an.

- **URL**
  `/api/v1/player/{id}`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Pfadparameter**
  | Parameter | Beschreibung |
  |------------|---------------------|
  | id | Die ID des Spielers (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Player found",
      "player": {
        "id": 1,
        "first_name": "Mario",
        "last_name": "Bozic",
        "player_nr": 9,
        "license_nr": "1MU3Orvl5R",
        "image": "Mario_Bozic_1MU3Orvl5R.png",
        "playing_for": 1,
        "created_at": "2024-03-26T13:36:32.000000Z",
        "updated_at": "2024-03-26T13:36:32.000000Z"
      },
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 404 Not Found
  - **Beispielinhalt:**
    ```json
    {
      "message": "Player not found",
      "code": 404
    }
    ```

## Teams

Bietet Zugriff auf Teamdaten.

### Teams auflisten

Listet alle verfügbaren Teams auf.

- **URL**
  `/api/v1/teams`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "These are the available Teams",
      "teams": [
        {
          "id": 1,
          "name": "Naters",
          "category_id": 1,
          "games": 4,
          "wins": 3,
          "draws": 0,
          "loses": 1,
          "points": 9,
          "goals": 16,
          "goals_conceded": 10,
          "created_at": "2024-03-26T11:41:17.000000Z",
          "updated_at": "2024-03-26T12:31:54.000000Z"
        },
        { ... }
      ],
      "code": 200
    }
    ```

### Team anzeigen

Zeigt die Daten eines einzelnen Teams an.

- **URL**
  `/api/v1/team/{id}`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Pfadparameter**
  | Parameter | Beschreibung |
  |------------|---------------------|
  | id | Die ID des Teams (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Team found",
      "team": {
        "id": 1,
        "name": "Naters",
        "category_id": 1,
        "games": 4,
        "wins": 3,
        "draws": 0,
        "loses": 1,
        "points": 9,
        "goals": 16,
        "goals_conceded": 10,
        "created_at": "2024-03-26T11:41:17.000000Z",
        "updated_at": "2024-03-26T12:31:54.000000Z"
      },
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 404 Not Found
  - **Beispielinhalt:**

    ```json
    {
      "message": "Team not found",
      "code": 404
    }
    ```

## Spielresultat eintragen

Aktualisiert das Ergebnis eines Spiels und aktualisiert die Teamstatistiken entsprechend.

- **URL**
  `/api/v1/games/{id}/result`

- **Methoden**
  `POST`

- **Authentifizierung erforderlich**
  Ja

- **Pfadparameter**
  | Parameter | Beschreibung |
  |------------|---------------------|
  | id | Die ID des Spiels (erforderlich) |

- **Datenparameter**
  | Parameter | Beschreibung |
  |------------|-------------------------|
  | team_1_score | Die Tore des ersten Teams (erforderlich) |
  | team_2_score | Die Tore des zweiten Teams (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Result updated successfully and teams updated",
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 404 Not Found
  - **Beispielinhalt:**
    ```json
    {
      "message": "Game not found",
      "code": 404
    }
    ```

- **Beispielanforderung**

  ```http
  POST /api/v1/games/{id}/result HTTP/1.1
  Host: example.com
  Content-Type: application/json

  {
    "team_1_score": 3,
    "team_2_score": 2
  }
  ```

- **Beispielantwort:**

  ```json
  {
    "message": "Result updated successfully and teams updated",
    "code": 200
  }
  ```

## Ungespielte Spiele abrufen

Ruft alle ungespielten Spiele ab.

- **URL**
  `/api/v1/unplayed-games`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Unplayed games retrieved successfully",
      "unplayed_games": [
        {
          "id": 28,
          "match_day_id": 6,
          "team_1_id": 1,
          "team_2_id": 7,
          "team_1_score": null,
          "team_2_score": null,
          "created_at": "2024-03-26T14:20:24.000000Z",
          "updated_at": "2024-03-26T14:20:24.000000Z"
        },
        { ... }
      ],
      "code": 200
    }
    ```

## Gespielte Spiele abrufen

Ruft alle gespielten Spiele ab.

- **URL**
  `/api/v1/played-games`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**

    ```json
    {
      "message": "Played games retrieved successfully",
      "played_games": [
        {
          "id": 16,
          "match_day_id": 4,
          "team_1_id": 5,
          "team_2_id": 4,
          "team_1_score": 2,
          "team_2_score": 2,
          "created_at": "2024-03-26T11:57:20.000000Z",
          "updated_at": "2024-03-26T12:01:22.000000Z"
        },
        { ... }
      ],
      "code": 200
    }
    ```

## Spieltage abrufen

Ruft alle Spieltage ab.

- **URL**
  `/api/v1/match-days`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Match days retrieved successfully",
      "match_days": [
        {
          "id": 4,
          "date": "2024-03-08",
          "venue_id": 1,
          "created_at": "2024-03-26T11:57:20.000000Z",
          "updated_at": "2024-03-26T11:57:20.000000Z"
        },
        { ... }
      ],
      "code": 200
    }
    ```

## Spieltag anzeigen

Zeigt die Daten eines einzelnen Spieltags an.

- **URL**
  `/api/v1/match-day/{id}`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Pfadparameter**
  | Parameter | Beschreibung |
  |------------|---------------------|
  | id | Die ID des Spieltags (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Match day retrieved successfully",
      "match_day": {
        "id": 5,
        "date": "2024-03-31",
        "venue_id": 1,
        "created_at": "2024-03-26T12:30:42.000000Z",
        "updated_at": "2024-03-26T12:30:42.000000Z"
      },
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 404 Not Found
  - **Beispielinhalt:**
    ```json
    {
      "message": "Match day not found",
      "code": 404
    }
    ```

## Veranstaltungsorte abrufen

Ruft alle Veranstaltungsorte ab.

- **URL**
  `/api/v1/venues`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Ja

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Venues retrieved successfully",
      "venues": [
        {
          "id": 1,
          "name": "Glis",
          "location": "strasse 1",
          "created_at": "2024-03-26T11:43:06.000000Z",
          "updated_at": "2024-03-26T11:43:06.000000Z"
        },
        { ... }
      ],
      "code": 200
    }
    ```

## Veranstaltungsort anzeigen

Zeigt die Daten eines einzelnen Veranstaltungsorts an.

- **URL**
  `/api/v1/venues/{id}`

- **Methoden**
  `GET`

- **Authentifizierung erforderlich**
  Nein

- **Pfadparameter**
  | Parameter | Beschreibung |
  |------------|---------------------|
  | id | Die ID des Veranstaltungsorts (erforderlich) |

- **Erfolgsantwort**

  - **Statuscode:** 200 OK
  - **Beispielinhalt:**
    ```json
    {
      "message": "Venue found",
      "venue": {
        "id": 1,
        "name": "zagreb",
        "location": "strasse 1",
        "created_at": "2024-03-26T11:43:06.000000Z",
        "updated_at": "2024-03-26T11:43:06.000000Z"
      },
      "code": 200
    }
    ```

- **Fehlerrantworten**

  - **Statuscode:** 404 Not Found
  - **Beispielinhalt:**
    ```json
    {
      "message": "Venue not found",
      "code": 404
    }
    ```
