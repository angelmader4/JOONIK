import React, { useEffect, useState } from 'react';
import { getLocations } from '../services/locationService';
import { Container, Card, CardMedia, CardContent, Typography } from '@mui/material';
import Grid from '@mui/material/Grid';

interface Location {
  code: number;
  name: string;
  image: string;
  creation_date: string;
}

const LocationsList: React.FC = () => {
  const [locations, setLocations] = useState<Location[]>([]);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const data = await getLocations();
        console.log(data);
        setLocations(data);
      } catch (err) {
        setError('Error al cargar las sedes. Por favor, inténtalo de nuevo.');
      }
    };

    fetchLocations();
  }, []);

  return (
    <Container>
      <Typography variant="h4" gutterBottom>
        Lista de Sedes
      </Typography>
      {error && <Typography color="error">{error}</Typography>}
      <Grid container spacing={3}>
        {locations.map((location) => (
          <Grid item xs={12} sm={6} md={4} key={location.code}>
            <Card>
              <CardMedia
                component="img"
                height="140"
                image={location.image}
                alt={location.name}
              />
              <CardContent>
                <Typography variant="h6">{location.name}</Typography>
                <Typography variant="body2" color="textSecondary">
                  Código: {location.code}
                </Typography>
                <Typography variant="body2" color="textSecondary">
                  Fecha de creación: {new Date(location.creation_date).toLocaleDateString()}
                </Typography>
              </CardContent>
            </Card>
          </Grid>
        ))}
      </Grid>
    </Container>
  );
};

export default LocationsList;
