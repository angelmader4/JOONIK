import axios from 'axios';

const api = axios.create({
  baseURL: process.env.REACT_APP_API_URL,
});

// Obtener todas las sedes
export const getLocations = async () => {
    const response = await fetch('http://localhost:9000/api/locations', {
        method: 'GET',
        headers: {
          'X-API-KEY': 'location_PmTRCYoGWVZhkHaOqxzV',
          'Accept': 'application/json',
        },
    });
    return response.json();
};