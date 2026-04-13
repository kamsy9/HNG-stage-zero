# HNG Stage 0 - Name Classification API

## Description
This API classifies a name using the Genderize API and returns a structured response.

## Endpoint
GET /api/classify?name={name}

## Example Response

```json
{
  "status": "success",
  "data": {
    "name": "john",
    "gender": "male",
    "probability": 0.99,
    "sample_size": 1234,
    "is_confident": true,
    "processed_at": "2026-04-01T12:00:00Z"
  }
}
